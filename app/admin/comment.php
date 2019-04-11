<?php
/**
 * comment class...
 */
class comment extends root
{
	protected static $db_table="comments";
	protected static $db_table_filed= array('user_id','email','author','body');
    use param;

	function __construct(argument)
	{
							
	}

	public static create($email,$author="anonymous",$body)
	{
		global $database;
		$this->user_id= hash('crc32', microtime(true).mt_rand().$author);
		$this->email=$email;$this->author=$author;$this->body=$body;
		try{
			$sql= $this->prepare();
			$stmt=$database->conn->prepare($sql);
			$stmt->bindParam(1,$this->user_id,PDO::PARAM_STR);
			$stmt->bindParam(2,$this->email,PDO::PARAM_STR);
			$stmt->bindParam(3,$this->author,PDO::PARAM_STR);
			$stmt->bindParam(4,$this->body,PDO::PARAM_STR);
			$stmt->execute();
		}catch (PDOException $e){
			if($database->conn->inTransaction())$database->conn->rollBack();
			throw $e;
		}
	}
	
}