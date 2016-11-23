<?php
	
class jsPacker{

	private $jsList = [];
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

		$this->_getJsList();
		if(!empty($this->jsList)){
			$this->_combineJs();
		}
	}

	/**
	* 获取目录下所有js-file
	**/
	private function _getJsList(){
		$dir = $this->src;
		if(is_dir($dir)){
			if($dh = opendir($dir)){
				while (($file = readdir($dh)) !== false) {
					if($file != '.' && $file != '..' ){
						$this->jsList[] = $this->src. DIRECTORY_SEPARATOR .$file;
					}
				}
			}
		}
	}

	/**
	* 合并js
	**/
	private function _combineJs(){
		if(empty($this->name)){
			$this->name = $this->_generateName();
		}
		$js_url = $this->dest .DIRECTORY_SEPARATOR. $this->name;
		if(!file_exists($this->dest)) mkdir($this->dest,0777);
		$js_content = '';

    	foreach($this->jsList as $url)
        {
            $append_content = @file_get_contents($url)."\r\n";
            $packer = new JavaScriptPacker($append_content);
            $append_content = $packer->pack();
            $js_content .= $append_content;
        }
    	@file_put_contents($js_url,$js_content);
	}

	/**
	* 产生随机值
	**/
	private function _generateName(){
		return md5(substr('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',rand(1,52)).time()).'min.js';
	}

}

?>