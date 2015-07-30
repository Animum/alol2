@foreach ($messages as $msg)
<div class="alert alert-block alert-{{ $msg['type'] }} fade in">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p><strong>{{ $msg['message'] }}</strong></p>
</div>
@endforeach