<?php

	class packer{

		public function addTask( $type , $config ){
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
			}
		}
	}

?>