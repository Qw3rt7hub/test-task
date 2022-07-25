<?php

namespace Importapp\App\View;

class ImportdataLayout{
	
	/* Some code */
	
	// Це у нас шаблон вьюв який відобразиться за адресою https://site-example/import-data/
	
}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Import Data</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="/template/css/bootstrap.min.css">
	<link rel="stylesheet" href="/template/css/style.css" type="text/css">
	<link rel="stylesheet" href="/template/css/404.css" type="text/css">
	<style type="text/css">
		form#import span, input{
			color: red;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<header>
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12 col-12">
							<div class="header-logo">
								<img src="/template/img/logo3.png" alt="">
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12 col-12">
							<div class="header-h1">
								<h2>Import Data</h2>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12 col-12">
							<div class="header-right-block">
								<p>Right block</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="header-menu">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
							<nav>
								<ul>
									<li><a href="/">Back to Home</a></li>
									<li><a href="/view-results/">View Results</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</header>
			<div class="main-content">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
						<article class="Error-article">
							<center>
								<form method="POST" id="import" action="upload.php" enctype="multipart/form-data">
									<span>Upload a File:</span>
									<input type="file" accept=".csv" name="uploadedFile" />
									<input type="submit" name="uploadBtn" value="Upload" />
								</form><br /><br />
								<form method="POST" action="clear.php">
									<input type="submit" id="id-clear-all-records" name="submit-clear-all-records" value="Clear all records" />
								</form>
							</center>
						</article>
					</div>	
				</div>	
			</div>
			<footer>
				<h3>FOOTER</h3>
			</footer>
		</div>
	</div>
</body>
</html>

<?php



 ?>