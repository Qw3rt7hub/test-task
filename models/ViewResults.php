<?php

// даємо пространствене ім'я 

namespace Importapp\App\Models;

// підключаємо пространствені імена класу бази даних, щоб можна було із ними взаємодіяти

use Importapp\App\DB\Database;

class ViewResults{
	
	/**
	* Метод нічого не повертає, він просто бере результат із бази даних а потім передає його у вьюв
	* @param немає
	*/
	
	public function getResult() {
		
		Database::closeConnection(); // Close connection with DB (Перевіряємо, щоб з'єднання із базою даних було перервано)
		
		$db = Database::getConnect(); // Підключаємо паттерн проектування Singleton базу даних
					
		// Робимо запит до бази даних і беремо усе що є в таблиці users, а також сортуємо від меншого до більшого
		$query = $db->prepare('SELECT * FROM `users` ORDER BY `UID` ASC'); 
		$query->execute();

			// У цей масив ми буде збережено ключи для того що можна було у вьюв отримати та викликати наприклад 
			// foreach($resultData as $data) { echo $data['UID']; }
			$resultData = array();
			
			$i = 0; // ініціалізуємо зміну $i для циклу та будемо робити ключ пару
			
			// Перебрали масив у while отримали дані
			 while($row = $query->fetch(\PDO::FETCH_ASSOC)) {
			
				$resultData[$i]['UID'] = $row['UID'];
				$resultData[$i]['Name'] = $row['Name'];
				$resultData[$i]['Age'] = $row['Age'];
				$resultData[$i]['Email'] = $row['Email'];
				$resultData[$i]['Phone'] = $row['Phone'];
				$resultData[$i]['Gender'] = $row['Gender'];
				
				$i++; // інкрементуємо робимо +1 кожен прохід циклу
				
			} 
			
			// Якщо масив отримано і він дійсно являє собою масив тоді підключаємо вьюв, а туди передаємо масив із даними із бази даних
			
			if(is_array($resultData)) {
				
				$getViewLayout = require_once(ROOT . '/views/import-layout/view-results-layout.php');
				
				return $resultData;
			
			
			}else{ // Якщо ні, тоді просто нічого не робимо
				
				$getViewLayout = null;
				
				return false;
				
			}
			
		
	}
	
	/**
	* Метод повератає true, а перед цим очищує таблицю users, це якщо натиснути кнопку clear all records
	* @param немає
	*/
	
	public function clearResult() : bool {
		
		
		$db = Database::getConnect();
					
		
		$query = $db->prepare('TRUNCATE `users`');
		$query->execute();
		
			return true;
			
			
		
	}
	
}

?>