<?php

class User_session_model extends CI_Model {

  private $database;

  public function __construct() {
    parent::__construct();

    $this->database = $this->load->database('default', TRUE);
    $this->load->helper('date');
    $this->load->model('beans/user');
    $this->load->model('beans/user_session');
  }

  public function update_user_session($user_session) {
    $this->database->update('ci_sessions', array(
      'ip_address'    => $user_session->ip_address,
      'user_agent'    => $user_session->user_agent,
      'last_activity' => $user_session->last_activity,
      'user_data'     => serialize($user_session->user_data),
        ), array('session_id' => $user_session->session_id));
  }

  public function get_sessions() {
    $sessions = array();
    $query    = $this->database->query('SELECT * FROM ci_sessions');

    foreach ($query->result() as $row) {
      $session = new User_session();
      $session->set_base_attributes_by_db_row($row);

      $sessions[] = $session;
    }

    return $sessions;
  }

  public function get_online_users(){
    $user_list = new ArrayObject();
    $time=time()-$this->session->sess_expiration;
    $query    = $this->database->query('SELECT * FROM ci_sessions WHERE last_activity>'.$time);

    foreach ($query->result() as $row) {
      $session = new User_session();
      $session->set_base_attributes_by_db_row($row);
      if ($session->user->user_id!=0) {
        $user_list->append($session->user);
      }
    }

    return $user_list;

  }

  public function get_sessions_by_user($user) {
    $user_sessions = array();
    $all_session   = $this->get_sessions();

    foreach ($all_session as $session) {
      if ($session->user->user_id == $user->user_id) {
        $user_sessions[] = $session;
      }
    }

    return $user_sessions;
  }

  public function update_user_sessions($user) {
    $user_sessions = $this->get_sessions_by_user($user);

    foreach ($user_sessions as $user_session) {
      $user_session->user = $user;
      
      $data = $user_session->user_data;
      $data['current_user'] = serialize($user);
      $user_session->user_data = $data;

      $this->update_user_session($user_session);
    }
  }
  
  public function clean_sessions($user) {
    $session_data = $this->session->all_userdata();
    $session_id   = $session_data['session_id'];
    $all_session  = $this->get_sessions();

    foreach ($all_session as $one_session) {
      if ($one_session->user->user_id == $user->user_id && $one_session->session_id != $session_id) {
        $this->database->delete('ci_sessions', array(
          'session_id' => $one_session->session_id,
        ));
      }
    }
  }

}
