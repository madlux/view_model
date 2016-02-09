##Îïèñàíèå

View model

## Ïğèìåğ
 
``` bash
$viewModel=new ViewModel(array(
		'layout' => 'madlux_settings::index',
		'action' => 'product/index',
		'data' => [
			'form' => [
				'table' => [
					'type' => 'table',
					'columns' => [
						'title' => [
							'Package',
							'Id'
						],
						'array' => $settings,
						'data' => [
							'row'=> [
								'cell' => [
									[
										'name' => 'id',
										'href' => 'admin.settings.show',
										'data' => 'id'
									],
									[
										'name' => 'package',
										'href' => 'admin.settings.show',
										'data' => 'id'
									],
								],
							]
						]
					]
				],
			],
		]
	),
	compact('settings','page_title','page_description')
);

return $viewModel->get();
```