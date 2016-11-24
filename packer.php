<?php

	class packer{

		public function addTask( $type , $config ){
			require_once 'logger.php';
			Logger::render();
			if(!empty($config) && strlen($type) != 0){

				switch ($type) {
					case 'css':
						require_once 'csspacker.php';
						new cssPacker($config);
						break;
					
					case 'js':
						require_once "javascriptpacker.php";
						require_once 'jspacker.php';
						new jsPacker($config);
						break;

					default :
						break;	
				}
			}else{
				Logger::append('config info is not right,pls check');	
			}
		}
	}

?>