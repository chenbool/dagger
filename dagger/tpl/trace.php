	<div class="show_page_trace" style="position:fixed;bottom:10px;right:0;background-color:#232323;cursor:pointer;" onclick="show_page_trace()">

		<img src="<?= __PUBLIC__ ?>favicon.ico" alt="" style="float:left;position:relative;right:-1px;">
		<?php 
			$runTime=microtime(TRUE)-$GLOBALS['_beginTime'];
		?>
		<div style="background-color:#232323;float:left;height:32px;line-height:32px;text-align:center;padding:0 8px;color:white;">
			<?= mb_substr($runTime,0,8,'utf-8');?>s
		</div>	
	</div>




	<div class="show_page_trace_info" style="position:fixed;bottom:0;left:0;border:1px solid gray;padding:0 2% 20px 2%;width:96%;display:none;background-color:white;" >
		<span style="float:right;cursor:pointer;" onclick="show_page_trace_info()">[ x ]</span>
		<h2>基本</h2>
		
		<div>
			<table>
				<tr>
					<td>主机地址:</td>
					<td><?= $_SERVER['SERVER_NAME']; ?></td>
				</tr>
				<tr>
					<td>加载时间:</td>
					<td><?= $runTime; ?>s</td>
				</tr>
				<tr>
					<td>内存开销:</td>
					<td><?= $GLOBALS['_startUseMems']; ?>kb</td>
				</tr>
				<tr>
					<td>请求方式:</td>
					<td><?= $_SERVER['REQUEST_METHOD']; ?></td>
				</tr>	
				<tr>
					<td>请求地址:</td>
					<td><?= $_SERVER['REQUEST_URI']; ?></td>
				</tr>							
				<tr>
					<td>请求时间:</td>
					<td><?= date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']); ?></td>
				</tr>
				<tr>
					<td>操作系统:</td>
					<td><?= PHP_OS; ?></td>
				</tr>				
				
			</table>						 
		</div>

	</div>
<script>
	function show_page_trace_info(){
		// 
		var hides=document.getElementsByClassName('show_page_trace_info');
		hides[0].style.display='none';

		var traces=document.getElementsByClassName('show_page_trace');
		traces[0].style.display='block';
	}


	function show_page_trace(){
		var traces=document.getElementsByClassName('show_page_trace');
		traces[0].style.display='none';

		var hides=document.getElementsByClassName('show_page_trace_info');
		hides[0].style.display='block';

	}	
</script>

