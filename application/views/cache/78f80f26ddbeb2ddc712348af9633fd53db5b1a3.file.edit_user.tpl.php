<?php /* Smarty version Smarty-3.1.18, created on 2014-09-16 23:29:01
         compiled from "application/views/templates/users/edit_user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5299407495418a9a4a83001-49812265%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78f80f26ddbeb2ddc712348af9633fd53db5b1a3' => 
    array (
      0 => 'application/views/templates/users/edit_user.tpl',
      1 => 1410902931,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5299407495418a9a4a83001-49812265',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5418a9a4b39801_52167425',
  'variables' => 
  array (
    'user' => 0,
    'current_user' => 0,
    'success_operation' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5418a9a4b39801_52167425')) {function content_5418a9a4b39801_52167425($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_zengo_date_short')) include '/Users/Miki/GitHub/colas-cms/application/libraries/Smarty-3.1.18/libs/plugins/modifier.zengo_date_short.php';
?> <div class="row ">
                <div class="col-md-12 m-20">
                    <form action="users/edit_user" method="post"  class="form-horizontal" role="form" id="settings">
                            <div class="panel">
                                    <div class="space20"></div>
                                    <div class="m-20" id="general_settings">
                                        <div class="row profile">
                                            <div class="col-md-12">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                       
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-12 profile-info">
                                                                    <?php if ($_smarty_tpl->tpl_vars['user']->value->user_id==0) {?>
                                                                        <h1>Új felhsználó</h1>
                                                                    <?php } else { ?>
                                                                        <h1><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['user']->value->full_name, 'UTF-8');?>
</h1>
                                                                        <h4>Member since: <?php echo smarty_modifier_zengo_date_short($_smarty_tpl->tpl_vars['user']->value->reg_date);?>
</h4>
                                                                    <?php }?>

                                                                    <input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->user_id;?>
">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                
                                                <div class="row profile-classic">
                                                    <div class="col-md-12">
                                                        <div class="panel">
                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-info c-gray m-r-10"></i> ADATOK</div>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Felhasználónév:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control"  name="nickname" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->nickname;?>
" id="nickname" />
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Teljes név:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control" name="full_name" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->full_name;?>
"></div>

                                                                </div>
                                                                <?php if ($_smarty_tpl->tpl_vars['user']->value->user_id>0&&$_smarty_tpl->tpl_vars['current_user']->value->user_id==$_smarty_tpl->tpl_vars['user']->value->user_id) {?>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Régi jelszó:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="password" class="form-control"  name="old_password" value="" id="old_password"></div>

                                                                </div>
                                                                <?php }?>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Új jelszó:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="password" class="form-control"  name="password" value="" id="first_password"></div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Jelszó mégegyszer:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="password" class="form-control"  name="passwordre" value="" id="second_password"></div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row profile-classic">
                                                    <div class="col-md-12 m-t-20">
                                                        <div class="panel">
                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-phone c-gray m-r-10"></i> ELÉRHETŐSÉG</div>
                                                            </div>
                                                            <div class="panel-body">
                                                                
                                                                <div class="row">
                                                                    <div class="control-label c-gray col-md-3">Email:</div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control" name="email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
" id="email" >
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="control-label c-gray col-md-3">Telefonszám:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control"  name="phone_number" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->phone_number;?>
">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row profile-classic">
                                                    <div class="col-md-12">
                                                        <div class="panel">
                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-group c-gray m-r-10"></i> AVATAR</div>
                                                            </div>
                                                            <div class="panel-body">
															
															<style>
																.edit_user_avatar {display: inline-block;height:70px; width:100px; float:left;}
																.edit_user_avatar .iradio_flat-blue{position: relative !important;
																			display: inline-block;
																			left: 25px;
																			top: -10px;}
															</style>
                                                                
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar1" type="radio"  name="avatar_id" value="1" <?php if ($_smarty_tpl->tpl_vars['user']->value->avatar_id==1) {?>checked<?php }?>/>
                                                                        <label for="avatar1"><img src="assets/img/avatars/avatar1.png" /></label>
                                                                      </div>    
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar2" type="radio"  name="avatar_id" value="2" <?php if ($_smarty_tpl->tpl_vars['user']->value->avatar_id==2) {?>checked<?php }?>/>
                                                                        <label for="avatar2"><img src="assets/img/avatars/avatar2.png" /></label>
                                                                      </div>   
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar3" type="radio"  name="avatar_id" value="3"  <?php if ($_smarty_tpl->tpl_vars['user']->value->avatar_id==3) {?>checked<?php }?>/>
                                                                        <label for="avatar3"><img src="assets/img/avatars/avatar3.png" /></label>
                                                                      </div>       
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar4" type="radio"  name="avatar_id" value="4"  <?php if ($_smarty_tpl->tpl_vars['user']->value->avatar_id==4) {?>checked<?php }?>/>
                                                                        <label for="avatar4"><img src="assets/img/avatars/avatar4.png" /></label>
                                                                      </div>        
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar5" type="radio"  name="avatar_id" value="5"  <?php if ($_smarty_tpl->tpl_vars['user']->value->avatar_id==5) {?>checked<?php }?>/>
                                                                        <label for="avatar5"><img src="assets/img/avatars/avatar5.png" /></label>
                                                                      </div>       
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar6" type="radio"  name="avatar_id" value="6"  <?php if ($_smarty_tpl->tpl_vars['user']->value->avatar_id==6) {?>checked<?php }?>/>
                                                                        <label for="avatar6"><img src="assets/img/avatars/avatar6.png" /></label>
                                                                      </div>      
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar7" type="radio"  name="avatar_id" value="7"  <?php if ($_smarty_tpl->tpl_vars['user']->value->avatar_id==7) {?>checked<?php }?>/>
                                                                        <label for="avatar7"><img src="assets/img/avatars/avatar7.png" /></label>
                                                                      </div>      
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar8" type="radio"  name="avatar_id" value="8"  <?php if ($_smarty_tpl->tpl_vars['user']->value->avatar_id==8) {?>checked<?php }?>/>
                                                                        <label for="avatar8"><img src="assets/img/avatars/avatar8.png" /></label>
                                                                      </div>    
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar9" type="radio"  name="avatar_id" value="9"  <?php if ($_smarty_tpl->tpl_vars['user']->value->avatar_id==9) {?>checked<?php }?>/>
                                                                        <label for="avatar9"><img src="assets/img/avatars/avatar9.png" /></label>
                                                                      </div>   
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar10" type="radio"  name="avatar_id" value="10"  <?php if ($_smarty_tpl->tpl_vars['user']->value->avatar_id==10) {?>checked<?php }?>/>
                                                                        <label for="avatar10"><img src="assets/img/avatars/avatar10.png" /></label>
                                                                      </div>       
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar11" type="radio"  name="avatar_id" value="11"  <?php if ($_smarty_tpl->tpl_vars['user']->value->avatar_id==11) {?>checked<?php }?>/>
                                                                        <label for="avatar11"><img src="assets/img/avatars/avatar11.png" /></label>
                                                                     </div>   
  
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar12" type="radio"  name="avatar_id" value="12"  <?php if ($_smarty_tpl->tpl_vars['user']->value->avatar_id==12) {?>checked<?php }?>/>
                                                                        <label for="avatar12"><img src="assets/img/avatars/avatar12.png" /></label>
                                                                      </div>    
                                                                      <div class="edit_user_avatar">
                                                                        <input id="avatar13" type="radio"  name="avatar_id" value="13"  <?php if ($_smarty_tpl->tpl_vars['user']->value->avatar_id==13) {?>checked<?php }?>/>
                                                                        <label for="avatar13"><img src="assets/img/avatars/avatar13.png" /></label>
                                                                      </div>   
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php if ($_smarty_tpl->tpl_vars['current_user']->value->is_super_user) {?>
                                                 <div class="row profile-classic">
                                                    <div class="col-md-12">
                                                        <div class="panel">
                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-phone c-gray m-r-10"></i> JOGOSULTSÁG</div>
                                                            </div>
                                                            <div class="panel-body">
                                                                     <div class="form-group">
                                                                            <div class="skin-section">
                                                                                <ul class="list">
                                                                                    <li>
                                                                                         <div class="row-fluid">
                                                                                        <label for="is_foreman">
                                                                                                    <input type="checkbox" id="is_foreman" <?php if ($_smarty_tpl->tpl_vars['user']->value->is_foreman) {?>checked<?php }?> data-size="small" name="is_foreman">
                                                                                                    Művezető
                                                                                        </label>
                                                                                         </div>
                                                                                    </li>
                                                                                    <li>
                                                                                         <div class="row-fluid">
                                                                                        <label for="is_economic">
                                                                                                    <input type="checkbox" id="is_economic" <?php if ($_smarty_tpl->tpl_vars['user']->value->is_economic) {?>checked<?php }?> data-size="small" name="is_economic">
                                                                                                    Gazdasági ügyintéző
                                                                                        </label>
                                                                                         </div>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                            </div>    
                                                       </div> 
                                                    </div>      
                                                </div> 
                                                <?php }?>           




                                                <div class="col-sm-12">
                                                    <div class="align-center">
                                                        <button class="btn btn-primary m-r-20" id="submit1">Mentés</button>
                                                        
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                 
                             </div>           
                        </form>
                </div>
            </div>
<?php if ($_smarty_tpl->tpl_vars['success_operation']->value!==false) {?>
    <script type="text/javascript">
        $(function() {
            <?php if ($_smarty_tpl->tpl_vars['success_operation']->value=="new") {?>
                show_success_notification("The new user created");
            <?php } elseif ($_smarty_tpl->tpl_vars['success_operation']->value=="modify") {?>
                show_success_notification("The profile has been modified successfully");
            <?php }?>
        });
    </script>
<?php }?>
<script src="assets/plugins/jquery-mobile/jquery.mobile-1.4.2.js"></script>
 
<?php }} ?>
