<?php

// даємо пространствене ім'я 

namespace Importapp\App\DB;

// Це класичний паттерн проектування Singleton думаю тут і так усе ясно лише тільки closeConnection()
// цей метод для того, щоб обірвати з'єднання із БД

class Database{
	
	private static $connection;
	
	private function __construct() {}
	
	private function __clone() {}
	
	private function __wakeup() {}
	
	public static function getConnect() {
		
		$paramsPath = ROOT . '/config/db_params.php';
		$params = include($paramsPath);
		
			try{
				
				if(!self::$connection) {
					
					// тут отримаємл параметри для підключення до БД із папки та файлу config/db_params.php папка у корні проекту знаходиться
					$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}"; 
					self::$connection = new \PDO($dsn, $params['user'], $params['password']);
					
						return self::$connection;
						
				}		
				
			}catch(PDOExeption $e) {
				
				echo 'Ошибка: '.$e->getMessage().'<br />';
				echo 'На строке: '.$e->getLine();
				
			}
		
	}
	
	public static function closeConnection() {
		
		try{
				
			if(self::$connection) {
			
				self::$connection = null;
				
					return self::$connection;
					
			}		
			
		}catch(PDOExeption $e) {
			
			echo 'Ошибка: '.$e->getMessage().'<br />';
			echo 'На строке: '.$e->getLine();
			
		}
		
	}
	
}

?>