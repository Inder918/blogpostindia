<?php

class Autologin
{
	use persistent;

	protected $db;
	protected $token_index;
	protected $lifetimeDays =30;
	protected $expiry;
	protected $cookiepath="/";
	protected $domain="";
	protected $secure=null;
	protected $httponly=true;

	public function  __construct(PDO $db, $token_index=0)
	{
		$this->db=$db;
		if (PDO::ATTR_ERRMODE !== PDO::ERRMODE_EXCEPTION) 
		{
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		}

		$this->token_index = ($token_index <= 31) ? $token_index : 31;
		$this->expiry = time() + ($this->lifetimeDays * 60 * 60 * 24);
	}


	public function persistentlogin()
	{
		if($_SESSION[$this->sess_ukey] = $this->getUserkey()){
		 	$this->getExistingData();
		 	$token = $this->generateToken();
			$this->storeToken($token);
		 	$this->set_Cookie($token);
		    $_SESSION[$this->sess_persist] = true;
		 	unset($_SESSION[$this->cookie]);
		 }
	}

	public function checkcreadentials()
	{
	
		if (isset($_COOKIE[$this->cookie])) {

			if ($storedToken= $this->parseCookie()) {
			 	//$this->clearOld();
			 	if ($this->checkCookieToken($storedToken,false)) {
					$this->cookieLogin($storedToken);
					$newToken= $this->generateToken();
					$this->storeToken($newToken);
					$this->set_Cookie($newToken);
				}elseif ($this->checkCookieToken($storedToken,true)) {
					$this->deleteAll();
					$_SESSION= [];
					$params= session_get_cookie_params();
					setcookie(session_name(), '', time()-86400, $params['path'],$params['domain'],$params['secure'],$params['httponly']);
					session_destroy();
					setcookie($this->cookie,"",time()-86400,$this->cookiepath,$this->domain,$this->secure,$this->httponly);
			 	}else{
			 		header('Location:https://blogpostindia.com/view/admin/login');
			 	}
			}
		}
	}
	

	public function logout($all = true)
	{
		if($all){
			$this->deleteAll();
		}else{
			$token= $this->parseCookie();
			$sql= "UPDATE $this->table_autologin SET $this->col_used =1 WHERE  $this->col_token= :token";
			$stmt= $this->db->prepare($sql);
			$stmt->bindParam(':token',$token);
			$stmt->execute();
		}
		setcookie($this->cookie,'',time()-86400,$this->cookiepath,$this->domain,$this->secure,$this->httponly);
	}
	

	protected function getUserkey()
	{
		$sql= "SELECT $this->col_ukey FROM $this->table_user WHERE $this->col_name= :username";
		$stmt= $this->db->prepare($sql);
		$stmt->bindParam(':username',$_SESSION[$this->sess_uname]);
		$stmt->execute();
		return $stmt->fetchColumn();
	}

	protected function getExistingData()
	{
		$sql="SELECT $this->col_data FROM $this->table_autologin WHERE $this->col_ukey= :key ORDER BY $this->col_created DESC";
		$stmt= $this->db->prepare($sql);
		$stmt->bindParam(':key',$_SESSION[$this->sess_ukey]);
		$stmt->execute();

		if($data = $stmt->fetchColumn())
		{
			session_decode($data);
		}
		$stmt->closeCursor();
	}

	protected function generateToken()
	{
		return bin2hex(openssl_random_pseudo_bytes(16));
	}

	protected function storeToken($token)
	{
		
		try{
			$sql = "INSERT INTO $this->table_autologin ($this->col_ukey,$this->col_token) VALUES (:key,:token)";
			$stmt= $this->db->prepare($sql);
			$stmt->bindParam(':key',$_SESSION[$this->sess_ukey]);
			$stmt->bindParam(':token',$token);
			$stmt->execute();
		}
		catch(PDOException $e){
					if($this->db->inTransaction()){
						$this->db->rollBack();
					}
					throw $e;
			}
	}

	protected function set_Cookie($token)
	{
		
		$merged = str_split($token);
		array_splice($merged, hexdec($merged[$this->token_index]),0,$_SESSION[$this->sess_ukey]);
		$merged=implode("", $merged);
	    $token = $_SESSION[$this->sess_uname] .'|'. $merged;
		setcookie($this->cookie,$token,$this->expiry,$this->cookiepath,$this->domain,$this->secure,$this->httponly);
		
	}

	protected function parseCookie()
	{

		$parts= explode('|',$_COOKIE[$this->cookie]);
		$_SESSION[$this->sess_uname]= $parts[0];
		$token = $parts[1];
		 if ($_SESSION[$this->sess_ukey] = $this->getUserkey()) {
		 	return str_replace($_SESSION[$this->sess_ukey], '', $token);
		 }else{
		 	return false;
		 }
	}


	protected function clearOld()
	{

		$sql= "DELETE FROM $this->table_autologin WHERE DATE_ADD(NOW(),INTERVAL :expiry DAY) < NOW()";
		$stmt= $this->db->prepare($sql);
		$stmt->bindParam(':expiry', $this->lifetimeDays);
		$stmt->execute();
	}

	protected function checkCookieToken($token, $used)
	{
		$sql= "SELECT COUNT(*) FROM $this->table_autologin WHERE $this->col_ukey= :key AND $this->col_token= :token 
		AND $this->col_used= :used";
		$stmt= $this->db->prepare($sql);
		$stmt->bindParam('key',$_SESSION[$this->sess_ukey]);
		$stmt->bindParam(':token',$token);
		$stmt->bindParam(':used',$used,PDO::PARAM_BOOL);
		$stmt->execute();
		if ($stmt->fetchColumn()>0) {
			return true;
		}
		else{
			return false;
		}
	}

	protected function deleteAll()
	{
		$sql= "DELETE FROM $this->table_autologin WHERE $this->col_ukey = :key";
		$stmt= $this->db->prepare($sql);
		$stmt->bindParam(':key',$_SESSION[$this->sess_ukey]);
		$stmt->execute();
	}


	protected function cookieLogin($token)
	{
		try{
			$this->getExistingData($_SESSION[$this->sess_ukey]);
			$sql= "UPDATE $this->table_autologin SET $this->col_used =1 WHERE $this->col_ukey = :key AND $this->col_token= :token";
			$stmt= $this->db->prepare($sql);
			$stmt->bindParam(':key',$_SESSION[$this->sess_ukey]);
			$stmt->bindParam(':token',$token);
			$stmt->execute();

			session_regenerate_id(true);

			$_SESSION[$this->cookie]=true;
			unset($_SESSION[$this->sess_auth]);
			unset($_SESSION[$this->sess_revalid]);
			unset($_SESSION[$this->sess_persist]);

		}catch(PDOException $e){
			    if($this->db->inTransaction()){
			    	$this->db->rollBack();
			    }
			    throw $e;
		}
	}
}





