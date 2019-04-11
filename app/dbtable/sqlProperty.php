<?php 
namespace app\dbtable;

abstract class sqlProperty{

	public function increment($col,$size=11)
	{
		return $col ." INT({$size}) UNSIGNED AUTO_INCREMENT PRIMARY KEY";
	}


	public function integer($col,$size=11)
	{
		return $col ." INT({$size}) UNSIGNED NOT NULL";
	}




	public function primary()
	{
		return " PRIMARY KEY";
	}



	public function notnull()
	{
		return " NOT NULL";
	}



	public function unique()
	{
		//return " UNIQUE";
	}


	public function default()
	{
		//return " DEFAULT";
	}


	public function check($condition)
	{
		//return " CHECK". $condition;
	}


	public function index($name)
	{
		return "INDEX  ".$name. " (".$name.") ";
	}


	public function addindex($table,$colomn)
	{
	
		global $database;
		$sql= "ALTER TABLE " .$table. " ADD INDEX(".$colomn.")";
		$database->query($sql);
	}




	public function string($col,$size=255)
	{
		return $col ." VARCHAR({$size}) NOT NULL";
	}

	public function text($col)
	{
		return $col ." TEXT NOT NULL";
	}



	public function timestamp($date)
	{
		return $date ." TIMESTAMP";
	}

	public function foreign($coloum,$reltable,$key)
	{
		return "FOREIGN KEY (".$coloum.") REFERENCES ".$reltable."(".$key.")";
	}


//not working forign ========================
	public function addforeign($table,$coloum,$reltable,$key)
	{
		global $database;
		$sql="ALTER TABLE " .$table. " ADD FOREIGN KEY (".$coloum.") REFERENCES ".$reltable."(".$key.")";
	    $database->query($sql);
	}
//===========================================================
	protected static function make($table,$sql)
	{
		global $database;
		$qry= "CREATE TABLE ".$table." (";
		$qry .= " $sql ";
		$qry .= " );";
		if($qry)
		{
			$database->query($qry);
		}
	}

	protected static function drop($table)
	{
		global $database;
		$qry= "DROP TABLE ". $table;
		if($qry)
		{
			$database->query($qry);
		}
	}

	protected static function add($table,$col,$type)
	{
		global $database;
		$qry= "ALTER TABLE ".$table." ";
		$qry .=	" ADD ".$col." ".$type.";";
		if($qry)
		{
			$database->query($qry);
		}
	}



	protected static function modify($table,$col,$type)
	{
		global $database;
		$qry= "ALTER TABLE ".$table." ";
		$qry .=	" MODIFY COLUMN ".$col." ".$type.";";
		if($qry)
		{
			$database->query($qry);
		}
	}


	protected static function trashcol($table,$col)
	{
		global $database;
		$qry= "ALTER TABLE ".$table." ";
		$qry .=	" DROP COLUMN ".$col.";";
		if($qry)
		{
			$database->query($qry);
		}
	}

}


