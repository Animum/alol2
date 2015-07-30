<div class="form-group">
	{!! Form::label( $nameField, $label ) !!}
	{!! $control !!}
	@if($error)
	<p class="text-danger">{!! $error !!}</p>
	@endif
</div>