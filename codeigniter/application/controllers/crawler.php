<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * クローラーコントローラー
 */
class Crawler extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		// 直アクセス禁止
		if (!$this->input->is_cli_request())
		{
			// exit;
		}

		$this->load->library('LogicCrawler');
	}

	/**
	 * 動画コンテンツを取得する
	 */
	public function get_videos()
	{
		// 配列
		$contents = array();

		// 指定サイトから動画情報を取得する
		$contents[] = $this->logiccrawler->get_from_tengoku();
		$contents[] = $this->logiccrawler->get_from_nukist();

		// クローラーが集めてきた動画を登録する
		$this->logiccrawler->set_crawled_videos($contents);
	}
}