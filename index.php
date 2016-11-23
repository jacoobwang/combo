<?php
function parse_script($urls,$path="./static/")
{
    $url = md5(implode(',',$urls));
    $js_url = $path.$url.'.js';
    if(!file_exists($js_url))
    {
        if(!file_exists($path))mkdir($path,0777);
        require_once "javascriptpacker.php";
        $js_content = '';
        foreach($urls as $url)
        {
            $append_content = @file_get_contents($url)."\r\n";
            $packer = new JavaScriptPacker($append_content);
            $append_content = $packer->pack();
            $js_content .= $append_content;
        }
        @file_put_contents($js_url,$js_content);
    }
    return $js_url;
}

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