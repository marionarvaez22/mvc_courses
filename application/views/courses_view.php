<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Courses</title>
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
	<div id="course_container">
		<table>
		<tr>
			<td colspan="2"><h3>Add a new course</h3></td>
		</tr>
		<?= form_open('courses') ?>
		<tr>
			<td colspan="2"><?= form_error('course_name') ?></td>
		</tr>
		<tr>
			<td>Name: </td>
			<td><input type="text" name="course_name"></td>
		</tr>
		<tr>
			<td>Description:</td>
			<td><textarea name="course_description" cols="30" rows="5"></textarea></td>
		</tr>
		<tr>
			<td colspan="2" align="right"><?= form_submit(array('id' => 'submit', 'value' => 'Add course')); ?> <?php echo form_close(); ?></td>
		</tr>	
		</form>
		</table>
		</form>
	</div>
	<div id="courses">
		<h2>Courses</h2>
		<table>
			<tr>
				<thead>
					<td>Course name</td>
					<td>Description</td>
					<td>Date added</td>
					<td>Action</td>
				</thead>
			</tr>
<?php
				$courses = array_reverse($this->session->userdata['courses']);

				foreach($courses as $course)
				{	?>
					<tr>
						<td><?= $course['title'] ?></td>
						<td><?= $course['description'] ?></td>
						<td><?=  date('F jS, Y', strtotime($course['created_at'])) ?></td>
						<td><a href="/courses/choose/<?= $course['id'] ?>">Remove</a></td>
				</tr>
<?php
				}
			?>
			
		</table>
	</div>
</body>
</html>