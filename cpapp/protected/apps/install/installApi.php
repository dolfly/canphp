<?php
class installApi extends baseApi{
	public function getMenu(){
		return array(
					'sort'=>1,
					'title'=>'系统管理2',					
					'list'=>array(
						'管理页面1'=>url('index/index'),
						'管理页面2'=>url('index/index'),
						'管理页面3'=>url('index/index'),
						'管理页面4'=>url('index/index'),
					)
			);
	}
}