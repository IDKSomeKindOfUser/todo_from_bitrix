<?php

function doneCommand(array $arguments): void
{
	$todos = getTodosOrFail();

	$todos = mapTodos($todos, $arguments, function ($todo) {
		return array_merge($todo, [
			'completed' => true,
			'completed_at' => time(),
			'updated_at' => time(),
		]);
	});

	storeTodos($todos);
}