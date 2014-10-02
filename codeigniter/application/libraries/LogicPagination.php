<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LogicPagination {

	/**
	 * ページネーションを生成する
	 */
	public function get($page, $config)
	{
		// コンテンツ総数
		$pagination['total_count'] = $config['total_count'];
		// 1ページあたりのコンテンツ表示数
		$pagination['count_per_page'] = $config['count_per_page'];
		// ページ数
		$pagination['max_page'] = ceil($pagination['total_count'] / $pagination['count_per_page']);
		// ページ番号の表示数(左, 右, 合計)
		$pagination['num_links_left'] = $config['num_links_left'];
		$pagination['num_links_right'] = $config['num_links_right'];
		$pagination['num_links_sum'] = $config['num_links_left'] + 1 + $config['num_links_right'];

		// 存在しないページは404
		if (!preg_match('/^[0-9]+$/',$page) || !preg_match('/^[1-9]+/',$page) || $page > $pagination['max_page'])
		{
			show_404();
		}
		else
		{
			// 最後のページリンクの表示フラグ
			if ($pagination['max_page'] > $pagination['num_links_sum'] && $page < ($pagination['max_page'] - 2))
			{
				$pagination['last_flag'] = true;
				$pagination['last_tag'] = '<a href="/admin/crawled_videos/'.$pagination['max_page'].'">'.$pagination['max_page'].'</a>';
			}
			else
			{
				$pagination['last_flag'] = false;
			}

			// "前へ"リンクの表示フラグ
			if ($page > 1)
			{
				$pagination['prev_flag'] = true;
				$pagination['prev_link'] = '/admin/crawled_videos/'.($page - 1);
			}
			else
			{
				$pagination['prev_flag'] = false;
			}

			// "次へ"リンクの表示フラグ
			if ($page == $pagination['max_page'])
			{
				$pagination['next_flag'] = false;
			}
			else
			{
				$pagination['next_flag'] = true;
				$pagination['next_link'] = '/admin/crawled_videos/'.($page + 1);
			}

			// ページ番号タグ
			if ($pagination['max_page'] <= $pagination['num_links_sum'])
			{
				for ($i = 1; $i <= $pagination['max_page']; $i++)
				{
					if ($page != $i)
					{
						$pagination['page_tag'][] = '<a href="/admin/crawled_videos/'.$i.'">'.$i.'</a>';
					}
					else
					{
						$pagination['page_tag'][] = '<a href="/admin/crawled_videos/'.$i.'" class="active">'.$i.'</a>';
					}
				}
			}
			else
			{
				if ($pagination['last_flag'])
				{
					if ($page > 1)
					{
						for ($i = ($page - $pagination['num_links_left']) ? $page - $pagination['num_links_left'] : 1; $i <= $page + $pagination['num_links_right']; $i++)
						{
							if ($page != $i)
							{
								$pagination['page_tag'][] = '<a href="/admin/crawled_videos/'.$i.'">'.$i.'</a>';
							}
							else
							{
								$pagination['page_tag'][] = '<a href="/admin/crawled_videos/'.$i.'" class="active">'.$i.'</a>';
							}
						}
					}
					else
					{
						for ($i = $page; $i <= $page + $pagination['num_links_right'] + 1; $i++)
						{
							if ($page != $i)
							{
								$pagination['page_tag'][] = '<a href="/admin/crawled_videos/'.$i.'">'.$i.'</a>';
							}
							else
							{
								$pagination['page_tag'][] = '<a href="/admin/crawled_videos/'.$i.'" class="active">'.$i.'</a>';
							}
						}
					}
				}
				else
				{
					for ($i = $pagination['max_page'] - $pagination['num_links_sum'] + 1; $i <= $pagination['max_page']; $i++)
					{
						if ($page != $i)
						{
							$pagination['page_tag'][] = '<a href="/admin/crawled_videos/'.$i.'">'.$i.'</a>';
						}
						else
						{
							$pagination['page_tag'][] = '<a href="/admin/crawled_videos/'.$i.'" class="active">'.$i.'</a>';
						}
					}
				}
			}
		}

		return $pagination;
	}
}