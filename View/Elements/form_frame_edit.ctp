<div class="form-group">
	<label>フレーム名</label>
	<input type="text" name="data[Frame][name]" class="form-control" ng-model="frame.name">
</div>

<div class="form-group">
	<label>フレームタイプ</label><br/>
	<input type="hidden" name="data[Frame][type]" class="form-control" ng-value="frame.type">
	<div id="display_type" class="btn-group">
		<button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
			<div class="panel panel-{{frame.type}}"
				 style="display:inline-block;width:120px;margin-bottom:0;margin-right:auto;margin-left:auto;">
				<div class="panel-heading">
					<h3 class="panel-title" ng-bind="frame.type"></h3>
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

