<?php
class appmanageApi extends baseApi{
  public function getMenu(){
		return array(
					'sort'=>1,
					'title'=>'APP管理',					
					'list'=>array(
						'APP列表'=>url('appmanage/index/index'),
					)
			);
	} 
}