<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style type="text/css">
		.darkMode {
			background-color: #000;
			color: #fff;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Articles</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="#">Home</a></li>
	      <li><a href="#">Page 1</a></li>
	      <li><a href="#">Page 2</a></li>
	      <li><a href="#">Page 3</a></li>
	    </ul>
	  </div>
	</nav>

	<div class="container">
		<div class="row">
			<h1>Today's articles:</h1>
			<p>Dark Mode:
				<input type="checkbox" name="" id="dard_mode">
			</p>

			@foreach($articles as $article)
			<a href="{{$article->url}}" target="_blank">
				
			<div class="row" style="border: 1px solid #000; padding: 2%; border-radius: 25px; background-color:">
				<div class="col-sm-3">
					<img src="{{$article->urlToImage}}" width="200">
				</div>
				<div class="col-sm-9">
					<h3>{{$article->title}}</h3>
					<p>{{$article->description}}</p>
					<p><b>Source:</b>{{$article->source->name}}</p>
					<p><b>Published At:</b>{{$article->publishedAt}}</p>

				</div>
			</div>

			</a>

			@endforeach
		</div>
	</div>
	<script type="text/javascript">
		$(function() {
			$("#dard_mode").on("click", function() {
				$("body").toggleClass("darkMode")
			})
		})
	</script>
</body>
</html>