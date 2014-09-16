<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require "Smarty-3.1.18/libs/Smarty.class.php";

/**
* @file system/application/libraries/Mysmarty.php
*/
class Mysmarty extends Smarty
{
	function __construct()
	{
		//$this->Smarty();
		parent::__construct();

		$config =& get_config();

		// absolute path prevents "template not found" errors
		/*$this->template_dir = (!empty($config['smarty_template_dir']) ? $config['smarty_template_dir'] 
																	  : BASEPATH . 'application/views/templates');
																	
		$this->compile_dir  = (!empty($config['smarty_compile_dir']) ? $config['compile_dir'] 
																	 : BASEPATH . 'application/views/cache');      
		*/
		$this->template_dir = (!empty($config['smarty_template_dir']) ? $config['smarty_template_dir'] 
																  : APPPATH . 'views/templates');

		$this->compile_dir  = (!empty($config['smarty_compile_dir']) ? $config['compile_dir'] 
																 : APPPATH . 'views/cache');
		
		if (function_exists('site_url')) {
    		// URL helper required
			$this->assign("site_url", site_url()); // so we can get the full path to CI easily
		}

		/* SMARTY 3.X miatt kilőve 2014.05.06
		// register Smarty resource named "ci"
		$this->register_resource("ci", array($this,
						"ci_get_template", "ci_get_timestamp", "ci_get_secure", "ci_get_trusted")
		);
		*/
	}
	
	function view($resource_name, $cache_id = null)   {
		if (strpos($resource_name, '.') === false) {
			$resource_name .= '.tpl';
		}
		return parent::display($resource_name, $cache_id);
	}
	
	/**
	 *  Parse a template using Smarty engine
	 *
	 * Parses pseudo-variables contained in the specified template,
	 * replacing them with the data in the second param.
	 * Allows CI and Smarty code to be combined in the same template
	 * by prefixing template name with "ci:".
	 */
	function parse($template, $data, $return = FALSE)
	{
		if ($template == '')
		{
			return FALSE;
		}

		$CI =& get_instance();

		$CI->benchmark->mark('smarty_parse_start');

		if (is_array($data))
		{
			$this->assign($data);
		}

		// make CI object directly accessible from a template (optional)
	/* SMARTY 3.X miatt kilőve 2014.05.06*/
	//	$this->assign_by_ref('CI', $CI);

		$template = $this->fetch($template);

		if ($return == FALSE)
		{
			$CI->output->final_output = $template;
		}

		$CI->benchmark->mark('smarty_parse_end');

		return $template;
	}
	
	/**
	 * Smarty resource accessor functions
	 */
	function ci_get_template ($tpl_name, &$tpl_source, &$smarty_obj)
	{
		$CI =& get_instance();

		// ask CI to fetch our template
		$tpl_source = $CI->load->view($tpl_name, $smarty_obj->get_template_vars(), true);
		return true;
	}

	function ci_get_timestamp($view, &$timestamp, &$smarty_obj)
	{
		$CI =& get_instance();

		// Taken verbatim from _ci_load (Loader.php, 580):
		$ext = pathinfo($view, PATHINFO_EXTENSION);
		$file = ($ext == '') ? $view.EXT : $view;
		$path = $CI->load->_ci_view_path.$file;

		// get file modification date
		$timestamp = filectime($path);
		return ($timestamp !== FALSE);
	}

	function ci_get_secure($tpl_name, &$smarty_obj)
	{
		// assume all templates are secure
		return true;
	}

	function ci_get_trusted($tpl_name, &$smarty_obj)
	{
		// not used for templates
	}
} // END class smarty_library
?>
