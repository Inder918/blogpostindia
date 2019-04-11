<?php  

# Database Connection Using PDO

class Auth extends setEnvironment
{
	public $conn;
	use filehandler;
	public function __construct(){
		try {
				(!empty($this->open)) ? $this->close_file() : false;
				$this->set_param();
				if(!empty($this->host) && !empty($this->user)){
				   $this->conn = new PDO($this->host,$this->user,$this->pass);
				    // set the PDO error mode to exception
				   $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    }
		    }
		catch(PDOException $e)
		    {
		    	echo $e->getMessage();
		    }
		    
	}
	
	

	public function query($sql)
	{
		try {
				$run=$this->conn->prepare($sql);
				if ($run->execute() === true) {
					return $run;
				}else throw new PDOException("query not successfull...");
				
			}
		catch(PDOException $e)
			{
				echo $e->getMessage();
			}
	}

   
}
$database=new Auth();