<div class="form-group">
	<label>フレーム名</label>
	<input type="text" class="form-control">
</div>

<div class="form-group">
	<label>フレームタイプ</label><br/>
	<div id="display_type" class="btn-group">
		<button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
			<div class="panel panel-{{frameType}}"
				 style="display:inline-block;width:120px;margin-bottom:0;margin-right:auto;margin-left:auto;">
				<div class="panel-heading">
					<h3 class="panel-title" ng-bind="frameType"></h3>
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
						<div class="panel-heading">
							<h3 class="panel-title" ng-bind="labelType"></h3>
						</div>
					</div>
				</a>

			</li>
		</ul>
	</div>
</div>


<!--
<div class="form-group">
	<label>フレームタイプ</label>
	<div class="well well-sm" style="background-color:transparent">
		<div class="row">

			<div ng-repeat="label in ['default', 'primary', 'info', 'success', 'warning', 'danger']"
				 class="col-md-4 col-sm-4"
				 style="display:inline-block;">

				<div class="panel panel-{{label}}"
					 style="width:120px;margin-right:auto;margin-left:auto;">
					<div class="panel-heading">
						<h3 class="panel-title" ng-bind="label"></h3>
					</div>
					<div class="panel-body"></div>
				</div>
			</div>

		</div>
	</div>
</div>
-->