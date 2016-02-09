<select class='view-model-select'>
	@foreach ($options as $option)
		@if (isset($column_name))
		<option 
			@if (isset($selected))
				@if ($selected==$option[$column_name])
					selected='selected'
				@endif
			@endif
			>{{ $option[$column_name] }}</option>
		@else
		<option
			@if (isset($selected))
				@if ($selected==$option)
					selected='selected'
				@endif
			@endif
		>{{ $option }}</option>
		@endif
	@endforeach
</select>

@section('body_bottom')
<script src="{{ asset ("/bower_components/admin-lte/select2/js/select2.min.js") }}" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".view-model-select").select2();
    });
</script>
@endsection

@section('head_extra')
    <!-- Select2 css -->
    @include('partials._head_extra_select2_css')
@endsection