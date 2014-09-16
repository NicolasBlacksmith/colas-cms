<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['zengo']['user_manager_edit_user_manager'] = false;  // administrator can ban another administrator or not
$config['zengo']['super_edit_super'] =false;	  // superuser can be edit another superuser
$config['zengo']['show_session_alert_before_expiration']=60*0.5; 
$config['zengo']['lock_user_before_session_expiration']=5; 
$config['zengo']['stockphoto']                           = array(
  'upload_dir'       => 'stockphotos',
  'thumbnail_dir'    => 'stockphotos' . DIRECTORY_SEPARATOR . 'thumbnails',
  'allowed_types'    => 'gif|jpg|jpeg|png',
  'max_size'         => 3 * 1024, // kilobytes
  'max_width'        => 1920 * 4,
  'max_height'       => 1080 * 4,
  'thumbnail_width'  => 500,
  'thumbnail_height' => 300,
);
