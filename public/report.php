<?php
require_once __DIR__ . '/../boot.php';

$title = 'Todo list :: Report';
$allTodos = prepareReportData();

$totalDays = count($allTodos);

$totalTasksCount = array_reduce($allTodos, function ($prev, $todos) {
	return $prev + count($todos);
}, 0);

$totalCompletedTasksCount = array_reduce($allTodos, function ($prev, $todos) {
	$completed = array_filter($todos, fn ($todo) => $todo['completed']);
	return $prev + count($completed);
}, 0);

$dailyTasksCount = array_map(function ($todos) {
	return count($todos);
}, $allTodos);

$maxDailyTasksCount = max($dailyTasksCount);
$minDailyTasksCount = min($dailyTasksCount);

$averageTasksCount = 0;
$averageCompletedTasksCount = 0;

if ($totalDays > 0)
{
	$averageTasksCount = floor($totalTasksCount / $totalDays);
	$averageCompletedTasksCount = floor($totalCompletedTasksCount / $totalDays);
}

$report = [
	"Total days: $totalDays",
	"Total tasks count: $totalTasksCount",
	"Total completed tasks count: $totalCompletedTasksCount",
	"Max daily tasks count: $maxDailyTasksCount",
	"Min daily tasks count: $minDailyTasksCount",
	"Average tasks count per day: $averageTasksCount",
	"Average completed tasks count per day: $averageCompletedTasksCount",
];


echo view('layout', [
	'title' => $title,
	'footerMenu' => require_once ROOT . '/public/footer-menu.php',
	'content' => view('pages/report', [
		'report' => $report,
	]),
]);