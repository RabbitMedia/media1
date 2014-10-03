<!DOCTYPE HTML>
<html>
	<head>
		<title>管理画面</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<!--[if lte IE 8]><script src="/css/ie/html5shiv.js"></script><![endif]-->
		<script src="/js/jquery.min.js"></script>
		<script src="/js/skel.min.js"></script>
		<script src="/js/skel-layers.min.js"></script>
		<script src="/js/init.js"></script>
		<script src="/js/jquery.quicksearch.js"></script>
		<noscript>
			<link rel="stylesheet" href="/css/skel.css" />
			<link rel="stylesheet" href="/css/style.css" />
			<link rel="stylesheet" href="/css/style-desktop.css" />
			<link rel="stylesheet" href="/css/style-wide.css" />
		</noscript>
		<script type="text/javascript">
			$(function(){
				$("#video1").css("display", "none");
				$("#videoPush1").click(function(){
					$("#video1").slideToggle();
				});
			});
			$(function(){
				$("#video2").css("display", "none");
				$("#videoPush2").click(function(){
					$("#video2").slideToggle();
				});
			});
			$(function(){
				$("#video3").css("display", "none");
				$("#videoPush3").click(function(){
					$("#video3").slideToggle();
				});
			});
			$(function(){
				$('input#search1').quicksearch('select option');
			});
			$(function(){
				$('input#search2').quicksearch('select option');
			});
		</script>
		<!--[if lte IE 8]><link rel="stylesheet" href="/css/ie/v8.css" /><![endif]-->
	</head>
	<body class="left-sidebar">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Content -->
					<div id="content">
						<div class="inner">

								<?php foreach ($videos as $id => $video): ?>
									<article>
										<p><?=$video['create_time']?>にクロールされた動画</p>
										<p id="videoPush<?=$id+1?>" class="button">動画を確認する（<?=$video['duration']?>）</p>
										<?php foreach ($video['embed_tag'] as $embed_tag): ?>
											<div id="video<?=$id+1?>">
												<div class="rwd_embed">
													<?=$embed_tag?>
												</div>
											</div>
										<?php endforeach; ?>
										<?php foreach ($video['title'] as $key => $value): ?>
											<p><?=$value?>(<?=$video['media'][$key]?>)</p>
										<?php endforeach; ?>
										<?php echo form_open('admin/upload'); ?>
											<p><input type="text" name="title" value="" placeholder="タイトルを入力" required="true"></p>
											<?php foreach ($video['thumbnail'] as $thumbnail): ?>
												<?php foreach ($thumbnail as $value): ?>
													<img src="<?=$value?>" width="80" height="60"><input type="radio" name="thumbnail" value="<?=$value?>" required="true">
												<?php endforeach; ?>
											<?php endforeach; ?>
											<p><input type="text" name="search" placeholder="メインカテゴリー選択" id="search1">
											<select name="main_category[]" multiple required>
												<?php foreach ($categories as $category): ?>
													<option value="<?=$category['id']?>"><?=$category['name']?></option>
												<?php endforeach; ?>
											</select></p>
											<p><input type="text" name="search" placeholder="サブカテゴリー選択" id="search2">
											<select name="sub_category[]" multiple required>
												<?php foreach ($categories as $category): ?>
													<option value="<?=$category['id']?>"><?=$category['name']?></option>
												<?php endforeach; ?>
											</select></p>
											<input type="hidden" name="crawler_master_id" value="<?=$video['crawler_master_id']?>">
											<input type="hidden" name="duration" value="<?=$video['duration']?>">
											<?php foreach ($video['type'] as $key => $type): ?>
												<input type="hidden" name="type[]" value="<?=$type?>">
												<input type="hidden" name="video_url_id[]" value="<?=$video['video_url_id'][$key]?>">
											<?php endforeach; ?>
											<p><input type="submit" value="アップする"></p>
										<?php echo form_close(); ?>
										<?php echo form_open('admin/delete_crawled_videos'); ?>
											<input type="hidden" name="crawler_master_id" value="<?=$video['crawler_master_id']?>">
											<p><input type="submit" value="削除する"></p>
										<?php echo form_close(); ?>
									</article>
								<?php endforeach; ?>

							<!-- Pagination -->
								<div class="pagination">
									<?php if ($pagination['prev_flag'] == true): ?>
										<a href="<?=$pagination['prev_link']?>" class="button previous">前へ</a>
									<?php endif; ?>
									<div class="pages">
										<?php foreach ($pagination['page_tag'] as $tag): ?>
											<?=$tag?>
										<?php endforeach; ?>
										<?php if ($pagination['last_flag'] == true): ?>
											<span>&hellip;</span>
											<?=$pagination['last_tag']?>
										<?php endif; ?>
									</div>
									<?php if ($pagination['next_flag'] == true): ?>
										<a href="<?=$pagination['next_link']?>" class="button next">次へ</a>
									<?php endif; ?>
								</div>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
					
						<!-- Logo -->
							<div id="logo"><a href="/admin">Dashboard</a></div>
					
						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li class="current"><a href="/admin/crawled_videos">アップ待ち（<?=$total_count?>）</a></li>
									<li><a href="/admin">アップ済み</a></li>
									<li><a href="/admin/logout">ログアウト</a></li>
								</ul>
							</nav>

					</div>

			</div>

	</body>
</html>