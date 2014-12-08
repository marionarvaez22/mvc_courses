<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Courses</title>
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<div id="course_container">
	<h2>Are you sure want to delete the following course?</h2>
	<table>
		<tr>
			<td>Name:</td>
			<td><?= $title ?></td>
		</tr>
		<tr>
			<td>Description:</td>
			<td><?= $description ?></td>
		</tr>
	</table>
	<a href="/courses"><button>No</button></a>
	<a href="/courses/destroy/<?= $id ?>"><button>Yes! I want to delete this.</button></a>
</div>
</body>
</html>