<?php
class indexController extends adminController{
	
	//显示app列表
	public function index(){
		foreach(api('*') as $app){
			$file = BASE_PATH . 'apps/' . $app .'/config.php';
			if( is_file( $file) ){
				$config = require( $file );
				$apps[$app]= array(
								'name'=>$config['APP_NAME'],
								'state'=>$config['APP_STATE'],
								'info'=>$config['APP_INFO'],
							);
			}
		}
		$this->appNames = $apps;
		$this->display();
	}
	
	//安装
	public function install(){	
		$app = $this->getApp();
		
		//安装数据库
		if( is_file( BASE_PATH . 'apps/' . $app . '/install.sql' ) ) {
			model('appmanage')->installSql( BASE_PATH . 'apps/' . $app . '/install.sql' );
		}
		//移动资源目录
		if( is_dir(  BASE_PATH . 'apps/' . $app . '/' . $app ) ){
			copy_dir(BASE_PATH . 'apps/' . $app . '/' . $app, 'public/' . $app);
			del_dir(BASE_PATH . 'apps/' . $app . '/' . $app);
		}
	 
	 	//写入配置
		if( save_config($app, array('APP_STATE'=>1)) ){
			$this->alert('安装成功！', url('index/index'));
		}	
		$this->alert('安装失败！', url('index/index'));
	}
	
	//卸载
	public function uninstall(){
		$app = $this->getApp();
 		
		//删除数据库
		$tables = config('APP_TABLES');
		if( !empty($tables) ){
			$tables = explode(',', $tables);
			model('appmanage')->uninstallSql( $tables );
		}
		//删除资源文件
		if( is_dir( 'public/' . $app ) ){
			del_dir( 'public/' . $app );
		}	
		//删除文件
		del_dir(BASE_PATH . 'apps/' . $app);

		$this->alert('安装成功！', url('index/index'));
	}
	
		
	//修改状态，如启用，停用
	public function state(){
		$app = $this->getApp();
		$state = intval( $_GET['state'] ) == 1 ? 1 : 2;
		save_config($app, array('APP_STATE' => $state) );
		$this->redirect(url('index/index'));
	}
	
	//导入
	public function import(){
		if($this->isPost() ){
		  if($_FILES['file']['size'] < 0){
			$this->alert('请选择文件');
			exit;
		  }
		  $fileNames = explode('.', $_FILES['file']['name']);
		  $zip = new Zip();
		  $zip->decompress($_FILES['file']['tmp_name'], BASE_PATH . 'apps/'.$fileNames[0]);
		  $dir = dir(BASE_PATH . 'apps/'.$fileNames[0].'/'.$fileNames[0]);
		  while($file = $dir->read()){
			if($file!="." and $file!=".." ) {
			  copy(BASE_PATH . 'apps/'.$fileNames[0].'/'.$fileNames[0].'/'.$file, BASE_PATH . 'apps/'.$fileNames[0].'/'.$file);
			}    
		  }
		  $dir->close();
		  del_dir(BASE_PATH . 'apps/'.$fileNames[0].'/'.$fileNames[0]);
		  //执行安装
		  $_GET['app'] = $fileNames[0];
		  $this->install();
		}else{
		  $this->display();
		}
	}
	
	//导出
	public function export(){
		$app = $_GET['app'];
		if(empty($app)){
		  $this->alert('请不要恶意操作');
		  exit;
		}
		$config = require(BASE_PATH . 'apps/'.$app.'/config.php'); 
		//导出涉及的数据表
		$tables = $config['table_names'];
		if(!empty($tables)){
		  $tableArr = explode(',', $tables);
		  $sqls = '';
		  foreach($tableArr as $v){
			$sqls .= "\nDROP TABLE IF EXISTS `app_$v`;\n";
			//获取见表语句
			$fields = model('appManage')->getCreateSql($v);
			$sqls .= preg_replace(array('/AUTO_INCREMENT=\d+/', '/'.config('DB_PREFIX').'/'),array('', 'app_'),$fields['Create Table']).";\n\n";
			//只读取2M的数据
			$num = 0;
			$rowNum = 1;
			while(strlen($sqls) < 2*1024*1024 && $num != $rowNum){
			  $rowNum = model('appManage')->getNum($v);
			  //获取字段
			  $fields = model('appManage')->getField($v);
			  $list = model('appManage')->getAll($v);
			  $sqls .= "INSERT INTO `app_$v` VALUES (";
			  $divide = '';
			  foreach($fields as $k=>$vo) {
				$sqls .= $divide."'". $list[$k][$vo['Field']] ."'";
				$divide = ',';
			  }
			  $sqls .= ");\n";
			  $num ++;
			}
			file_put_contents(BASE_PATH . 'apps/'.$app.'/install.sql', $sqls);
		  }
		}
		$zip = new Zip();
		$zip->compress($app.'.zip', $app);
		$this->redirect('?r=appmanage/index/index');
	}
	
	//创建app的基本目录和文件
	public function create(){
		
	}

    
	protected function getApp(){
		$app = trim( $_GET['app'] );
		if( empty($app) ){
			$this->alert('请不要恶意操作');
		}
		return $app;
	}
}