<?php
class User 
{
	public $user_id;
	public $nickname;
	public $full_name;
	public $email;
	public $phone_number;
	public $password;
	public $is_active;
	public $avatar_id;

	public $last_login;
	public $reg_date;

	public $is_economic;
	public $is_foreman;
	public $is_super_user;

	//SETTINGS
	public $is_locked;
	public $last_path;

	function __construct($argument="")
	{
		$this->user_id=0;
		$this->is_active=TRUE;
		$this->avatar_id=1;
		$this->is_economic=FALSE;
		$this->is_foreman=FALSE;
		$this->is_user_manager=FALSE;
		

		$this->last_login=time();

		$this->is_locked=FALSE;
		$this->last_path="dashboard";
	}


	function set_base_attributes_by_array($array){
		$this->user_id=$array["user_id"];
		$this->nickname=$array["nickname"];
		$this->full_name=$array["full_name"];
		$this->password=$array["password"];
		$this->phone_number=$array["phone_number"];
		$this->email=$array["email"];
		$this->avatar_id=$array["avatar_id"];
	}

	function set_base_attributes_by_db_row($row){
		$this->user_id=$row->id;
		$this->nickname=$row->nickname;
		$this->full_name=$row->full_name;
		$this->password=$row->password;
		$this->phone_number=$row->phone_number;
		$this->email=$row->email;
		$this->last_login=$row->last_login;
		$this->is_active=$row->is_active;
		$this->reg_date=$row->reg_date;
		$this->avatar_id=$row->avatar_id;
	}

}