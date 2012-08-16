<?php
class appmanageModel extends baseModel{
  
	//安装数据库
	public function installSql($sqlFile){
		$sqls = Install::mysql($sqlFile, config('DB_OLD_PREFIX'), config('DB_PREFIX') );
		if( empty($sqls) ) return false;
		foreach($sqls as $sql){
			$this->query($sql);
		}
	}
	
	//卸载数据库
	public function uninstallSql( $tables ){
		foreach($tables as $table){
			$table = '`' . config('DB_PREFIX') . $$table . '`';
			$this->query("DROP TABLE $table ");
		}
	}
	
	public function getCreateSql($table=''){ 
		return $this->db->fetchArray($this->query("SHOW CREATE TABLE ".config('DB_PREFIX').$table));
	}
	
	public function getAll($table=''){
		$this->table =$table; 
		return $this->select('1=1', '*');
	}
	
	public function getNum($table=''){
		$this->table =$table; 
		return $this->count('1=1');
	}
	
	public function getField($table=''){
		return $this->db->getFields(config('DB_PREFIX').$table);
	}
}