<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
	<?php $table_name = 'Course'?>

	<?php require 'conn.php'; ?>
    <?php include 'sidebar\sidebar.php'; ?>
	<?php include 'table_course.php';?>
	<?php include 'jquery.php';?>

	
</body>
</html>