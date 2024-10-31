<?php

function listCommand(array $arguments): void
{
	$todos = getTodosOrFail();

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
