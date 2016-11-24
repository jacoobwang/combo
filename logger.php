<?php

	class Logger{

		public static function render(){
			$date= date('H:i:s');
			$tml = '<p>['.$date.'] combo start run ...</p>';
			$css = '<style type="text/css">body{background:#000;}p{color:#fff;}</style>';
			echo $css;
			echo($tml);
		}

		public static function append($msg){
			$p = '<p>['.date('H:i:s').'] '.$msg.'</p>';
			echo $p;
		}

	}

?>