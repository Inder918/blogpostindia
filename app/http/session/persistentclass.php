<?php

trait persistent
{
	protected $cookie= "my_cookie";

	protected $table_sess= "sessions";

	protected $table_user= "admin";

	protected $table_autologin= "autologin";

	protected $col_sid= "sid";

	protected $col_expiry= "expiry";

	protected $col_data= "data";
	
	protected $col_name= "username";

	protected $col_ukey= "user_key";

	protected $col_token= "token";

	protected $col_created= "created";

	protected $col_used= "used";

	protected $sess_persist= "remember";

	protected $sess_uname= "username";

	protected $sess_auth= "authenticated";

	protected $sess_revalid= "revalidated";

	protected $sess_ukey= "user_key";

	public $visitor_count;
}