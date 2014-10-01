<!DOCTYPE html>
<html>
	<head>
		<title>管理画面</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<script src="/js/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="/css/bootstrap.min.css">
		<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<!-- <link rel="stylesheet" href="/css/styles.css"> -->
		<style type="text/css">.modal-footer {border-top: 0px;}</style>
	</head>
	<body>

		<!--login modal-->
			<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">

						<div class="modal-header">
							<h1 class="text-center">Login</h1>
						</div>

						<div class="modal-body">

							<p class="text-danger"><?php echo validation_errors(); ?></p>
							<?php if ($error_flag == true): ?>
								<p class="text-danger">Login Failed</p>
							<?php endif; ?>

							<?php echo form_open('admin/login', array('class' => 'form col-md-12 center-block')); ?>
								<div class="form-group">
									<input type="text" class="form-control input-lg" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username">
								</div>
								<div class="form-group">
									<input type="password" class="form-control input-lg" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
								</div>
							</form>
						</div>

						<div class="modal-footer"></div>

					</div>
				</div>
			</div>

	</body>
</html>