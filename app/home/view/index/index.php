<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index</title>
</head>
<body>
	<h1> <?= $title; ?> </h1>
	
	dagger特性:
	<?php foreach ($data as $k => $v): ?>
		<li><?= $v; ?></li>
	<?php endforeach; ?>
	
</body>
</html>