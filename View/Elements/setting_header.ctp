<div class="pull-right">
	<a  class="btn btn-default active" href="#">
		<span class="glyphicon glyphicon-cog"> </span>
	</a>
</div>

<?php echo $this->Form->create('Frame',
	array(
		'name' => 'frameForm',
		'novalidate' => true,
		'url' => array('plugin' => 'frames', 'controller' => 'frames', 'action' => 'edit', $frameId),
	)); ?>

	<input type="text" name="data[Frame][name]" class="form-control" ng-model="frame.name" style="display:inline-block;width:auto">

	<input type="hidden" name="data[Frame][type]" class="form-control" ng-value="frame.type">
	<div id="display_type" class="btn-group">
		<button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
			<div class="panel panel-{{frame.type}}"
				 style="display:inline-block;width:120px;margin-bottom:0;margin-right:auto;margin-left:auto;">
				<div class="panel-heading" style="padding:0px">
					<span class="panel-title" ng-bind="frame.type"></span>
				</div>
			</div>
			<span class="caret"></span>
		</button>
		<ul role="menu" class="dropdown-menu nc-counter-display-type">
			<li ng-repeat="labelType in ['default', 'primary', 'info', 'success', 'warning', 'danger']"
				ng-click="selectLabel(labelType)">
				<a href="#">
					<div class="panel panel-{{labelType}}"
						 style="width:120px;margin-bottom:0;margin-right:auto;margin-left:auto;">
						<div class="panel-heading text-center" style="padding:0px">
							<span class="panel-title" ng-bind="labelType"></span>
						</div>
					</div>
				</a>
			</li>
		</ul>
	</div>

	<button type="submit" class="btn btn-default">決定</button>

<?php echo $this->Form->end(); ?>

