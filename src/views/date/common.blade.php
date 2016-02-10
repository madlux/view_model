<link 
	href="{{ asset('/view_model/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" 
	rel="stylesheet" type="text/css" />
<script 
	type='text/javascript' 
	src="{{ asset('/view_model/bootstrap-datetimepicker/build/js/moment-with-locales.min.js') }}"></script>
<script 
	type='text/javascript' 
	src="{{ asset('/view_model/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>

<div class='input-group date' id='datetimepicker{{ $index }}'>
	<input id='{{ $name }}' value='{{ $value }}' placeholder='{{ $placeholder }}' type='text' class="form-control" />
	<span class="input-group-addon">
		<span class="glyphicon glyphicon-calendar"></span>
	</span>
</div>
<script type="text/javascript">
	$(function () {
		$('#datetimepicker{{ $index }}').datetimepicker({
			locale: 'ru',
			format: 'YYYY-MM-DD HH:mm'
		});
	});
</script>