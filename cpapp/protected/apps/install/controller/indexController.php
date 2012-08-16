<?php
class indexController extends baseController{
	protected function init(){
		$file = BASE_PATH . '/install.lock';
		if( file_exists($file) ){
			$this->alert('程序安装已被锁定，如需重新安装，请先删除文件' . str_replace("\\", "/", $file));
			exit;
		}
		$this->title = config('title');
	}
	
	//引导首页
	public function index(){
		$this->display();
	}
	
	//检查环境
	public function env(){
		$this->ifMysql=function_exists('mysql_close');
		$this->ifGd=function_exists('gd_info');
        $this->ifGzip=function_exists('ob_gzhandler');
        $this->ifIconv=function_exists('iconv_get_encoding');
        $this->ifFopen=function_exists('allow_url_fopen');
        $this->yes='<font color="green">√</font>';
        $this->no='<font color="red">×</font>';
		$this->display();
	}
	
	//安装数据库
	public function db(){
		if( !$this->isPost() ){
            $this->display();
		}else{
            $config['DB']=$_POST;
            if(empty($config['DB'])){
	           cpError::show('请填写数据库信息');
            }             
             $model=new cpModel($config['DB']);
             $sql="CREATE DATABASE IF NOT EXISTS `".$config['DB']['DB_NAME']."` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
             $model->query($sql);
             $model->db->select_db($config['DB']['DB_NAME']);
             $sql_array=Install::mysql(BASE_PATH . '/install.sql');//数据库安装文件 
             
             $prefix='cp_';//默认表前缀
             $config['DB']['DB_PREFIX']=empty($config['DB']['DB_PREFIX'])?$prefix : $config['DB']['DB_PREFIX'];
             foreach($sql_array as $sql)
             {
	            if($config['DB']['DB_PREFIX']!=$prefix)  $sql = str_replace($prefix, $config['DB']['DB_PREFIX'], $sql); //替换表前缀	
	            $model->db->query($sql);//安装数据
             }

             //修改配置文件
             if(!save_config($app,$config,BASE_PATH . '/config.php')) cpError::show('配置文件写入失败！');

             //安装成功，创建锁定文件
             $data_dir=BASE_PATH . '/';
             if(!is_dir($data_dir)) @mkdir($data_dir);
             @fopen($data_dir.'install.lock','w');
             $this->redirect( url('index/ok') );
		}
	}
	
	//安装成功
	public function ok(){
		$this->display();
	}
}