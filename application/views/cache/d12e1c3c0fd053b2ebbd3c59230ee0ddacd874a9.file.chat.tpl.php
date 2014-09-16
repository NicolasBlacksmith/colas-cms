<?php /* Smarty version Smarty-3.1.18, created on 2014-09-16 23:19:22
         compiled from "application/views/templates/chat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9883498085418a95a32e419-76948664%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd12e1c3c0fd053b2ebbd3c59230ee0ddacd874a9' => 
    array (
      0 => 'application/views/templates/chat.tpl',
      1 => 1410854482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9883498085418a95a32e419-76948664',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5418a95a33f4b7_81336596',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5418a95a33f4b7_81336596')) {function content_5418a95a33f4b7_81336596($_smarty_tpl) {?> <style>
 .mm-subtitle{
		 position: fixed !important;
		width: inherit !important;
		z-index: 1000 !important;
		}
	.mm-subclose{
			background: rgba(0,0,0,0.65) !important;
			color: rgba(256,256,256,0.7) !important;
	}
	
	.mm-menu .mm-list li a.mm-subopen:after, .mm-menu .mm-list li a.mm-subclose:before {
			border-color: rgba(256,256,256,0.7) !important;
			position: relative !important;
			left: -9px !important;
			top: 1px !important;
			}
	
	.mm-subclose::before
	{ 
	content: < !important;
	}
	
	.title_margin{
			margin-top:40px !important;	
	}
	

 </style>
 <input type="hidden" name="chat_time" id="chat_time" value="<?php echo time();?>
">   
 <nav id="menu-right">
 </nav>      <?php }} ?>
