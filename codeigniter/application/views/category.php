<!DOCTYPE html>
<html lang="ja">
	<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="copyright" content="&copy;セックル速報" />
		<?php if ($page <= 1): ?>
			<meta name="description" content="【動画あり】<?=$current_category_name?>のエロすぎる動画をまとめたったｗｗｗセックル速報にはこの他にも無料セックス動画が満載ｗｗｗ" />
		<?php else: ?>
			<meta name="description" content="【動画あり】<?=$current_category_name?>のエロすぎる動画をまとめたったｗｗｗセックル速報にはこの他にも無料セックス動画が満載ｗｗｗ (<?=$page?>ページ目)" />
		<?php endif; ?>
		<meta name="keywords" content="セックス動画,セックル速報,<?=$current_category_name?>" />
		<meta property="og:title" content="エロすぎる<?=$current_category_name?>動画 <?=$total_count?>件 | セックル速報" />
		<meta property="og:type" content="article" />
		<meta property="og:image" content="http://sekusoku.com/images/apple-touch-icon.png" />
		<meta property="og:url" content="http://sekusoku.com/category/<?=$current_category_id?>" />
		<meta property="og:description" content="【動画あり】<?=$current_category_name?>のエロすぎる動画をまとめたったｗｗｗセックル速報にはこの他にも無料セックス動画が満載ｗｗｗ" />
		<meta property="og:site_name" content="セックル速報 - 無料セックス動画まとめ" />
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="@sekusoku">
		<?php if ($page <= 1): ?>
			<link rel="canonical" href="http://sekusoku.com/category/<?=$current_category_id?>" />
		<?php else: ?>
			<link rel="canonical" href="http://sekusoku.com/category/<?=$current_category_id?>/<?=$page?>" />
		<?php endif; ?>
		<?php if ($page > 1): ?>
			<?php if ($page == 2): ?>
				<link rel="prev" href="http://sekusoku.com/category/<?=$current_category_id?>" />
			<?php else: ?>
				<link rel="prev" href="http://sekusoku.com/category/<?=$current_category_id?>/<?=$page-1?>" />
			<?php endif; ?>
		<?php endif; ?>
		<?php if ($page_next_flag): ?>
			<link rel="next" href="http://sekusoku.com/category/<?=$current_category_id?>/<?=$page+1?>" />
		<?php endif; ?>
		<?php if ($page <= 1): ?>
			<title>エロすぎる<?=$current_category_name?>動画 <?=$total_count?>件 | セックル速報 - 無料セックス動画まとめ</title>
		<?php else: ?>
			<title>エロすぎる<?=$current_category_name?>動画 <?=$total_count?>件 (<?=$page?>ページ目) | セックル速報 - 無料セックス動画まとめ</title>
		<?php endif; ?>
		<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />
		<link rel="icon" type="image/png" href="/images/favicon.png" />
		<link rel="apple-touch-icon" href="/images/apple-touch-icon.png" />

		<!-- Bootstrap -->
		<link rel="stylesheet" href="/css/bootstrap.min.css">
		<!-- Custom styles for Sticky footer with fixed navbar -->
		<link rel="stylesheet" href="/css/sticky-footer-navbar.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>

		<!-- Google Tag Manager -->
		<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PQJKB4" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-PQJKB4');</script>

		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target=".openmodal"><span class="glyphicon glyphicon-th-list"></span></button>
					<a class="navbar-brand" href="/"><img src="/images/logo.png" alt="セックル速報" width="160" height="25"></a>
				</div>
				<div class="collapse navbar-collapse">
					<p class="navbar-text navbar-right">無料セックス動画を毎日更新！</p>
				</div>
			</div>
		</nav>

		<div class="container">

			<div class="row">

				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/" itemprop="url"><span itemprop="title">ホーム</span></a></li>
						<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="active"><span itemprop="title"><?=$current_category_name?></span></li>
					</ol>
				</div>

			</div>

			<div class="row">

				<div class="col-xs-12">
					<h1><?=$total_count?>件の無料セックス動画 (<?=$current_category_name?>)</h1>
				</div>

			</div>

			<div class="row">

				<?php foreach ($videos as $id => $video): ?>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<div class="thumbnail">
							<a href="/video/<?=$video['master_id']?>"><img src="<?=$video['thumbnail_url']?>" alt="<?=$video['title']?>" class="img-rounded img-responsive" width="240" height="180"></a>
							<div class="caption">
								<h2><a href="/video/<?=$video['master_id']?>"><?=$video['title']?></a></h2>
								<p>
									<?php foreach ($video['category'] as $key => $category): ?>
										<a href="/category/<?=$category['id']?>"><span class="label label-default"><?=$category['name']?></span></a>&nbsp;
									<?php endforeach; ?>
								</p>
								<p><?=$video['create_time']?></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>

			</div>

			<?php if ($pagination): ?>
				<div class="row">

					<div class="col-xs-12 text-center">
						<?php if ($is_mobile): ?>
							<ul class="pagination">
						<?php else: ?>
							<ul class="pagination pagination-lg">
						<?php endif; ?>
							<?=$pagination?>
						</ul>
					</div>

				</div>
			<?php endif; ?>

		</div>

		<div class="footer">
			<div class="container text-center">
				<p class="text-muted">Copyright &copy; <?php echo date("Y"); ?> セックル速報 - 無料セックス動画まとめ All Rights Reserved.</p>
			</div>
		</div>

		<div class="modal fade openmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">

					<nav class="navbar navbar-default" role="navigation">
						<div class="container">
							<div class="navbar-header">
								<button type="button" class="btn btn-default navbar-btn navbar-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
							</div>
						</div>
					</nav>

					<div class="container">

						<div class="row">

							<!-- <div class="col-xs-12">
								<h3>キーワード検索</h3>
								<div class="col-xs-12">
									<form class="form-horizontal" role="form">
										<div class="form-group">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="無料セックス動画の検索はこちらから">
												<span class="input-group-btn">
													<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
												</span>
											</div>
										</div>
									</form>
								</div>
							</div> -->

							<div class="col-xs-12">
								<h3>カテゴリー検索</h3>
								<div class="well">
									<ul class="pager">
										<?php foreach ($categories as $category): ?>
											<li><a href="/category/<?=$category['id']?>"><?=$category['name']?></a></li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>

							<div class="col-xs-12">
								<ul class="nav nav-pills">
									<li><a href="/">ホーム</a></li>
									<li><a href="/about">セックル速報について</a></li>
									<li><a href="/ad">広告掲載について</a></li>
									<li><a href="/contact">お問い合わせ</a></li>
								</ul>
							</div>

						</div>

					</div>

				</div>
			</div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="/js/jquery.min.js"><\/script>')</script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="/js/ie10-viewport-bug-workaround.js"></script>
		<!-- EqualHeight.js -->
		<script src="/js/jquery.equalheight.min.js"></script>
		<!-- EqualHeight.js -->
		<script>
			$(function() {
				var equalHeight = $('.caption h2').equalHeight({wait: true});
				// Browser supports matchMedia
				if (window.matchMedia) {
					// MediaQueryList
					var mql = window.matchMedia("(min-width: 500px)");
					// MediaQueryListListener
					var equalHeightCheck = function (mql) {
						if (mql.matches) {
							equalHeight.start();
						} else {
							equalHeight.stop();
						}
					};
					// Add listener
					mql.addListener(equalHeightCheck);
					// Manually call listener
					equalHeightCheck(mql);
				}
				// Browser doesn't support matchMedia
				else {
					equalHeight.start();
				}

				var equalHeight = $('.caption p').equalHeight({wait: true});
				// Browser supports matchMedia
				if (window.matchMedia) {
					// MediaQueryList
					var mql = window.matchMedia("(min-width: 500px)");
					// MediaQueryListListener
					var equalHeightCheck = function (mql) {
						if (mql.matches) {
							equalHeight.start();
						} else {
							equalHeight.stop();
						}
					};
					// Add listener
					mql.addListener(equalHeightCheck);
					// Manually call listener
					equalHeightCheck(mql);
				}
				// Browser doesn't support matchMedia
				else {
					equalHeight.start();
				}
			});
		</script>
	</body>
</html>