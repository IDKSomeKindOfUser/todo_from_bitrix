<?php
require_once __DIR__ . '/../boot.php';


$time = null;
$isHistory = false;
$title = option('APP_NAME', 'Todo list');
$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$title = trim($_POST['title']);

	if (strlen($title) > 0)
	{
		$todo = new Todo($title);
		saveTodo($todo);
		redirect('/');
	}
	else
	{
		$errors[] = 'Task title cannot be empty';
	}

}

if (isset($_GET['date']))
{
	$time = strtotime($_GET['date']);
	if ($time === false)
	{
		$time = time();
	}
	$today = date('Y-m-d');
	if ($today !== date('Y-m-d'))
	{
		$isHistory = true;
		$title = sprintf('Todo list :: %s', date('j M', $time));
	}
}




echo view('layout', [
	'title' => $title,
	'footerMenu' => require_once ROOT . '/public/footer-menu.php',
	'content' => view('pages/index', [
        'todos' => getTodos($time),
		'isHistory' => $isHistory,
		'errors' => $errors,
    ]),
]);

