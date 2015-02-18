
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

				<p class="text-right">
					<a  class="btn btn-sm btn-success"
						href="<?php echo $this->Html->url('/'. $frame['plugin_key'] . '/blocks/edit/' . $frame['id']);?>">
						<span class="glyphicon glyphicon-plus"></span>
					</a>
				</p>

				<?php echo $this->element($pluginsName . '.Blocks/block_list'); ?>

			</div>
		</div>
	</div>

</div>
