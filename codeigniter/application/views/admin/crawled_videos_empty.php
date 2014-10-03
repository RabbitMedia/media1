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
		<!--[if lte IE 8]><link rel="stylesheet" href="/css/ie/v8.css" /><![endif]-->
	</head>
	<body class="left-sidebar">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Content -->
					<div id="content">
						<div class="inner">

							<h1>アップ待ちの動画はありません</h1>

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