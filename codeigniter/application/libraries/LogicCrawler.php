<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LogicCrawler {

	const CRAWL_PAGE_NUM			=	2;												// クロールするページ数

	const BASE_URL_TENGOKU			=	'http://www.tengokudouga.com/';
	const PAGE_URL_TENGOKU			=	'http://www.tengokudouga.com/?p=%page_num%';

	const BASE_URL_NUKIST			=	'http://www.nukistream.com/';
	const PAGE_URL_NUKIST			=	'http://www.nukistream.com/?p=%page_num%';

	/**
	 * 指定サイトから動画情報を取得する
	 */
	public function get_from_tengoku()
	{
		// 動画配列
		$videos = array();
		// カウント
		$count = 0;

		// CRAWL_PAGE_NUMに定義されてるページ数分クロールする
		for ($i=1; $i <= self::CRAWL_PAGE_NUM; $i++)
		{ 
			// ページを取得
			$url = str_replace('%page_num%', $i, self::PAGE_URL_TENGOKU);
			$html = file_get_contents($url);
			// ページの取得に失敗したらfalseを返す
			if (!$html)
			{
				return false;
			}

			// 文字コードをSJISに変換
			// $html = mb_convert_encoding($html, 'SJIS', 'auto');
			// 改行コードを削除
			$html = preg_replace('/(\n|\r)/', '', $html);

			// 動画情報を正規表現で抽出
			if (preg_match_all('/(?<=cntInfo).*?(?=\<\/a>\<\/h2)/', $html, $elements))
			{
				foreach ($elements[0] as $element)
				{
					// PRコンテンツは除外
					if (strpos($element, '>PR<'))
					{
						continue;
					}
					else
					{
						// タイトルとコンテンツページURLを抽出
						if (preg_match('/(?<=<h2>).*/', $element, $matches))
						{
							// タイトルを抽出
							if (preg_match('/(?<=>).*/', $matches[0], $title))
							{
								$videos[$count]['title'] = $title[0];
							}
							// コンテンツページURLを抽出
							if (preg_match('/(?<=<a href=").*?(?=">.*)/', $matches[0], $contents_page_url))
							{
								// コンテンツページURLから動画IDを抽出
								$videos[$count]['video_id'] = $this->_get_xvideos_id(self::BASE_URL_TENGOKU.$contents_page_url[0]);
							}
						}
						else
						{
							return false;
						}

						// 再生時間を抽出
						if (preg_match('/(?<=labelUpdate">).*?(?=<\/span)/', $element, $matches))
						{
							$videos[$count]['duration'] = $matches[0];

							// 時間を"h"で表現している場合は分に計算し直す
							if (strpos($matches[0], 'h'))
							{
								if (preg_match('/.*(?=h)/', $matches[0], $hours) && preg_match('/(?<=h ).*/', $matches[0], $minutes) && preg_match('/(?<=:).*/', $matches[0], $seconds))
								{
									$videos[$count]['duration'] = (((int)$hours[0] * 60) + (int)$minutes[0]).':'.$seconds[0];
								}
							}
						}

						// カウントをインクリメント
						$count++;
					}
				}
			}
			else
			{
				return false;
			}
		}

		return $videos;
	}

	/**
	 * 指定サイトから動画情報を取得する
	 */
	public function get_from_nukist()
	{
		// 動画配列
		$videos = array();
		// カウント
		$count = 0;

		// CRAWL_PAGE_NUMに定義されてるページ数分クロールする
		for ($i=1; $i <= self::CRAWL_PAGE_NUM; $i++)
		{ 
			// ページを取得
			$url = str_replace('%page_num%', $i, self::PAGE_URL_NUKIST);
			$html = file_get_contents($url);
			// ページの取得に失敗したらfalseを返す
			if (!$html)
			{
				return false;
			}

			// 文字コードをSJISに変換
			// $html = mb_convert_encoding($html, 'SJIS', 'auto');
			// 改行コードを削除
			$html = preg_replace('/(\n|\r)/', '', $html);

			// 動画情報を正規表現で抽出
			if (preg_match_all('/(?<=cntInfo).*?(?=\<\/a>\<\/h2)/', $html, $elements))
			{
				foreach ($elements[0] as $element)
				{
					// xvideosコンテンツ以外は除外
					if (!strpos($element, 'xv.png'))
					{
						continue;
					}
					else
					{
						// タイトルとコンテンツページURLを抽出
						if (preg_match('/(?<=<h2>).*/', $element, $matches))
						{
							// タイトルを抽出
							if (preg_match('/(?<=>).*/', $matches[0], $title))
							{
								$videos[$count]['title'] = $title[0];
							}
							// コンテンツページURLを抽出
							if (preg_match('/(?<=<a href=").*?(?=">.*)/', $matches[0], $contents_page_url))
							{
								// コンテンツページURLから動画IDを抽出
								$videos[$count]['video_id'] = $this->_get_xvideos_id(self::BASE_URL_NUKIST.$contents_page_url[0]);
							}
						}
						else
						{
							return false;
						}

						// 再生時間を抽出
						if (preg_match('/(?<=labelUpdate">).*?(?=<\/span)/', $element, $matches))
						{
							$videos[$count]['duration'] = $matches[0];
						}

						// カウントをインクリメント
						$count++;
					}
				}
			}
			else
			{
				return false;
			}
		}

		return $videos;
	}

	/**
	 * 指定サイトのコンテンツページからxvideosの動画IDを取得する
	 */
	private function _get_xvideos_id($url)
	{
		// 動画ID
		$video_id = null;

		// ページを取得
		$html = file_get_contents($url);
		// ページの取得に失敗したらnullを返す
		if (!$html)
		{
			return null;
		}

		// 改行コードを削除
		$html = preg_replace('/(\n|\r)/', '', $html);

		// 動画IDを抽出する
		if (preg_match_all('/(?<=embedframe\/).*?(?=")/', $html, $matches))
		{
			foreach ($matches[0] as $match)
			{
				$video_id[] = $match;
			}
		}

		return $video_id;
	}
}

/* End of file LogicThumbnail.php */