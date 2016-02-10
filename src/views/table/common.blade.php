<table class="table table-hover">
	@if($columns['title'])
		<thead>
			<tr>
				@foreach($columns['title'] as $title)
					<th>{{$title}}</th>
				@endforeach
			</tr>
		</thead>
	@endif
	<tbody>
		@foreach($columns['array'] as $column)
			<tr @if(isset($columns['data']['row']['action'])) action="{{$columns['data']['row']['action']}}" @endif>
				@foreach($columns['data']['row']['cell'] as $row)
					<td>
						@if (!isset($row['model']))
							<a @if(isset($row['href'])) 
								href="{!! $row['href']($column) !!}"
						@endif
						>{!! $row['name']($column) !!}</a>
						@else
							{!! 
								view('view_model::select/common')
									->with('options',$row['name']($column))
									->with('column_name',$row['column_name']) 
									->with('selected',$column[$row['selected']])
									->with('href',$row['href']($column))
							!!}
						@endif
					</td>
				@endforeach
			</tr>
		@endforeach
	</tbody>
</table>