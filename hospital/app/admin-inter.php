<?php

interface admin{

	#check admin credential
	private function credential_check();

	#cross check admin_key
	private function cross_check();

	#Session validator for admin portal
	private function Session_validator();

	# filter session values For Admin 
	private function Session_filter();

	#add Add User Using Admin Authority 
	public function Add();

	# Update User Information
	public function Update();

	#Edit User Information 
	public function Edit();

	# delete User 
	public function delete();

}