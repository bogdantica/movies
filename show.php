<?php 
if(!isset($_GET['url']))
	header('index.php');



$url = $_GET['url'];
?>

<html>
<body>
	<a href="index.php">Back</a>
	<iframe frameborder="0" height="1000" src="<?=$url?>" id="iframe" align="top" width="800" ></iframe>
</body>
</html>