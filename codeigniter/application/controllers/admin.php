<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 管理画面コントローラ
 */
class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('LogicAdmin');
		$this->load->helper('url');
		$this->load->helper('form');

		// ログインチェック
		if (($this->uri->uri_string() != 'admin/login') && !$this->session->userdata('is_login'))
		{
			redirect('admin/login');
		}
	}

	/**
	 * ログイン
	 */
	public function login()
	{
		$data = array();

		// ログインしている状態
		if ($this->session->userdata('is_login') == true)
		{
			redirect('admin/index');
		}

		// ログインエラーフラグ
		$data['error_flag'] = false;

		// POSTデータ
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// バリデーションルール
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		// バリデーションチェック
		if ($this->form_validation->run() == true)
		{
			// アカウントチェック
			$valid_flag = $this->logicadmin->check_account($username, $password);
			// アカウントが有効であればログイン
			if ($valid_flag)
			{
				$this->session->sess_destroy();
				$this->session->sess_create();
				$this->session->set_userdata(array('is_login' => true));
				$this->session->set_userdata(array('username' => $username));
				redirect('admin/index');
			}
			else
			{
				// ログインエラーフラグ
				$data['error_flag'] = true;
			}
		}

		// 最初のアクセスもしくはバリデーションエラーもしくはログインエラー
		$data['username'] = $username;
		$data['password'] = $password;

		$this->load->view('admin/login', $data);
	}

	/**
	 * ログアウト
	 */
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}

	/**
	 * 管理画面トップ
	 */
	public function index()
	{
		$data = array();

		$this->load->view('admin/index', $data);
	}
}