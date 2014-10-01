<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * トップページコントローラ
 */
class Top extends CI_Controller
{
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/top
	 *	- or -  
	 * 		http://example.com/index.php/top/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/top/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = array();
		// $this->load->Library('LogicCrawler');
		// $data['videos'] = $this->logiccrawler->get_from_tengoku();

		$category_csv = AppCsvLoader::load('category.csv');
		foreach ($category_csv as $key => $value)
		{
			$category['name'] = $value['name'];
			$category['id'] = $value['id'];
			$categories[] = $category;
		}

		$data['categories'] = $categories;

		$this->load->view('top', $data);
	}
}

/* End of file top.php */
/* Location: ./application/controllers/top.php */