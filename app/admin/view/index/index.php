<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title; ?></title>
</head>
<body>

	


	<h1> <?= $title; ?> </h1>

	<table>
		<tr>
			<td>id</td>
			<td>name</td>
		</tr>

		<?php foreach ($data as $k => $v): ?>
		<tr>
			<td> <?= $v['id']; ?> </td>
			<td> <?= $v['name']; ?> </td>
		</tr>
		<?php endforeach; ?>

	</table>
	
	<?= $pages; ?>


</body>
</html>