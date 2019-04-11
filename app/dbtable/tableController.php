<?php 
/**
 * Select, create, update, delete functionality..for database connection..!!! 
 */
namespace app\dbtable;

use app\dbtable\sqlProperty as coltype;


class table extends coltype
{
	
	public static function create($table,$array)
	{
		return self::make($table, implode(", ", $array));
	}




	public static function trash($table)
	{
		return self::drop($table);
	}



	public static function addcol($table,$col,$type)
	{
		return self::add($table,$col,$type);
	}




	public static function update($table,$col,$type)
	{
		return self::modify($table,$col,$type);
	}



	public static function dropcol($table,$col)
	{
		return self::trashcol($table,$col);
	}



	


}


