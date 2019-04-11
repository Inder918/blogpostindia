<?php

# SET Environment For Database Connection..
# Read and write method for creating new files..

abstract class setEnvironment
{
	protected $host;
	protected $user;
	protected $pass;

	public function dbdata($host,$user,$pass,$name,$port="")
	{
		#filter all variables to use it safely...
		try{
			$host=filter_name($host);$user=filter_text($user);$pass=filter_text($pass);$name=filter_text($name);
			$content= "[database] \n driver = mysql \n host = {$host} \n port = {$port} \n schema = {$name} \n username = {$user} \n password = {$pass}";
			// Creating a configuration file...
			if(!$this->write_file("config.ini",$content)) throw new Exception("file can not be created...!!");
		}catch(Exception $e){
			echo $e;
		} 
	}

	protected function set_param()
	{
		if (defined("DRIVER") && defined("HOST") && defined("DB") && defined("PASS") && defined("UNAME"))
		{
	        $this->host = DRIVER . ':host=' . HOST . ((defined("PORT")) ? ';port=' . PORT : '') . ';dbname=' . DB;
	  		$this->pass= PASS;
	  		$this->user= UNAME;
  		}
	}


}

