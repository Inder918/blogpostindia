<?php

class persistentclass extends MySessionHandler
{
	use persistent;		public function visitor_count()	{		if(isset($_SESSION['count']))		{			return $this->visitor_count=$_SESSION['count']++;		}		else		{			return $_SESSION['count']=1;		}	}

	public function write($session_id,$data){
		
		try{
			$sql= 	"INSERT INTO $this->table_sess ($this->col_sid,$this->col_expiry,$this->col_data) VALUES (:sid,:expiry,:data) ON DUPLICATE KEY UPDATE $this->col_expiry= :expiry , $this->col_data= :data";
			$stmt= $this->db->prepare($sql);
			$stmt->bindParam(':sid',$session_id);
			$stmt->bindParam(':expiry',$this->expiry,PDO::PARAM_INT);
			$stmt->bindParam(':data',$data);
			$stmt->execute();
			if(isset($_SESSION[$this->sess_persist]) || isset($_SESSION[$this->cookie]))
			{
				$this->storeAutologinData($data);
			}
			return true;
		}
		catch(PDOException $e){
					if($this->db->inTransaction()){
						$this->db->rollBack();
					}
					throw $e;
			}
	}


	protected function storeAutologinData($data)
	{
		if(isset($_SESSION[$this->sess_ukey]))
		{
			$sql= "SELECT $this->col_ukey FROM $this->table_user WHERE $this->col_name= :username ";
			$stmt= $this->db->prepare($sql);
			$stmt->bindParam(':username', $_SESSION[$this->sess_uname]);
			$stmt->execute();
			$_SESSION[$this->sess_ukey] = $stmt->fetchColumn();
		}

		$sql="UPDATE $this->table_autologin SET $this->col_data = :data WHERE $this->col_ukey = :ukey";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":data", $data);
		$stmt->bindParam(":ukey", $_SESSION[$this->sess_ukey]);
		$stmt->execute();
	}
}