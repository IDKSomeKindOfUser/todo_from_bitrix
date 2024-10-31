<?php

function listCommand(array $arguments): void
{
	$time = null;

	if(!empty($arguments))
	{
		$date = array_shift($arguments);
		$time = strtotime($date);
		if($time === false)
		{
			echo "Invalid date format. Please use YYYY-MM-DD format.\n";
            exit(1);
		}
	}

	$todos = getTodosOrFail($time);

	foreach ($todos as $index => $todo)
	{
		echo sprintf(
			"%d. [%s] %s \n",
			$index + 1,
			$todo['completed'] ? 'X' : ' ',
			$todo['title'],
		);
	}
}
