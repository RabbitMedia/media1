<?php

/**
 * クローラー動画IDモデル
 */
class Crawler_video_id_model extends CI_Model
{
	const TYPE_XVIDEOS = 1;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'crawler_video_id';
	}

	/**
	 * レコード取得
	 */
	public function get($crawler_master_id)
	{
		// select
		$this->db->select('type, video_url_id');
		// where
		$this->db->where('crawler_master_id', $crawler_master_id);

		// クエリの実行
		$query = $this->db->get($this->table_name);
		// 該当するレコードがある場合は結果を配列で返す
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return null;
		}
	}

	/**
	 * レコード削除
	 */
	public function delete($crawler_master_id)
	{
		// set
		$this->db->set('delete_time', date("Y-m-d H:i:s"));
		// where
		$this->db->where('crawler_master_id', $crawler_master_id);

		// クエリの実行
		$this->db->update($this->table_name);

		// 処理された行数を返す
		return $this->db->affected_rows();
	}
}