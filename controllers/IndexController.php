<?php

// даємо пространствене ім'я 

namespace Importapp\App\Controllers;

// підключаємо пространствені імена класів моделей, щоб можна було із ними взаємодіяти

use Importapp\App\Models\Import;
use Importapp\App\Models\ViewResults;


class IndexController{
	
	/**
	* Метод просто вмикає вьюв початкової сторінки за адресою https://site-example або https://site-example/
	* @param немає
	*/
	
	public function actionIndex() {
		
		require_once(ROOT . '/views/import-layout/index.php'); // підключаємо вьюв
			
		return true; // та повертаємо значення true
		
	}
	
	/**
	* Метод просто вмикає вьюв сторінки за адресою https://site-example/impload-data/
	* @param немає
	*/
	
	public function actionImportData() {
		
		require_once(ROOT . '/views/import-layout/import-data-layout.php'); // підключаємо вьюв
			
		return true; // та повертаємо значення true
		
	}
	
	/**
	* Метод просто вмикає вьюв сторінки за адресою https://site-example/impload-data/upload.php
	* Але спочатку метод звертається до моделі класу Import та до методу uploadFile()
	* Подальша взаємодія іде у цьому класі та методі там іде взаємодія із загрузкою файлу та переконвертацією і завантаженям до бази даних
	* із формату .csv
	* @param немає
	*/
	
	public function actionUpload() {
		
		$objModelImport = new Import();
			
			$result = $objModelImport->uploadFile();
			
				if ( $result == true ) {
					
					//$objViewLayout = new ViewLayout(); // Тут щось робимо якщо отримали true, можливо не зовсім доцільно та коректно
														 // Але я зробив так
					
				}
		
		
		
		
	}
	
	/**
	* Метод просто вмикає вьюв сторінки за адресою https://site-example/view-results/
	* Але спочатку метод звертається до моделі класу ViewResults та до методу getResult()
	* Подальша взаємодія іде у цьому класі та методі там іде взаємодія отриманням даних вже завантажених із файлу та із бази даних
	* @param немає
	*/
	
	public function actionViewResults() {
		
		
		$objModelViewResults = new ViewResults();
		
			$result = $objModelViewResults->getResult();
			
				if ( $result == true ) {
					
					//$objViewLayout = new ViewLayout(); // Тут щось робимо якщо отримали true, можливо не зовсім доцільно та коректно
														 // Але я зробив так
					
				}else{
					
					//require_once(ROOT . '/views/import-layout/view-results-empty.php'); // Тут щось робимо якщо отримали false, можливо не зовсім доцільно та коректно
														 // Але я зробив так
			
					//return false;
					
				}
		
		
		
		
	}
	
	/**
	* Метод просто вмикає вьюв сторінки за адресою https://site-example/import-data/clear.php
	* Але спочатку метод звертається до моделі класу ViewResults та до методу clearResult()
	* Подальша взаємодія іде у цьому класі та методі там іде взаємодія із базою даних, а саме очищення таблиці users
	* @param немає
	*/
	
	public function actionClearRecods() {
		
		$objModelViewResults = new ViewResults();
		
			$result = $objModelViewResults->clearResult();
			
				if ( $result == true ) {
					
					echo '<a href="/import-data/">Back to upload</a><br />';
					die('The database has been cleared<br /><a href="/view-results/">View results</a>');
					
				}else{
					
					
					
				}
		
	}
	
}

?>