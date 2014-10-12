<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LogicVideoManage
{
	protected $CI;

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('video_master_model');
		$this->CI->load->model('video_id_model');
		$this->CI->load->model('video_category_model');
		$this->CI->load->model('crawler_video_master_model');
		$this->CI->load->model('crawler_video_id_model');
		$this->CI->load->model('crawler_video_title_model');
	}

	/**
	 * 動画をアップする
	 */
	public function upload($item)
	{
		// トランザクション begin
		$this->CI->db->trans_begin();

		// video_masterに登録する
		$data = array(
			'title'			=> html_escape($item['title']),
			'thumbnail_url'	=> str_replace('thumbs', 'thumbsl', $item['thumbnail']),
			'duration'		=> $item['duration'],
			);
		$master_id = $this->CI->video_master_model->insert($data);

		// master_idが正常でなければinsertに失敗している
		if (!$master_id)
		{
			// トランザクション rollback
			$this->CI->db->trans_rollback();
			return null;
		}
		else
		{
			// video_idに登録する
			$results = array();
			foreach ($item['type'] as $key => $type)
			{
				$data = array(
					'master_id'		=> $master_id,
					'type'			=> $type,
					'video_url_id'	=> $item['video_url_id'][$key],
					);
				$results[] = $this->CI->video_id_model->insert($data);
			}
			// 返り値チェック
			foreach ($results as $result)
			{
				if (!$result)
				{
					// トランザクション rollback
					$this->CI->db->trans_rollback();
					return null;
				}
			}

			// video_categoryにメインカテゴリーを登録する
			$results = array();
			foreach ($item['main_category'] as $category)
			{
				$data = array(
					'master_id'		=> $master_id,
					'category'		=> $category,
					'display_flag'	=> video_category_model::DISPLAY_ON,
					);
				$results[] = $this->CI->video_category_model->insert($data);
			}
			// 返り値チェック
			foreach ($results as $result)
			{
				if (!$result)
				{
					// トランザクション rollback
					$this->CI->db->trans_rollback();
					return null;
				}
			}

			// video_categoryにサブカテゴリーを登録する
			$results = array();
			foreach ($item['sub_category'] as $category)
			{
				$data = array(
					'master_id'		=> $master_id,
					'category'		=> $category,
					'display_flag'	=> video_category_model::DISPLAY_OFF,
					);
				$results[] = $this->CI->video_category_model->insert($data);
			}
			// 返り値チェック
			foreach ($results as $result)
			{
				if (!$result)
				{
					// トランザクション rollback
					$this->CI->db->trans_rollback();
					return null;
				}
			}

			// クロールド動画を削除する
			$result = $this->delete_crawled_videos($item['crawler_master_id'], false);
			// 返り値チェック
			if (!$result)
			{
				// トランザクション rollback
				$this->CI->db->trans_rollback();
				return null;
			}
		}

		// トランザクション commit
		$this->CI->db->trans_commit();

		return $master_id;
	}

	/**
	 * 動画を削除する(クロールド動画)
	 */
	public function delete_crawled_videos($crawler_master_id, $transaction_flag = false)
	{
		// トランザクション start
		if ($transaction_flag)
		{
			$this->CI->db->trans_start();
		}

		// crawler_video_masterを削除する
		$result = $this->CI->crawler_video_master_model->delete($crawler_master_id);
		// 返り値チェック
		if (!$result)
		{
			// トランザクション rollback
			if ($transaction_flag)
			{
				$this->CI->db->trans_rollback();
			}
			return null;
		}

		// crawler_video_idを削除する
		$result = $this->CI->crawler_video_id_model->delete($crawler_master_id);
		// 返り値チェック
		if (!$result)
		{
			// トランザクション rollback
			if ($transaction_flag)
			{
				$this->CI->db->trans_rollback();
			}
			return null;
		}

		// crawler_video_titleを削除する
		$result = $this->CI->crawler_video_title_model->delete($crawler_master_id);
		// 返り値チェック
		if (!$result)
		{
			// トランザクション rollback
			if ($transaction_flag)
			{
				$this->CI->db->trans_rollback();
			}
			return null;
		}

		// トランザクション complete
		if ($transaction_flag)
		{
			$this->CI->db->trans_complete();
		}

		return $crawler_master_id;
	}
}