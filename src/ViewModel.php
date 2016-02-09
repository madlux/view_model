<?php

namespace Madlux\ViewModel;

use View;

class ViewModel
{
	
	protected $layout;
	protected $action;
	protected $data;
	protected $viewModel;

	public function __construct(array $array, $compact = array())
	{
		$this->layout=$array['layout'];
		$this->data=$array['data'];
		$this->action = isset($array['action']) ? $array['action'] : false;
		$this->viewModel=view(
			$this->layout, 
			[
				'action' => $this->action, 
				'data' => $this->create($this->data),
			],
			$compact
		);
	}
	
	public function get()
	{
		
		return $this->viewModel;
	}
	
	public function create($array)
	{
		$new_array=array();
		$index=0;
		
		foreach($array['form'] as $key => $value)
		{
			$style = !isset($value['style']) ? 'common' : $value['style'];
			$type = (isset($array['type_action']) && $value['type']=='button') ? $array['type_action'] : "POST";
			$action = (isset($array['action']) && $value['type']=='button') ? $array['action'] : false;
			$source_data = $value['type']=='button' ?  array_keys($array['form']) : false;
			//$class = isset($value['class']) ? $value['style'] : 'btn btn-success';
			$columns = $value['type']=='table' ? $value['columns'] : null;
			$title = isset($value['title']) ? $value['title'] : null;
			
			$new_array[$key] = view('view_model::'.$value['type'].'/'.$style, [
				'title' => $title,
				'name' => $key,
				'index' => $index,
				'action' => $action,
				'type' => $type,
				'source_data' => $source_data,
				'columns' => $columns,
				//'class' => $class,
			]);
			
			$index++;
		}
		
		return $new_array;
	}
}
