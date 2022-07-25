<?php

namespace Importapp\App\View;

use Importapp\App\Models\ViewResults;

class ViewResultsLayout{
	
	/* Some code */
	
	// Це у нас шаблон вьюв який відобразиться за адресою https://site-example/view-results/
	
}

$objViewResults = new ViewResults(); // Після того як у моделі класу ViewResults ми підключили у методі getResult() шаблон вьюв ми можемо 
									 // Взаємодіяти із ним тому створюємо обє'кт класу ViewResults та переганяємо через foreach і відобразимо
									 // його у html таблиці нижче у коді

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>View Results</title>
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
								<h2>View Results</h2>
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
									<li><a href="/import-data/">Back to Import Data</a></li>
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
						
			<!-- Перевіримо чи є внас масив із даними із бази даних якщо нема відображаємо фразу Ще немає даних у базі, спочатку завантажте файл. -->

						<?php if($objViewResults->getResult() == false) {?>
							
							<h1 class="acquaintance">Ще немає даних у базі, спочатку завантажте файл.</h1>
						
						<?php }else{ ?>
						
							<center style="color: white;">
							
									<table class="table">
									  <thead>
										<tr>
										  <th scope="col">UID</th>
										  <th scope="col">Name</th>
										  <th scope="col">Age</th>
										  <th scope="col">Email</th>
										  <th scope="col">Phone</th>
										  <th scope="col">Gender</th>
										</tr>
									  </thead>
									  <tbody>
							
							<!-- обє'кт класу ViewResults та переганяємо через foreach і відобразимо його у html таблиці нижче у коді -->
							
								<?php foreach($objViewResults->getResult() as $tableData) : ?>
								
									
									
										<tr>
										  <th scope="row"><?php echo $tableData['UID']; ?></th>
										  <td><?php echo $tableData['Name']; ?></td>
										  <td><?php echo $tableData['Age']; ?></td>
										  <td><?php echo $tableData['Email']; ?></td>
										  <td><?php echo $tableData['Phone']; ?></td>
										  <td><?php echo $tableData['Gender']; ?></td>
										</tr>
							
									
								<?php endforeach; ?>
								
									</tbody>
									</table>
									
							</center>
							
						<?php } ?>
						
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