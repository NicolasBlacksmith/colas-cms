<?php
class User_model  extends CI_Model
{

   private $database;

  function __construct()
  {
    parent::__construct();
      
     $this->database= $this->load->database('default', TRUE);
   	 $this->load->helper('date');
   	 $this->load->model('beans/user');
  }


  function insert_user($user){

  	 $this->database->insert('users', array(
          'nickname' => $user->nickname,
          'full_name' => $user->full_name,
          'email' => $user->email,
          'phone_number' => $user->phone_number,
          'password' => $user->password,
          'last_login'=> 0,
          'reg_date' =>time(),
          'avatar_id'=> $user->avatar_id,
          'is_active' => $user->is_active
      ));

  	  return $this->database->insert_id();
  }

  function insert_user_base_authority($user, $is_foreman,$is_economic){
    $this->database->insert('user_base_authority', array(
      'user_id' =>$user->user_id ,
      'is_economic'=>$is_economic,
      'is_foreman'=>$is_lector,
      'is_super_user' => FALSE,
    ));
  }

  function check_unique_nickname($user_id,$nickname){
      $this->database->like('nickname', $nickname, 'none'); 
      $this->database->where_not_in('id', array($user_id ));
      $this->database->from('users');
      if ($this->database->count_all_results()==0) {
        return true;
      }else{
        return false;
      }  

  }
  
  function check_unique_email($user_id,$email){
      $this->database->like('email', $email, 'none'); 
      $this->database->where_not_in('id', array($user_id ));
      $this->database->from('users');
      if ($this->database->count_all_results()==0) {
        return true;
      }else{
        return false;
      }  
  }
  
  function check_password($user_id, $password) {
    $this->database->from('users');
    $this->database->where(array(
      'id'       => $user_id,
      'password' => $password,
    ));

    return ($this->database->count_all_results() === 1);
  }

  function update_user($user){
      $this->database->update('users', array(
          'nickname' => $user->nickname,
          'full_name' => $user->full_name,
          'email' => $user->email,
          'phone_number' => $user->phone_number,
          'password' => $user->password,
          'avatar_id'=> $user->avatar_id,
          'is_active' => $user->is_active
      ), array('id' => $user->user_id));
  }

  function update_user_base_authority($user, $is_foreman,$is_economic) {
    $this->database->where('user_id', $user->user_id);
    $this->database->from('user_base_authority');

    if ($this->database->count_all_results() == 0) {
      $this->database->insert('user_base_authority', array(
        'user_id'         => $user->user_id,
        'is_economic' => $is_economic,
        'is_foreman' => $is_foreman,
        'is_super_user'   => FALSE,
      ));
    }
    else {
      $this->database->update('user_base_authority', array(
        'is_economic' => $is_economic,
        'is_foreman' => $is_foreman,
      ), array('user_id' => $user->user_id));
    }
  }

  function update_last_login($user){
     $this->database->update('users', array('last_login'=> time()),array('id' => $user->user_id));
  }

  function get_user_by_id($user_id){
    $query = $this->database->query('SELECT * FROM users WHERE id='.$user_id.' LIMIT 1');
        $user = new User();  
        if( $query->num_rows()!=0 ){
          foreach ($query->result() as $row)
          {
            $user->set_base_attributes_by_db_row($row);
          }
        }  
        $this->set_user_authorities($user);
        return $user;
  }

  function set_user_authorities($user){
    if ($user->user_id!=0) {
      $this->get_user_base_authority($user);
    }
  }


  function get_user_base_authority($user){
    $query = $this->db->get_where('user_base_authority', array('user_id' => $user->user_id));
    if($query->num_rows()!=0){
      foreach ($query->result() as $row)
      {
        $user->is_economic=$row->is_economic;
        $user->is_foreman=$row->is_foreman;
        $user->is_super_user=$row->is_super_user;
      }  
    }
    return $user;
  }

  function get_user_by_name_password($name,$password){
    $query = $this->database->query('SELECT * FROM users WHERE (nickname="'.$name.'" OR email="'.$name.'") AND password="'.$password.'" LIMIT 1');
    $user = new User(); 
    if( $query->num_rows()!=0 ){
      foreach ($query->result() as $row)
      {
        $user->set_base_attributes_by_db_row($row);
      }
    }
    
    $this->set_user_authorities($user);
    
    return $user;
  }


  function get_user_list(){
    $query = $this->database->query('SELECT * FROM users');
    $user_list=new ArrayObject();
    if( $query->num_rows()!=0 ){
      foreach ($query->result() as $row)
          {
            $user=new User();
            $user->set_base_attributes_by_db_row($row);
            $this->set_user_authorities($user);
            $user_list->append($user);
          }
    }
    return $user_list;
  }

  
 } 