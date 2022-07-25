<?php

##################### Це файл index.php FrontController (Фронт контролер або основний контролер усього проекту) #####################

/* 1. PHP STRICT TYPE SCALAR HARDCORE TYPES (Вмикаємо строгу скалярну типизацію даних) */

	declare(strict_types=1);
	
	/* Name space FrontController (Додаємо пространствене ім'я Фронтконтролеру) */
	
	namespace Importapp\App\FrontController;
	
/* 2. Dispalay and show all errors (Відобразимо усі наявні помилки) */

	ini_set('display_errors', '1');	
		
	error_reporting(E_ALL);
	
/* 3. initialization ROOT dir base (Ініаціліазується константа для того, щоб отримати корневий шлях де знаходиться проект) */

	/* Потім ця константа буде використовуватися у коді */

	define('ROOT', dirname(__FILE__));


/* 4. Init Class Autoloader (Запускаємо Composer PSR-4 загрузчик файлів, класів, та простратвених імен) */
	
	require_once __DIR__ . '/vendor/autoload.php';
	
/* 5. Include in FrontController file, components, database and plugins (Це по старому підключаються файли до проекту якщо не використовувати PSR-4 ) */

	//include_once( ROOT . '/components/Autoloader/Loader.php' );

	//include_once( ROOT . '/components/Routes/Router.php' );
	
	//include_once( ROOT . '/components/DB/DB.php' );
	
	
	
/* 6. Initialization Router in FrontController (Створюємо об'єкт класу Router у цьому файлі прописана логіка взаємодії із URL) */

	use Importapp\App\Routers\Router;

	$router = new Router();
	
	/* Запускаємо метод run() у цьому методі основна заємодія з контролерами та акшонами */
	
	$router->run();


?>