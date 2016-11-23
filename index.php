<?php
require 'packer.php';

$config = array(
    'css' => array(
        'src' => './css',
        'dest'=> './bulid',
        'name'=> 'test.min.css'),
    'js'  => array(
        'src' => './jd',
        'dest'=> './bulid',
        'name'=> 'test.min.js')
);
$opt =  new packer();

$opt->addTask('css',$config['css']);

?>