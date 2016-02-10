<?php

namespace Madlux\ViewModel;

use View;
use \DateTime;

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
			$columns = $this->initColumns($value);
			$title = isset($value['title']) ? $value['title'] : null;
			$placeholder = isset($value['placeholder']) ? $value['placeholder'] : false;
			$val = isset($value['value']) ? $value['value'] : false;
			
			$new_array[$key] = view('view_model::'.$value['type'].'/'.$style, [
				'title' => $title,
				'name' => $key,
				'index' => $index,
				'action' => $action,
				'type' => $type,
				'source_data' => $source_data,
				'columns' => $columns,
				'placeholder' => $placeholder,
				'value' => $val,
				//'class' => $class,
			]);
			
			$index++;
		}
		
		return $new_array;
	}
	
	private function initColumns($value){
		if($value['type']=='table'){
			return $value['columns'];
		}elseif($value['type']=='calendar'){
			$columns=array();
			
			if(isset($value['year/month'])){
				$datetime=new DateTime($value['year/month'].'-01');
			}else{
				$datetime=new DateTime(date('Y-m').'-01');
			}
			
			$beforecurrentmonth=$datetime->modify( '-1 month' );
			$daysbefore=date('t',strtotime($beforecurrentmonth->format('Y-m-d')));
			$aftercurrentmonth=$datetime->modify( '+1 month' );
			$daysafter=date('t',strtotime($aftercurrentmonth->format('Y-m-d')));
			$firstdayofmonth=$datetime->format('N')-1;
			
			$dayscurrentmonth=date('t',strtotime($datetime->format('Y-m-d')));
	
			for($i=0;$i<5;$i++){
				for($j=0;$j<7;$j++){
					$columns[$i][$j]=array(
						'day_index' => $i*7+$j+1-$firstdayofmonth,
						'month' => 'current'
					);
					
					if($columns[$i][$j]['day_index']<1){
						$columns[$i][$j]=array(
							'day_index' => $daysbefore+$j-$firstdayofmonth+1,
							'month' => 'before'
						);
					}elseif($columns[$i][$j]['day_index']>$dayscurrentmonth){
						$columns[$i][$j]=array(
							'day_index' => $i*7+$j+1-$firstdayofmonth-$dayscurrentmonth,
							'month' => 'after'
						);
					}
				}
			}
		}else{
			$columns = null;
		}
		
		return $columns;
	}
}
