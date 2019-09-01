@if(session()->has('success'))
	<div class="alert alert-dismissable alert-success">
		<button type="button" class="close" data-dismiss="alert" area-level="close">
			<span area-hidden="true">&times;</span>
		</button>
		<strong>
			<div class="text-center">{!! session()->get('success') !!}</div>
		</strong>
	</div>
@endif