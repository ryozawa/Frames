
<!-- TODO:フレーム設定機能↓ -->
<?php
	echo $this->Html->script('http://rawgit.com/angular/bower-angular-sanitize/v1.2.25/angular-sanitize.js', false);
	echo $this->Html->script('http://rawgit.com/m-e-conroy/angular-dialog-service/v5.2.0/src/dialogs.js', false);
	echo $this->Html->script('/frames/js/frames.js', false);

	$pluginsName = ucfirst($frame['plugin_key']);
?>

<div id="nc-frame-container-<?php echo $frameId; ?>"
	 ng-controller="FramesController">

	<div class="panel panel-default">
		<div class="panel-heading clearfix">
			<?php echo $this->element('Frames.setting_header'); ?>
		</div>
		<div class="panel-body">

			<div class="col-md-3">
				<?php echo $this->element($pluginsName . '.' . $pluginsName . '/frame_menu', array('tab' => 'frame')); ?>
			</div>

			<div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-body">
						<form novalidate>
							<?php echo $this->element('Frames.form_frame_setting'); ?>
						</form>
					</div>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-default">決定</button>
				</div>
			</div>

		</div>
	</div>

</div>

