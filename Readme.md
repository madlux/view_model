## About

View model

Elements
---------

-button
-calendar
-date
-image
-input
-search
-select
-table
-text

Options
---------

-type
-action
-href
-source_data
-columns
-title
-placeholder
-value
-callback

For example
---------
 
``` bash
$viewModel=new ViewModel(array(
		'layout' => 'madlux_calendar_plane::index',
		'action' => 'calendar_plane/index',
		'data' => [
			'form' => [
				'table' => [
					'type' => 'table',
					'columns' => [
						'title' => [
							'Id',
							'Lesson name',
							'Lesson date',
							'Teacher'
						],
						'array' => $plane,
						'data' => [
							'row'=> [
								'cell' => [
									[
										////Ãåíåğàöèÿ çíà÷åíèÿ ïğè ïîìîùè àíîíèìíîé ôóíêöèè
										'name' => function($a){
											echo $a['id'];
										},
										////Ãåíåğàöèÿ ññûëêè ïğè ïîìîùè àíîíèìíîé ôóíêöèè
										//// ïàğàìåíò $a â äàííîì ñëó÷àå ıêçåìïëÿğ ìàññèâà $plane
										'href' => function($a){
											echo url('calendarplane').'?id_teacher='.$a['id'];
										},
										'data' => 'id'
									],
									[
										'name' => function($a){
											echo $a['name_lesson'];
										},
										'data' => 'name_lesson',
									],
									[
										'name' => function($a){
											echo $a['date_lesson'];
										},
										'data' => 'date_lesson'
									],
									[
										'name' => function($a){
											echo $a['teacher']['surname']
												.' '.$a['teacher']['name']
												.' '.$a['teacher']['thirdname'];
										},
										'data' => 'id_teacher',
									],
								],
							]
						]
					]
				]
			],
		]
	),
	compact('plane','page_title','page_description','user')
);

return $viewModel->get();
```