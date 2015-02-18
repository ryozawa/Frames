
<!-- TODO:フレーム設定機能↓ -->
<?php
	echo $this->Html->script('http://rawgit.com/angular/bower-angular-sanitize/v1.2.25/angular-sanitize.js', false);
	echo $this->Html->script('http://rawgit.com/m-e-conroy/angular-dialog-service/v5.2.0/src/dialogs.js', false);
	echo $this->Html->script('/frames/js/frames.js', false);

	$pluginsName = ucfirst($frame['plugin_key']);
?>

<div id="nc-frame-container-<?php echo $frameId; ?>"
	 ng-controller="FramesController">

	<div class="col-md-7">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">

				<?php echo $this->element('Frames.setting_header'); ?>

			</div>
			<div class="panel-body">

				<?php echo $this->element($pluginsName . '.frame_menu', array('tab' => 'block')); ?>

				<?php echo $this->element($pluginsName . '.block_menu', array('tab' => 'block')); ?>

				<form novalidate>

					<?php echo $this->element($pluginsName . '.Blocks/form_block_edit'); ?>

					<div class="text-center">
						<a  class="btn btn-default"
							href="<?php echo $this->Html->url('/'. $frame['plugin_key'] . '/blocks/index/' . $frame['id']);?>">
							キャンセル
						</a>
						<a  class="btn btn-default"
							href="<?php echo $this->Html->url('/'. $frame['plugin_key'] . '/blocks/index/' . $frame['id']);?>">
							決定
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

</div>

