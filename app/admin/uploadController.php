<?php

class upload extends root
{
	protected static $db_table="pictures";
	protected static $db_table_filed= array('discription', 'type', 'filename', 'size','post_id');
	use param;
	
	
	
	
	public function file_set($file){
		if(empty($file) || !$file || !is_array($file) ){
			$this->error= "there was no file uploaded here";
			return false;
		}else{
			if($file['error'] != 0){
				$this->error[]= $this->upload_error_array[$file['error']];
				return false;
			}else{
				$this->filename= basename($file['name']);
		        $this->imageFileType =  strtolower(pathinfo($this->picture_path(),PATHINFO_EXTENSION));
			    $this->type= $file['type'];
		        $this->size= $file['size'];
		        $this->tmp_path= $file['tmp_name'];
			}
		}
		
		
	}
	public function picture_path(){
		return $this->upload_directory . '/' . $this->filename;
	}
	public function save_it(){
			if(!empty($this->error)){
				return false;
			}
			if(empty($this->filename) || empty($this->tmp_path)){
				$this->error[]= "the file was not available";
				return false;
			}
			if (file_exists($this->picture_path())){
				$this->error[]= "the file { $this->filename } was already available";
				return false;
			}
			if ($this->size > 5000000) {
                $this->error[]= "Sorry, your file is too large.";
                return false;
            }
			if(false == getimagesize($this->tmp_path) ){
				$this->error[]= "File is not an image.";
				return false;
			}
			if($this->imageFileType !== "jpg" && $this->imageFileType !== "png" && $this->imageFileType !== "jpeg" && $this->imageFileType !== "gif" && $this->imageFileType !== "mp4") {
                $this->error[]= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                return false;
            }
			if(empty($this->error)){
				if(move_uploaded_file($this->tmp_path, $this->picture_path())){
					$this->save();
					unset($this->tmp_path);
					return true;
				} 
			}else{
				$this->error[] = "the file directory does not have permission..";
				return false;
			}
		
	}


	public function create(){
			global $database;
			$sql=$this->prepare();
		    $stmt = $database->conn->prepare($sql);
			$stmt->bindParam(1, $this->discription,PDO::PARAM_STR);
			$stmt->bindParam(2, $this->type, PDO::PARAM_STR);
			$stmt->bindParam(3, $this->filename,PDO::PARAM_STR);
			$stmt->bindParam(4, $this->size,PDO::PARAM_INT);
			$stmt->bindParam(5, $this->post_id,PDO::PARAM_INT);
			$stmt->execute();
			return true;
	}
	
	public function delete_photo(){
		if($this->delete_row()){
			$target=$this->picture_path();
			return (unlink($target)) ? true : false;
		}else return false;
	}
	
}
