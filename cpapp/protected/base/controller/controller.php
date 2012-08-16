<?php
class controller{
	protected $layout = NULL;
	private $_data = array();
	
	protected function init(){}
	
	public function __construct(){
		$this->init();
	}

	public function __get($name){
		return isset( $this->_data[$name] ) ? $this->_data[$name] : NULL;
	}

	public function __set($name, $value){
		$this->_data[$name] = $value;
	}
	
	protected function view(){
		static $view = NULL;
		if( empty($view) ){
			$view = new cpTemplate( config('TPL') );
		}
		return $view;
	}
	
	protected function display($tpl = '', $return = false, $is_tpl = true ){
		if( $is_tpl ){
			$tpl = empty($tpl) ? CONTROLLER_NAME . '_'. ACTION_NAME : $tpl;
			if( $is_tpl && $this->layout ){
				$this->view()->addTags( array('__template_file'=>$tpl ) );
				$tpl = $this->layout;
			}
		}
		$this->view()->config['TPL_TEMPLATE_PATH'] = BASE_PATH . 'apps/' . APP_NAME . '/view/';
		$this->view()->assign( $this->_data );
		return $this->view()->display($tpl, $return, $is_tpl);
	}
	
	//判断是否是数据提交	
	protected function isPost(){
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}
	
	//直接跳转
	protected function redirect( $url ) {
		header('location:' . $url);
		exit;
	}
	
	//弹出信息
	protected function alert($msg, $url = NULL){
		header("Content-type: text/html; charset=utf-8"); 
		$alert_msg="alert('$msg');";
		if( empty($url) ) {
			$gourl = 'history.go(-1);';
		}else{
			$gourl = "window.location.href = '{$url}'";
		}
		echo "<script>$alert_msg $gourl</script>";
		exit;
	}
}