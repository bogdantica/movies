<?php 

if(!isset($_GET['id']) || !is_numeric($_GET['id']))
{
	return;
}

$movieId = $_GET['id'];

$movies = file_get_contents('movies.json');
$movies = json_decode($movies);

if(isset($movies[$movieId]))
{
	$movie = $movies[$movieId];
	//var_dump($movie);
}
?>
<htmL>
<body style="text-align: center">
<iframe frameborder="0" style="opacity: 0;" height="1000" src="iframe.php?url=<?=$movie->embeded?>" id="iframe" align="top" width="800" ></iframe>
</iframe>
<br>
<a href="index.php" style="width: 100%">Inapoi</a>
</body>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>


<script>
	$(document).ready(function(){
		setTimeout(function(){
			var url = $('iframe').contents().find('#streamurl').html();
			url = 'https://openload.co/stream/' + url + '?mime=true';
			$('iframe').remove();
			$('body').prepend('<iframe src="' + url + ' " frameborder="0" height="80%" width="80%"></iframe>' );

			//window.location.replace('show.php?url='+url);
		},1000);
	});
</script>
</htmL>


