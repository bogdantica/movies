<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>TIk TIk</title>
        <!-- Bootstrap Core CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
<body>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-66937959-2', 'auto');
	  ga('send', 'pageview');

	</script>

	<div class="container">
	<div clas="row" style="padding-top: 50px">
		<table class="table table-striped table-bordered table-hover" id="main-table">
			<thead>
				<th> Titlu</th>
				<th> Gen </th>
				<th> Link </th>	
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>




<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"  crossorigin="anonymous"></script>

<script>
$(document).ready(function(){
	$.getJSON('movies.json',function(data){
		
		$.each(data,function(id,content){
			$('#main-table tbody').append('<tr><td>' + content.title + '</td><td></td><td><a href="movie.php?id=' + id + '">url</a></td></tr>');

		});
		$('#main-table').DataTable({
			responsive: true,
		    language: {
		    url: "https://cdn.datatables.net/plug-ins/1.10.12/i18n/Romanian.json"
		    }
		});
		



	});
});
</script>



</body>
</html>