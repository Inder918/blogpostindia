<?php

abstract class root
{
	protected function v_string()
	{
        $count=count(static::$db_table_filed);
		$v=array();
		$s= '?';
	     for ($i=0;$i < $count;$i++)
	     {
			 $v[$i]=$s;
		 }
		 return $v;
	}

	protected function property()
	{
		$calling_class= get_called_class();
		$property= array();
		foreach(static::$db_table_filed as $db_filed)
		{
			if(property_exists($calling_class, $db_filed))
			{
				$property[$db_filed] = $this->$db_filed;
			}
		}
		return $property;
	}

	protected function clean_property(){
		global $database;
		$clean=array();
        foreach($this->property() as $key => $value)
        {
			$clean[$key]= filter_text($value);
		}	
		return $clean;
	}



	public function prepare()
	{
		
		$property= $this->clean_property();
		$sql="INSERT INTO " .static::$db_table. " (" . implode(",",array_keys($property)).")";
		$sql.=" VALUES (".implode(",",$this->v_string()).")";
		return $sql;
		
	}
	
	public function create(){
		try{
			global $database;
			$property= $this->clean_property();
			$param=[];
			$sql= $sql="INSERT INTO " .static::$db_table. " (" . implode(",",array_keys($property)).")";
			$sql.=" VALUES (".implode(",",$this->v_string()).")";
			$stmt= $database->conn->prepare($sql);
			foreach($property as $key => $value){
				$param[]=$value;
			}
			return ($stmt->execute($param)) ? true :false;
		}catch (PDOException $e){
			if($database->conn->inTransaction())$database->conn->rollBack();
			throw $e;
		}
	}


	public function update()
	{
		try{
			global $database;
			$property= $this->clean_property();
			$key_value_pair=array();
			$param=[];
			foreach($property as $key => $value)
			{
				$key_value_pair[] = " {$key} =?";
			}
			$sql="UPDATE " .static::$db_table. " SET ";
			$sql .= implode(",", $key_value_pair);
			$sql .=" WHERE id= ?";
			$stmt = $database->conn->prepare($sql);
			foreach($property as $key => $value){
				$param[]=$value;
			}
			$param[]=$this->id;
			return ($stmt->execute($param)) ? true :false;
		}catch (PDOException $e){
			if($database->conn->inTransaction())$database->conn->rollBack();
			throw $e;
		} 
	}	

	public function delete_row()
	{
		try{
			global $database;
			$sql="DELETE FROM " .static::$db_table. " ";
			$sql .= " WHERE id= :id";
			$sql .= " LIMIT 1";
			$stmt = $database->conn->prepare($sql);
			$stmt->bindParam(":id",$this->id,PDO::PARAM_INT);
			$stmt->execute();
			return  true;
		}catch (PDOException $e){
			if($database->conn->inTransaction())$database->conn->rollBack();
			throw $e;
		}
		
	}


	public function save()
	{
		return isset($this->id) ? $this->update() : $this->create() ;
	}

	public static function your_query($qry)
	{
		global $database;
		$result=$database->query($qry);
		$the_object_array=array();
		while($row=$result->fetch(PDO::FETCH_ASSOC))
		{
			$the_object_array[]=static::instant($row);	
		}
		return $the_object_array;
		
	}

	public static function find_all()
	{
		$result=static::your_query("SELECT * FROM " .static::$db_table. " ORDER BY `id` ASC");
		return $result;
	}

	public static function all_blog($sql)
	{
		$result=static::your_query($sql);
		return $result;
	}


	public static function find_ById($id)
	{
		$result_array=static::your_query("SELECT * FROM " .static::$db_table. " WHERE id= $id LIMIT 1");
		return !empty($result_array)? array_shift($result_array): false;
	}

	public static function find_imageId($image_id)
	{
		$result_array=static::your_query("SELECT * FROM " .static::$db_table. " WHERE image_id= $image_id LIMIT 1");
		return !empty($result_array)? array_shift($result_array): false;
	}
	
	public static function instant($id)
	{
		$calling_class= get_called_class();
        $object= new $calling_class;
		foreach($id as $atrribute=>$value){
			if($object->has_atrribute($atrribute)){
				$object-> $atrribute= $value;
			}
		}
		return $object;
    }
	

	private function has_atrribute($atrribute){
		$object_property=get_object_vars($this);
		return array_key_exists($atrribute,$object_property);
	}

	public static function count_all(){
		global $database;
		try{
		$sql="SELECT COUNT(*) FROM ".static::$db_table."";
		$result=$database->query($sql);
		$row=$result->fetch(PDO::FETCH_ASSOC);
		return array_shift($row);
		}
		catch (PDOException $e){
			if($database->conn->inTransaction())$database->conn->rollBack();
			echo $e->getMessage();
		}

	}


}


