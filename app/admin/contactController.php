<?php

/**
 * contact us controller...
 */

class contact extends root
{
	protected static $db_table="contact";
	protected static $db_table_filed= array('name','email','subject','comment');
	use param;
	
	
	public function create(){
		try{
			global $database;
			$sql=$this->prepare();
		    $stmt =$database->conn->prepare($sql);
				/*bind_param can only take variables as arrgument no direct string can be pass here...*/
				$stmt->bindParam(1,$this->name,PDO::PARAM_STR);
				$stmt->bindParam(2,$this->email,PDO::PARAM_STR);
				$stmt->bindParam(3,$this->subject,PDO::PARAM_STR);
				$stmt->bindParam(4,$this->comment,PDO::PARAM_STR);
				$stmt->execute();
				return true;
	    }
		catch (PDOException $e){
			if($database->conn->inTransaction())$database->conn->rollBack();
			throw $e;
		}
		
	}
	
}
