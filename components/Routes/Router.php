<?php

/* Даємо пространствене ім'я роутеру також це потрібно прописати у composer.json */

namespace Importapp\App\Routers;

/* Додаємо пространствені імена класів контролерів для того, щоб взаємодіяти із ними */

use Importapp\App\Controllers\IndexController;
use Importapp\App\Controllers\ErrorController;


class Router{
	
	/**
	*	Повертає строку uri взяту із адреси сайту на початку і кінці обрізані слеши
	*	@param немає
	*/
	
	protected function getUri() : string {
		
		if( !empty( $_SERVER['REQUEST_URI'] ) ) {
		
			return trim( $_SERVER['REQUEST_URI'], '/' );
	
		}
		
	}
	
	/**
	*	Метод повертає строку uri перероблену за допомогою функції preg_replace та на виході отримаємо до якого контролера звертатися 
		та до якого акшону
	*	@param немає
	*/
	
	public function getRoutes() : string {
		
		$uri = $this->getURI(); // Отримаємо наш URI для того щоб, взаємодіяти із ним далі
		
		if ( preg_match( '~^$~', $uri ) ) { // Перевіряємо шлях за допомогою preg_match, де Ви знаходитесь у браузері та на основі цього вже направляємо
		
											// до потрібного контролеру та акшону через функцію preg_replace
			
			return preg_replace( '~^$~', 'index/index', $uri );
			
		}else if ( preg_match( '~^import-data$~', $uri ) ) {
			
			return preg_replace( '~^import-data$~', 'index/importData', $uri );
			
		}else if ( preg_match( '~^import-data/upload.php$~', $uri ) ) {
			
			return preg_replace( '~^import-data/upload.php$~', 'index/upload', $uri );
			
		}else if ( preg_match( '~^import-data/clear.php$~', $uri ) ) {
			
			return preg_replace( '~^import-data/clear.php$~', 'index/clearRecods', $uri );
			
		}else if ( preg_match( '~^view-results$~', $uri ) ) {
			
			return preg_replace( '~^view-results$~', 'index/viewResults', $uri );
			
		}else{
			
			return 'error/notFound'; // Якщо жоден шлях не співпадає тоді отримаємо конролер та акшон який взаємодіє із помилкою 404
			
		}
		
	}
	
	/**
	*	Метод передає дані до контролеру та акшону за допомогою функції call_user_func_array(array($controllerObject, $actionName), $parameters);
	*	@param немає
	*/
	
	public function run() : void {
		
		//echo $this->getRoutes() . '<br />'; // Перевіряємо чи насправді отримали потрібний контролер та акшон
		
		$internalRoute = $this->getRoutes(); // потрібний контроле та акшон запам'ятовуємо у змінній $internalRoute
		
		$segments = explode( '/', $internalRoute ); // у змінній $segments розділяємо строку яку отримали $internalRoute наприклад index/importData
		
		$controllerName = ucfirst(array_shift( $segments )) . 'Controller'; // ми знаємо що функція explode ріже на масиви строки тому ми
																			// знаємо, що точно перший буде контролер і його ім'я index
																			// Робимо index першу букву у верхньому регістрі отримаємо Index
																			// у кінці додаємо слово Controller таким чином отримаємо IndexController
		
		$actionName = 'action' . ucfirst(array_shift( $segments )); // наступним ми отримаємо акшон він іде наступним у масиві $segments
																	// спочатку додаємо слово action, а вже після акшон першу букву робимо з великої літери
																	// таким чином отримаємо actionImportData
		
		/* ПОЧАТОК - Цей блок закоментований, бо це по старому якщо не використовувати Composer PSR-4 */
		
		
		/* $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
		
		if ( file_exists( $controllerFile ) ) {
			
			include_once( $controllerFile );
			
		} */
		
		/* КІНЕЦЬ - Цей блок закоментований, бо це по старому якщо не використовувати Composer PSR-4 */
		
		//echo $controllerName . '<br />'; // тут можна побачити, що після всіх маніпуляцій ми отримали IndexController
		
		//echo $actionName . '<br />'; // тут можна побачити, що після всіх маніпуляцій ми отримали actionImportData
		
			/* ПОЧАТОК - У цьому блоці коду потрібно сказати загрузчику класів PSR-4, що будемо викликати саме ці об'єкти класів */
			
			// та вказуємо за яким контролером та акшоном ми посилаємося, щоб правильно взаємодіяти та передавати роути
		
			switch($internalRoute) {
				
				case 'index/index':
				
					$controllerObject =  new IndexController(); // Отримаємо об'єкт класу контролеру
					break;
				
				case 'index/importData':
				
					$controllerObject =  new IndexController();
					break;
					
				case 'index/upload':
				
					$controllerObject =  new IndexController();
					break;
					
				case 'index/clearRecods':
				
					$controllerObject =  new IndexController();
					break;
					
				case 'index/viewResults':
				
					$controllerObject =  new IndexController();
					break;
			
				case 'error/notFound':
			
					$controllerObject =  new ErrorController();
					break;
				
			}
			
			/* КІНЕЦЬ - У цьому блоці коду потрібно сказати загрузчику класів PSR-4, що будемо викликати саме ці об'єкти класів */
			
			//$controllerObject = new $controllerName(); // Ця строчка по старому якщо не використовувати PSR-4
		
			$parameters = $segments; // Останім із зміної на почтаку яка була у нас $segments отримаємо параметри
			
									// це робиться для того, якщо у адресній строчці браузера ми будемо вказувати 
									
									// якісь наприклад статті до новин або конкретний товар
									
									// наприклад https://site-example/news/id-12345 ---> ось це параметр id
									
									// його можна взяти та передати як параметр до контролеру та акшону, а далі можна передати параметр 
									// у модель або до вьюв
		
			// $result передає дані до контролеру та акшону за допомогою функції call_user_func_array(array($controllerObject, $actionName), $parameters);
		
			$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
		
				// Якщо результату не отримано вбиваємо виконання скрипту php
				
				if($result != null) {
					
					//break;
					die;
					
				}
		
	}
	
}

?>