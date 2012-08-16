<?php
class indexController extends adminController{
	
	protected $layout = 'layout';
	public function index(){
		$this->display();
	}
	
	public function add(){
		$this->display();
	}
		
	public function config(){
		$this->display();
	}
}