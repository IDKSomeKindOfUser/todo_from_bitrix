<?php

function undoneCommand(array $arguments): void
{
	$todos = getTodosOrFail();

	$todos = mapTodos($todos, $arguments, function ($todo) {
		return array_merge($todo, [
			'completed' => false,
            'completed_at' => null,
            'updated_at' => time(),
		]);
	});

	storeTodos($todos);
}
