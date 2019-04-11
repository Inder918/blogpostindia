<?php

trait param
{
	public $id;

	public $username;

	public $password;

	public $firstname;

	public $lastname="";

	public $security_key;

	public $admin_key;

	public $name;

	public $email;

	public $subject;

	public $comment;

	public $comment_time;

	public $title;

	public $head;

	public $author;

	public $body;

	public $image_id;

	public $user_id;

	public $caption;

	public $discription;

	public $type;

	public $filename;

	public $alt_name;

	public $size;

	public $post_id;

	public $tmp_path;

	public $imageFileType ;

	public $upload_directory= "../../Assets/images";

	public $error= array();

	protected $upload_error_array= array(
      UPLOAD_ERR_OK=>"THERE IS NO ERROR",
      UPLOAD_ERR_INI_SIZE=>"the uploaded file exceeds the upload_max_filesize ",
      UPLOAD_ERR_FORM_SIZE=>"the uploaded file exceeds the max_file_size directive",
      UPLOAD_ERR_PARTIAL=>"the uploaded file was only partially uploaded",
      UPLOAD_ERR_NO_FILE=>"no file was upload",
      UPLOAD_ERR_NO_TMP_DIR =>"missing a temporary folder",
      UPLOAD_ERR_CANT_WRITE=>"failed to write file to disk",
      UPLOAD_ERR_EXTENSION=>"the php extension stopped the file upload"
    );
}