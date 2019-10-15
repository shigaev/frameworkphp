<?php

/**
 * Переменная $_SERVER - это массив, содержащий информацию, такую как заголовки, пути и местоположения скриптов. Записи в этом массиве создаются веб-сервером. Нет гарантии, что каждый веб-сервер предоставит любую из них; сервер может опустить некоторые из них или предоставить другие, не указанные здесь. Тем не менее, многие эти переменные присутствуют в » спецификации CGI/1.1, так что вы можете ожидать их наличие.
 *
 * 'QUERY_STRING' - Строка запроса, если есть, через которую была открыта страница.
 */

$query = rtrim($_SERVER['QUERY_STRING'], '/'); //Получаем строку запроса

require_once '../vendor/core/Router.php';
require_once '../vendor/libs/functions.php';

$router = new Router();

Router::add('posts/add', ['controller' => 'Posts', 'action' => 'add']);
Router::add('posts', ['controller' => 'Posts', 'action' => 'index']);
Router::add('', ['controller' => 'Main', 'action' => 'index']);

debug(Router::getRoutes());

/**
 * Проверяем, если совпадение было найдено
 * распечатываем запомненный маршрут в противном случае
 * отправляем 404 ошибку
 */
if (Router::matchRoute($query)) {
	debug(Router::getRoute());
} else {
	echo '404';
}