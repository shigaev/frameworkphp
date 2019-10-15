<?php

/**
 * Class Router
 */

class Router
{

	/**
	 * @var array
	 */
	protected static $routes = []; // Массив маршрутов(таблица маршрутов)
	protected static $route = []; // Текущий маршрут (вызывается по текущему url адресу). Благодаря ему в пути url-адреса мы будем видеть какой используется вид, какой контроллер, какой экшен и т.д.

	/**
	 * Метод add добавляет то, что напишет пользователь в запросе
	 * или то, что написано у нас по-умолчанию
	 *
	 * @param $regexp - регулярное выражение, в котором описаны варианты вхождений из строки запроса браузера
	 * @param $route - маршрут, который будет соответсвовать заявленному url адресу
	 */
	public static function add($regexp, $route = [])
	{
		self::$routes[$regexp] = $route;
	}

	/**
	 * getRoutes
	 *
	 * Метод получает всю таблицу маршрутов (вспомогательный метод для распечатки маршрутов)
	 */
	public static function getRoutes()
	{
		return self::$routes;
	}

	/**
	 * getRoute возвращает текущий маршрут с которым работает приложение
	 *
	 * @return array
	 */
	public static function getRoute()
	{
		return self::$route;
	}

	/**
	 * matchRoute - ищет совпадение с запрососм в таблице маршрута
	 *
	 * @param $url
	 * @return bool
	 *
	 * Обработка запросов пользователя
	 * $query сравнивается с ключом Router::add('posts/add', ['controller' => 'Posts', 'action' => 'add']);
	 */
	public static function matchRoute($url)
	{
		foreach (self::$routes as $pattern => $route) {
			if ($url == $pattern) {
				self::$route = $route;
				return true;
			}
		}
		return false;
	}

}