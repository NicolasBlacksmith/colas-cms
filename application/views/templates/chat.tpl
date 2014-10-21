 <style>
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
	content: "<" !important;
	}
	
	.title_margin{
			margin-top:40px !important;	
	}
	

 </style>
 <input type="hidden" name="chat_time" id="chat_time" value="{$smarty.now}">   
 <nav id="menu-right">
 </nav>      