<button id='{{ $name }}' type="button" class="btn btn-success">{{ $title }}</button>
@if ($action)
	<script type='text/javascript'>
		$(document).ready(function(){
			var url='{{ $action }}';
			var type='{{ $type }}';
			var index='{{ $index }}';
			var name='{{ $name }}';
			
			$('#'+name).click(function(){
				$.ajax({
					url : url,
					data : {
						@foreach ($source_data as $data)
							'{{$data}}' : $('#{{$data}}').val(),
						@endforeach
					},
					type : type,
					success : function(e){  }
				})
			})
		})
	</script>
@endif