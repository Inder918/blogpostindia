<?php

trait filehandler
{
	
	private $open;

	private function open_file($file,$mode)
	{
		$open= fopen($file,$mode) or false;
		return $open;
	}

	public function read_file($file)
	{
		$this->open=$this->open_file($file,"r+");
		return fread($this->open,filesize($file));
	}

	public function write_file($file,$text)
	{
		$this->open=$this->open_file($file,"w+");
		return (fwrite($this->open, $text)) ? true : false;
	}

	public function append_file($file,$text)
	{
		$this->open=$this->open_file($file,"a+");
		return (fwrite($this->open, "\n" . $text)) ? true : false;
	}

	private function close_file()
	{
		return fclose($this->open);
	}

}

