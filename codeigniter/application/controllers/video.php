<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 動画ページコントローラ
 */
class Video extends CI_Controller
{
	public function index($master_id = 0)
	{
		// ライブラリのロード
		$this->load->Library('LogicVideoManage');

		$data = array();

		// master_idがなければ404
		if (!$master_id)
		{
			show_404();
		}

		// カテゴリーリスト
		$category_csv = AppCsvLoader::load('category.csv');
		foreach ($category_csv as $key => $value)
		{
			$category['name'] = $value['name'];
			$category['id'] = $value['id'];
			$categories[] = $category;
		}
		$data['categories'] = $categories;

		// 動画ページ詳細を取得する
		$data['video'] = $this->logicvideomanage->get_details($master_id);

		$this->load->view('video', $data);
	}
}