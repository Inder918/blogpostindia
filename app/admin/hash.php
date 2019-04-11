<?php

/**
 *  For hashing Characters and numbers
 */
class encrypt 
{
	public $count;

	private function generate_hash(){
		$str=hash('md5',mt_rand(999999,9999999));
		$replace_str=['Z','o','t','T','f','F','s','S','e','n'];
		$str=str_replace($replace_str,'',$str);
		return $str;
	}

	private function replace(string $int){
		$dummy=['Z'=>'0','o'=>'1','t'=>'2','T'=>'3','f'=>'4','F'=>'5','s'=>'6','S'=>'7','e'=>'8','n'=>'9'];
		return implode(array_keys($dummy,$int));
	}


	private function reverse_replace(string $str){
		$dummy=['0'=>'Z','1'=>'o','2'=>'t','3'=>'T','4'=>'f','5'=>'F','6'=>'s','7'=>'S','8'=>'e','9'=>'n'];
		return implode(array_keys($dummy,$str));
	}

	private function random(int $i){
		$x=4 * $i;$y= $x + 3;
		return mt_rand($x,$y);
	}


	public  function get_id(string $str)
	{
		$str=str_rot13($str);
		$str=str_split($str);
		$a=array_pop($str);
		$b=array_pop($str);
		$this->count=$b.$a;
			if(count($str) == $this->count ){
				$dummy=[];
				foreach($str as $k=>$v){
					$dummy[$k]=$this->reverse_replace($v);
				}return implode('',$dummy);
			}else return redirect("../../includes/html/403.php");
		
	}


	public  function hash_id(int $int){
		$int=str_split($int);
		$dummy=[];
		foreach($int as $k=>$value){
			$dummy[$k]=$this->replace($value);
		}
		$num_key=count($dummy);
		$genhash=str_split($this->generate_hash());
		for($i=0;$i<$num_key;$i++){
		array_splice($genhash,$this->random($i),0,$dummy[$i]);
		}
		$this->count=count($genhash);
		return str_rot13(implode('',$genhash)).$this->count;
		
	}

}

$hash=new encrypt();

