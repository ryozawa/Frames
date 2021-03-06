<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!-- frame setting START -->

<!DOCTYPE html>
<html lang="en" ng-app="NetCommonsApp">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="/net_commons/jquery/jquery.js"></script>
	<script src="/net_commons/twbs/bootstrap/dist/js/bootstrap.min.js"></script>

	<title><?php
		if (isset($pageTitle)) {
			echo h($pageTitle);
		}
		?></title>

	<!-- Bootstrap -->
	<?php
	if (isset($bootstrapMinCss) && $bootstrapMinCss) {
		echo $this->Html->css('bootstrap.min.css');
	} else {
		?><link href="/net_commons/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"><?php
	}?>

	<link href="/net_commons/twbs/bootstrap/assets/css/docs.min.css" rel="stylesheet">
	<!-- base  -->
	<link href="/net_commons/base/css/style.css" rel="stylesheet">

	<!-- themed  -->
	<?php echo $this->Html->css("style"); ?>
	<?php
		echo $this->Html->script('/tinymce/tinymce.min.js');
		echo $this->Html->script('/net_commons/angular/angular.min.js');
		echo $this->Html->script('/net_commons/angular-bootstrap/ui-bootstrap-tpls.min.js');
		echo $this->Html->script('/net_commons/angular-ui-tinymce/src/tinymce.js');
		echo $this->Html->script('/net_commons/base/js/base.js');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

</head>
	<body ng-controller="NetCommons.base">

	<div id="nc-flash-message"
			ng-init="flash.type='hidden'; flash.message='';"
			class="alert {{flash.type}} hidden">
		<button class="close pull-right" type="button" ng-click="flash.close()">
			<span class="glyphicon glyphicon-remove"> </span>
		</button>
		<span class='message'>{{flash.message}}</span>
	</div>


	<!-- container-header -->
	<header id="nc-system-header">
		<div class="box-site box-id-6">
			<!-- navbar -->
			<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="/">NetCommons3</a>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li><a href="/"><?php echo __d('net_commons', 'Home'); ?></a></li>
							<li>
								<?php if ($User = AuthComponent::user()): ?>
									<?php /*echo h($User['handle'])*/ ?>
									<?php echo $this->Html->link(__d('net_commons', 'Logout'), '/auth/logout') ?>
								<?php else: ?>
									<?php echo $this->Html->link(__d('net_commons', 'Login'), '/auth/login') ?>
								<?php endif; ?>
							</li>
							<li <?php
								if (isset($this->request->params['plugin'])
									&& $this->request->params['plugin'] == 'ThemeSettings') {
								echo 'class="active"';
								}
							?>>
								<?php echo $this->Html->link(__d('net_commons', 'Theme setting'), '/theme_settings/site/') ?>
							</li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
	</header>



	<div class="container">

		<?php if ($flashMss = $this->Session->flash()) { ?>
			<!-- flash -->
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<?php echo $flashMss; ?>
			</div>
		<?php } ?>

		<!-- frame setting layout -->
		<div id="nc-frame-container-<?php echo $frameId; ?>"
			 ng-controller="FramesController"
			 ng-init="frameInit(<?php echo h(json_encode($this->viewVars)); ?>)">

			<!-- TODO:幅を固定しない＆サイドコンテンツを表示する -->
			<div class="col-md-6">
				<div class="panel panel-{{frame.headerType}}">
					<div class="panel-heading clearfix">
						<?php echo $this->element('Frames.setting_header'); ?>
					</div>
					<div class="panel-body">

						<?php echo $this->fetch('content'); ?>

					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- container-footer  -->
	<footer id="nc-system-footer" role="contentinfo">
		<div class="box-footer box-id-5">
			<div class="copyright">Powered by NetCommons</div>
		</div>
	</footer>

		<!-- /container -->
		<?php //echo $this->element('sql_dump'); ?>
	</body>
</html>

<!-- frame setting E N D -->
