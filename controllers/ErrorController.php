<?php

// даємо пространствене ім'я 

namespace Importapp\App\Controllers;

class ErrorController{
	
	public function actionNotFound() {
		
		require_once(ROOT . '/views/import-layout/error/404.php'); // підключаємо вьюв помилки 404
			
		return false; // та повертаємо значення false
		
	}
	
}

?>