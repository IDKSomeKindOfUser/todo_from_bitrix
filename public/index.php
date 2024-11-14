	<?php
require_once __DIR__ . '/../boot.php';

$time = null;
$isHistory = false;
$title = 'Todo list';
$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$title = trim($_POST['title']);

	if (strlen($title) > 0)
	{
		$todo = createTodo($title);
		addTodo($todo);
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
	'content' => view('pages/index', [
        'todos' => getTodos($time),
		'isHistory' => $isHistory,
		'errors' => $errors,
    ]),
]);
