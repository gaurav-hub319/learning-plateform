<?php 
if (isset($_POST['submit'])) {
	

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>submit</title>
</head>
<body>
<h4>Quiz Submit</h4>
<script type="text/javascript">
	alert("quiz submit");
	window.location="course.php";
</script>
</body>
</html>
<?php }
else{

?>
<h4>Quiz not Submit</h4>
<script type="text/javascript">
	alert("quiz not  submit");
	window.location="course.php";
</script>
<?php }?>
