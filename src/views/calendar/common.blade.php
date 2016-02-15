<style>
	.calendar .day_message{
		display: none;
	}

	.shadow_calendar{
		opacity: 0.4;
		position: fixed;
		top: 0px;
		left: 0px;
		width: 100%;
		height: 100%;
		background-color: grey;
		z-index: 10;
	}
	
	.shadow_body_calendar{
		position: fixed;
		top: 0px;
		left: 10%;
		width: 80%;
		z-index: 11;
		background-color: white;
		padding: 30px;
		font-size: 20px;
	}

	.full_calendar{
		display: flex;
		align-items: center;
	}
	
	.full_calendar .glyphicon-chevron-right,
	.full_calendar .glyphicon-chevron-left{
		cursor: pointer;
		font-size: 25px;
		color: black;
	}
	
	.full_calendar .glyphicon-chevron-right:hover,
	.full_calendar .glyphicon-chevron-left:hover{
		color: grey;
		text-decoration: none;
	}
	
	.full_calendar .glyphicon-chevron-right:focus,
	.full_calendar .glyphicon-chevron-left:focus{
		text-decoration: none;
	}
	
	.calendar .header .calendar_greed{
		font-size: 30px;
		vertical-align: middle;
		text-decoration: bold;
	}

	.calendar .before,
	.calendar .after{
		opacity: 0.5;
	}
	
	.other_month{
		text-align: center;
	}
	
	.calendar{
		display: table;
		border-spacing: 2px;
	}
	
	.calendar .calendar_row{
		display: table-row;
	}

	.calendar .calendar_greed{
		height: 100px;
		border: 1px solid black;
		cursor: pointer;
		border-radius: 4px;
		display: table-cell;
		text-align: center;
	}
	
	.calendar .calendar_greed:hover{
		background-color: rgba(0, 255, 31, 0.18)
	}
</style>
<div class='full_calendar'>
	<a class='other_month col-md-1 glyphicon glyphicon-chevron-left'
		href='{{ $href }}?month={{ $columns["beforecurrentmonth"] }}'
	></a>
	<div class='col-md-10 calendar'>
		<div class='calendar_row header'>
			<div class='calendar_greed'>Пн</div>
			<div class='calendar_greed'>Вт</div>
			<div class='calendar_greed'>Ср</div>
			<div class='calendar_greed'>Чт</div>
			<div class='calendar_greed'>Пт</div>
			<div class='calendar_greed'>Сб</div>
			<div class='calendar_greed'>Вс</div>
		</div>
		@for($i=0;$i<5;$i++)
		<div class='calendar_row'>
			@for($j=0;$j<7;$j++)
				@if($columns[$i][$j]['month']=='current')
					@if(isset($value[$columns[$i][$j]['day_index']]))
					<div class='calendar_greed'  t='cell'>{{ $columns[$i][$j]['day_index'] }}
						<div class='day_message'>
							{!! $callback($value[$columns[$i][$j]['day_index']]) !!}
						</div>
					@else
						<div class='calendar_greed'>{{ $columns[$i][$j]['day_index'] }}
					@endif
					</div>
				@elseif($columns[$i][$j]['month']=='before')
					<div class='calendar_greed before'>{{ $columns[$i][$j]['day_index'] }}</div>
				@else
					<div class='calendar_greed after'>{{ $columns[$i][$j]['day_index'] }}</div>
				@endif
			@endfor
		</div>
		@endfor
	</div>
	<a class='other_month col-md-1 glyphicon glyphicon-chevron-right'
		href='{{ $href }}?month={{ $columns["aftercurrentmonth"] }}'
	></a>
</div>
<script type='text/javascript'>
	$(document).ready(function(){
		$('.full_calendar').on('click','.calendar_greed[t=cell]',function(){
			$('body').after("<div class='shadow_calendar'></div>");
			$('body').after("<div class='shadow_body_calendar'></div>");
			$('.shadow_body_calendar').html($(this).find('.day_message').html())
			$('.shadow_body_calendar').css('top','50%')
			$('.shadow_body_calendar').css('margin-top',-$('.shadow_body_calendar').height()/2)
		})
		
		$('html').on('click','.shadow_calendar',function(){
			$('.shadow_calendar').remove();
			$('.shadow_body_calendar').remove();
		})
	})
</script>