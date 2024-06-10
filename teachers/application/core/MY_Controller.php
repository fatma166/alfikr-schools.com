<?php
/**
 * Authentication Library
 *
 * @package Authentication
 * @category Libraries
 * @author Adam Griffiths
 * @link http://adamgriffiths.co.uk
 * @version 2.0.3
 * @copyright Adam Griffiths 2011
 *
 * Auth provides a powerful, lightweight and simple interface for user authentication .
 */


class Admin_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//date_default_timezone_set('Africa/Cairo');
		log_message('debug', 'Application Loaded');
		//$this->lang->load('arabic');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('Users_per');
	//	$this->load->library('ion_auth');

		/*if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}*/
		$this->load->library('session');
		if(!$this->session->userdata('teacher_id')) {
			redirect(base_url(), 'refresh');
		}


		/*if (!$this->ion_auth->is_admin())
		{
			$this->session->set_flashdata('message', 'You must be an admin to view this page');
			redirect('auth/login');
		}*/

		//$this->load->helper(array('email', 'ag_auth'));

		//$this->config->load('ag_auth');
	}

	public  function alias($string)
	{
		// Replace double byte whitespaces by single byte (East Asian languages)
		$str = preg_replace('/\xE3\x80\x80/', ' ', $string);

		// Remove any '-' from the string as they will be used as concatenator.
		// Would be great to let the spaces in but only Firefox is friendly with this

		$str = str_replace('-', ' ', $str);

		// Replace forbidden characters by whitespaces
		$str = preg_replace('#[:\#\*"@+=;!><&\.%()\]\/\'\\\\|\[]#', "\x20", $str);

		// Delete all '?'
		$str = str_replace('?', '', $str);
		$str = str_replace('؟', '', $str);

		// Trim white spaces at beginning and end of alias and make lowercase
		$str = trim(strtolower($str));

		// Remove any duplicate whitespace and replace whitespaces by hyphens
		$str = preg_replace('#\x20+#', '-', $str);

		return $str;
	}




}
