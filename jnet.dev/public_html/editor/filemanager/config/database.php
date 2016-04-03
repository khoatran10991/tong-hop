<?php
class config{
	const HOST_NAME = "localhost";
	const HOST_USER = "root";
	const HOST_PASS = "antihacker@";
	const DB_NAME	= "jnet";
}
class database{
	protected $_conn;
	protected $_results;
	public function __construct(){
		@$this->_conn = mysql_connect(config::HOST_NAME,config::HOST_USER,config::HOST_PASS) or die("can't connect sever");
		mysql_select_db(config::DB_NAME,$this->_conn) or die("not select database");
		mysql_query("SET NAMES utf8");
	}
	public function query($sql){
		if($this->_conn){
			$this->_results = mysql_query($sql);
		}
	}

	public function num_rows(){
		if($this->_results){
			$row = mysql_num_rows($this->_results);
		}else{
			$row = 0;
		}
		return $row;
	}
	public function fetch(){
		if($this->_results){
			$row = mysql_fetch_assoc($this->_results);
		}else{
			$row = 0;
		}
		return $row;
	}

	public function fetchAll(){
		$data = array();
		if($this->_results){
			while($row = $this->fetch()){
				$data[] = $row;
			}
			return $data;
		}
	}

}