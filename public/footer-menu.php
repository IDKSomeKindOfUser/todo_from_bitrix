<?php

$time = isset($_GET['date']) ? strtotime($_GET['date']) : time();
if ($time === false)
{
	$time = time();
}
$secondsInDay = 24 * 60 * 60;
$dayBefore = $time - $secondsInDay;
$dayAfter = $time + $secondsInDay;

return [
	['url' => '/?date=' . date('Y-m-d', $dayBefore), 'title' => 'Yesterday'],
	['url' => '/?date=' . date('Y-m-d', $dayAfter), 'title' => 'Tomorrow'],
	['url' => '/', 'title' => 'Today'],
	['url' => '/report.php', 'title' => 'Report'],
];