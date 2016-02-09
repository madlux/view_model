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
						<a @if(isset($row['href'])) href="{!! route($row['href'],[$column[$row['data']]]) !!}" @endif
						>{!! $column[$row['name']] !!}</a>
						@else
							{!! 
								view('view_model::select/common')
									->with('options',$column[$row['data']])
									->with('column_name',$row['column_name']) 
									->with('selected',$column[$row['selected']])
							!!}
						@endif
					</td>
				@endforeach
			</tr>
		@endforeach
	</tbody>
</table>