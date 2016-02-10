@for($i=0;$i<5;$i++)
<div class='col-md-12 calendar'>
	@for($j=0;$j<7;$j++)
		@if($columns[$i][$j]['month']=='current')
		<div class='col-md-1 calendar_greed'>{{ $columns[$i][$j]['day_index'] }}</div>
		@elseif($columns[$i][$j]['month']=='before')
		<div class='col-md-1 calendar_greed before'>{{ $columns[$i][$j]['day_index'] }}</div>
		@else
		<div class='col-md-1 calendar_greed after'>{{ $columns[$i][$j]['day_index'] }}</div>
		@endif
	@endfor
</div>
@endfor
<style>
	.calendar .before,
	.calendar .after{
		opacity: 0.5;
	}

	.calendar_greed{
		height: 100px;
		border: 1px solid black;
		margin: 2px;
		cursor: pointer;
		border-radius: 4px;
	}
	
	.calendar_greed:hover{
		background-color: rgba(0, 255, 31, 0.18)
	}
</style>