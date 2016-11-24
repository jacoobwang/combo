<?php
	require '../packer.php';

	$config = array(
	    'css' => array(
	        'src' => './test/css',
	        'dest'=> './test/build',
	        'name'=> 'test.min.css'),
	    'js'  => array(
	        'src' => './test/js',
	        'dest'=> './test/build',
	        'name'=> 'test.min.js')
	);
	$opt =  new packer();

	$opt->addTask('css',$config['css']);
	$opt->addTask('js', $config['js']);
	
?>