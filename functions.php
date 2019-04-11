<?php 

error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING | E_RECOVERABLE_ERROR );

function filter_int(int $int){
	if (filter_var($int, FILTER_VALIDATE_INT) === 0 || filter_var($int, FILTER_VALIDATE_INT )){
		return $int;
    }else{
		return _fail();
	}
}
function filter_email($email=""){
	$clean_email=filter_text($email);
	$clean_email2= str_replace(' ', '', $clean_email);
	if (filter_var($clean_email2, FILTER_SANITIZE_EMAIL) && filter_var($clean_email2, FILTER_VALIDATE_EMAIL)){
		return $clean_email2;
    }else{
		 return _fail();
	}
}
function filter_url($url){
	$clean_url=filter_text($url);
	$clean_url2= str_replace(' ', '', $clean_url);
	if(filter_var($clean_url2, FILTER_SANITIZE_URL) && filter_var($clean_url2, FILTER_VALIDATE_URL)){
		  return $clean_url2;
    }else{
		 return _fail();
	}
}

function filter_name($name=""){
	$clean_name=filter_text($name);
	if (preg_match("/^[a-zA-Z ]*$/",$clean_name)){
		return $clean_name;
    }
	else{
		return _fail();
	}
}
function filter_text($text=""){
	$clean_text=strip_tags($text);
	if( trim($clean_text) && stripslashes($clean_text) && htmlspecialchars($clean_text)){
		return $clean_text;
	}
	
}



function _fail(){
	return false;
}


function __autoload($class){
	$class=strtolower($class);
	$the_file="{$class}.php";
	if(true===$the_file){
		require_once($the_file);
	}else
		die("<h1>some required files are missing from directory...request can not be proceed..</h1>the file name {$class}.php not present..");
}


function _true(){
	return true;
}

function check_constant_entry(){
	
    if(!defined("DRIVER") && !defined("HOST") && !defined("DB") && !defined("PASS") && !defined("UNAME")){
	    //redirect('storage/admin-pages/admin-data-entry.php');
    }else{
	    return _fail();
    }
    
}


# redirect internal links page 


function redirect($loc){
	header("Location: {$loc}");
}


# define constant by function


function define_constant($constant,$value){
	$value=filter_text($value);$costant=filter_text($constant);
	define($constant,$value);
	return $cnst;
}

function _zero() {
	return 0;
}

function back_space( $number)
{
	$back="../";
	if($number >= 1 && $number <=10)
	{
		for ($i=1; $i<=$number ; $i++) 
		{ 
			echo $back;
		}
	}else{
		return _null();
	}
}



function _array() {
	return array();
}


function _null() {
	return null;
}

function get_num_of_string($string,int $num_of_words=200)
    {
        $string = preg_replace('/\s+/', ' ', trim($string));
        $string=strip_tags($string);
        $words = explode(" ", $string);
        $new_words=[];
        $new_string = empty_string();
        for ($i = 0; $i < count($words); $i++) {
        	if($words[$i] !== "&nbsp;"){
        		$new_words[] = $words[$i];
        	}
        }
        // if number of words you want to get is greater than number of words in the string
        if ($num_of_words > count($new_words)) {
            $num_of_words = count($new_words);
        }
        for ($j=0; $j < $num_of_words; $j++) { 
        			$new_string .= $new_words[$j] . " ";
        		}

         return trim($new_string);
    }
	



function required_files(array $files)
{
	foreach($files as  $file){
		if(is_array($file)){
			require_once(back_space($file[0]).$file[1]);
		}else require_once $file;
	}
	
}

function file_path(string $string, $count=null)
{
	return back_space($count).$string;
}


function _e($str){
    echo $str;
}


function rand_num(){
	return mt_rand(9999,99999);
}


function encrpt($str){
	$str=count_chars($str,3);
	$str=str_split($str);
	if(is_array($str)){
		foreach ($str as $key => $value) {
			#code..
		}
	}
}



function empty_string() {
	return '';
}


function find_route_init(){
	#code...
}


function link_image($image){
	try{
		global $database;
		$sql="SELECT filename FROM pictures WHERE post_id=$image LIMIT 1";
		$run=$database->query($sql);
		if($result= $run->fetch()){
			return $result['filename'];
		}else return "wordpressworld.jpg";
	}
	catch(PDOException $e)
			{
				echo $e->getMessage();
			}
	
	
}



