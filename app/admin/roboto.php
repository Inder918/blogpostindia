<?php

/**
 * 
 */
class Roboto  
{
	
	private $x;
	private $y;
	function __construct(argument)
	{
		# code...
	}

	protected function roboto(){
		$this->x= mt_rand(1,100);
		$this->y = mt_rand(1,10);
		return $this->x. "*" . $this->y ."+ your personal key" ;
    }
}