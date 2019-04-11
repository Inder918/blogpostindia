<?php

class post extends root
{
	protected static $db_table="post";
	protected static $db_table_filed= array('title','author','body','image_id');
	use param;
	
	
	public function create(){
		try{
			global $database;
			$sql=$this->prepare();
		    $stmt =$database->conn->prepare($sql);
				/*bind_param can only take variables as arrgument no direct string can be pass here...*/
				$stmt->bindParam(1,$this->title,PDO::PARAM_STR);
				$stmt->bindParam(2,$this->author,PDO::PARAM_STR);
				$stmt->bindParam(3,$this->body,PDO::PARAM_STR);
				$stmt->bindParam(4,$this->image_id,PDO::PARAM_INT);
				//echo $stmt->param_count." parameters\n";
				$stmt->execute();
				return true;
	    }
		catch (PDOException $e){
			if($database->conn->inTransaction())$database->conn->rollBack();
			throw $e;
		}
		
	}
	
}

