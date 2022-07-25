<?php

// даємо пространствене ім'я 

namespace Importapp\App\Models;

// підключаємо пространствені імена класу бази даних, щоб можна було із ними взаємодіяти

use Importapp\App\DB\Database;

class Import{
	
	/**
	* Метод нічого не повертає, він просто завантажує файл із браузеру перевіряє його на валідність та 
	* зберігає у папці import яка є в корні проекту, а вже після конвертує файл .csv у базу даних mysql
	* @param немає
	*/
	
	public function uploadFile() : void {
	
		
		if( isset($_POST['uploadBtn']) ) { // Перевіряємо чи натиснута кнопка завантажити файл
			
			$mimes = array('text/csv'); // Визначаємо який саме формат файлу нам потрібен
			
			if(in_array($_FILES['uploadedFile']['type'],$mimes)){ // Перевіряємо чи файл насправді відповідає потрібному формату .csv
				
				if($_FILES['uploadedFile']['size'] < 1000000) { // перевіряємо чи файл не більше ніж 1 МБ 
					
					$name = "import/" . $_FILES["uploadedFile"]["name"]; // Вказуємо куди саме потрібно зберегти файл після валідації у папку import у корні проекту
					
					$file = ROOT . '/' . $name; // тут дописуємо повний шлях або абсолютний шлях до файлу де він буде знаходитись
					
					move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $name); // завантажуємо файл у папку import у корні проекту
					
					Database::closeConnection(); // Close connection with DB (Перевіряємо, щоб з'єднання із базою даних було перервано)
		
					$db = Database::getConnect(); // Підключаємо паттерн проектування Singleton базу даних
					
						$file = str_replace('\\', '/', $file); // тут змінюємо усі зворотні слеші на звичайні, без цього не завантажить 
															   // файл .csv у mysql
					
						echo $file . '<br />'; // це для того, щоб побачити який шлях має наш завантажений файл
						
						$query = $db->query('TRUNCATE `users`'); // Очищуємо таблцю users перед тим як щось туди завантажувати
						
						// Тут ми конвертуємо файл .csv у mysql таким чином завантажеться у базу даних у таблицю users
						$query = $db->prepare("LOAD DATA INFILE '$file' INTO TABLE `users` FIELDS TERMINATED BY ',' IGNORE 1 ROWS;");
						$query->execute();
						
						
					// Це повідомлення про те що файл успішно завантажено
					echo '<br /><a href="/import-data/">Back to upload</a><br />';
					die('FILE IS A LOAD SUCCESSFULLY<br /><a href="/view-results/">View results</a>');
				
				}else{
					// Це повідомлення про те що файл не повинен бути більше ніж 1 МБ
					echo '<a href="/import-data/">Back to upload</a>';
					die("Size should be no more 1 mb");
					
				}
				
			  // do something
			}else{
				// Це повідомлення про те що файл або взагалі не завантажено, або він не відповідає формату .csv
				echo '<a href="/import-data/">Back to upload</a>';
				die("Sorry, mime type not allowed");
			  
			}

		}
		
		
	}
	
}

?>