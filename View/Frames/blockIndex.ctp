
<!-- TODO:言語ファイル化 -->
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
				<?php echo $this->element($pluginsName . '.' . $pluginsName . '/frame_menu', array('tab' => 'block')); ?>
			</div>
			<div class="col-md-9">

				<p class="text-right">
					<a  class="btn btn-success"
						href="<?php echo $this->Html->url('/'. $frame['plugin_key'] . '/'. $frame['plugin_key'] . '/blockEdit/' . $frame['id']);?>">
							<span class="glyphicon glyphicon-plus"> </span>
					</a>
				</p>
				<ul class="list-group">
					<li class="list-group-item" ng-repeat="block in blocks">
						<table width="100%" border="0px">
							<tr>
								<td width="90%">
									<span class="dropdown" dropdown on-toggle="toggled(open)">
										<a href class="dropdown-toggle" dropdown-toggle>{{block}}</a>
										<?php echo $this->element($pluginsName . '.' . $pluginsName . '/block_menu'); ?>
									</span>
								</td>
								<td align="right">
									<input type="radio" name="display_block" onClick="confirm('このブロックを表示しますか？');">
								</td>
							</tr>
						</table>
					</li>
				</ul>

			</div>
		</div>
	</div>

</div>
