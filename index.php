<?php
	
	if(isset($_POST['code'])){

		$code = $_POST['code'];
		if(strlen($code) > 0){
			require_once "javascriptpacker.php";

			$packer = new JavaScriptPacker($code,0);
    		$output_content = $packer->pack();
    		echo $output_content;
    		exit;
		}
		exit;
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>代码压缩工具</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<style type="text/css">
		h2{
			border-bottom: 1px solid #ccc; 
			padding-bottom: 10px;
		}	
		h2 .text_right{
			float: right;
		}
		.wrap textarea{
			width: 100%;
			border: 1px solid #ccc;
		}
		.wrap button{
			padding: 2px 10px 3px;
			border: 1px solid #666;
		}
		#output {
		    background-color: #F0F0F0;
		    border-color: #CCCCCC;
		}
		.source {
			height: 30px;
			line-height: 30px;
		}
	</style>
</head>
<body>
	<header>
		<h2>js压缩工具 <span class="text_right">version: 1.0.0</span></h2>
	</header>
	<section>
		<div class="wrap">
			<p>将代码粘贴到此处</p>
			<textarea class="input" id="input" rows="10" cols="80"></textarea>
			<p>
				<button type="button" id="clear">清除</button>
				<button type="button" id="packer">压缩</button>
			</p>
			<p>
				<textarea id="output" readonly rows="10" cols="80"></textarea>
			</p>
			<p class="source">
				源码到github中查看 <a href="https://github.com/jacoobwang/combo">https://github.com/jacoobwang/combo</a>
			</p>
		</div>	
	</div>		

	</section>	
	<script type="text/javascript" src="http://www.loadphp.cn/lab/zoomImg/jquery.min.js"></script>
	<script type="text/javascript">
		$('#clear').click(function(){
			$('#input').val('');
		});
		$('#packer').click(function(){
			var input = $('#input').val();
			$.ajax({
				url: location.href,
				type: "POST",
				data : {'code':input},
				success:function(data){
					$('#output').val(data);
				} 
			});
		});
	</script>
</body>
</html>

