<html>
	<head>
		<meta http-equiv="content-Type" charset="utf-8">
		<title>单个文件上传测试</title>
	</head>
	<body>
		<form action="<?= __SELF__; ?>" method="post" enctype="multipart/form-data">
			<input type="file" name="picname"/>
			<input type="submit" values="上传"/>
		</form>		
	</body>
</html>

