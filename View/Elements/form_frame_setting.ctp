<div class="form-group">
	<label>フレーム名</label>
	<input type="text" class="form-control">
</div>

<div class="form-group">
	<label>フレームタイプ</label>
	<div class="well well-sm">
		<div class="row">
			<div class="col-md-4 col-sm-4"
				 ng-repeat="label in ['default', 'primary', 'info', 'success', 'warning', 'danger']">

				<a href="#" class="thumbnail">
					<div class="panel panel-{{label}}" style="margin-bottom:0px;">
						<div class="panel-heading">
							<h3 class="panel-title" ng-bind="label"></h3>
						</div>
						<div class="panel-body"></div>
					</div>
				</a>

			</div>
		</div>
	</div>
</div>