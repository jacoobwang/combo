<?php
	
class cssPacker{

	private $cssList = [];
	private $dest = '';
	private $src  = '';
	private $name = '';

	public function __construct($config){
		if(empty($config)){
			//Loogger::error('config');
			exit;
		}
		$this->dest = str_replace("/", "\\", $config['dest']);
		$this->src  = str_replace("/", "\\", $config['src']);
		$this->name = $config['name'];

		if(substr($this->dest,0,1) == "."){
			$this->dest = __DIR__.substr($this->dest,1);
		}
		if(substr($this->src,0,1) == "."){
			$this->src = __DIR__.substr($this->src,1);
		}

		$this->_getCssList();
		if(!empty($this->cssList)){
			$this->_combineCss();
		}
	}

	/**
	* 获取目录下所有css-file
	**/
	private function _getCssList(){
		$dir = $this->src;
		if(is_dir($dir)){
			if($dh = opendir($dir)){
				while (($file = readdir($dh)) !== false) {
					if($file != '.' && $file != '..' ){
						$this->cssList[] = $this->src. DIRECTORY_SEPARATOR .$file;
					}
				}
			}
		}
	}

	/**
	* 合并css
	**/
	private function _combineCss(){
		if(empty($this->name)){
			$this->name = $this->_generateName();
		}
		$css_url = $this->dest .DIRECTORY_SEPARATOR. $this->name;
		if(!file_exists($this->dest)) mkdir($this->dest,0777);
		$css_content = '';

		foreach($this->cssList as $url)
    	{$css_content .= @file_get_contents($url);}

    	$css_content = preg_replace("/[\r\n]/",'',$css_content);
    	$css_content = preg_replace("/\s/","",$css_content);
    	@file_put_contents($css_url,$css_content);
	}

	/**
	* 产生随机值
	**/
	private function _generateName(){
		return md5(substr('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',rand(1,52)).time()).'min.css';
	}

}

?>