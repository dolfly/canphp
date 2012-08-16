<?php
class indexController extends baseController{
	public function index(){
		$this->title = model('user')->getTitle();
		$this->hello = model('user')->getHello();
		
		$this->display();
	}
}