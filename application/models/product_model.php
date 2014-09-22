<?php


class Product_model extends CI_Model{

   private $database;

  function __construct()
  {
    parent::__construct();
      
     $this->database= $this->load->database('default', TRUE);
   	 $this->load->helper('date');
   	 $this->load->model('beans/user');
  }

  



}