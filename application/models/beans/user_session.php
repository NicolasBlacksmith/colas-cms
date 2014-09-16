<?php

class User_session {

  public $session_id;
  public $ip_address;
  public $user_agent;
  public $last_activity;
  public $user_data;
  public $user;

  function __construct() {
    $this->session_id    = '';
    $this->ip_address    = '';
    $this->user_agent    = '';
    $this->last_activity = 0;
    $this->user_data     = '';
    $this->user          = new User();
  }

  function set_base_attributes_by_db_row($row) {
    $this->session_id    = $row->session_id;
    $this->ip_address    = $row->ip_address;
    $this->user_agent    = $row->user_agent;
    $this->last_activity = $row->last_activity;
    $this->user_data     = @unserialize($row->user_data);

    $data = $this->user_data;
    
    if (is_array($data) && array_key_exists('current_user', $data)) {
      $inner_data = @unserialize($data['current_user']);

      if ($inner_data instanceof User) {
        $this->user = $inner_data;
      }
    }
  }

}
