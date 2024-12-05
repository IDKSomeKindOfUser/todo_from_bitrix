<?php

/**
 * @param int|null $time
 * @return Todo[]
 */
function getTodos(?int $time = null): array
{
	$connection = getDbConnetion();

	$from = date('Y-m-d 00:00:00', $time);
	$to = date('Y-m-d 23:59:59', $time);

	$result = mysqli_query($connection, "
		SELECT * FROM todos
		WHERE created_at BETWEEN '{$from}' AND '{$to}'
		ORDER BY created_at
		LIMIT 10
	");

	if (!$result)
	{
		throw new Exception('Database error: ' . mysqli_error($connection));
	}

	$todos = [];

	while ($row = mysqli_fetch_assoc($result))
	{
		$todos[] = new Todo(
			$row['title'],
			$row['id'],
			($row['completed'] === 'Y'),
			new DateTime($row['created_at']),
			$row['updated_at'] ? new DateTime($row['updated_at']) : null,
			$row['completed_at'] ? new DateTime($row['completed_at']) : null
		);
	}

	return $todos;
}

function getTodosOrFail(?int $time = null): array
{
	$todos = getTodos($time);

	if (empty($todos))
	{
		echo 'No todos found' . PHP_EOL;
		exit();
	}

	return $todos;
}

function saveTodo(Todo $todo): bool
{
	$connection = getDbConnetion();

	$id = mysqli_real_escape_string($connection, $todo->getId());
	$title = mysqli_real_escape_string($connection, $todo->getTitle());
	$completed = $todo->getCompleted() ? 'Y' : 'N';
	$createdAt = $todo->getCreatedAt()->format('Y-m-d H:i:s');
	$updatedAt = $todo->getUpdatedAt() ? $todo->getUpdatedAt()->format('Y-m-d H:i:s') : null;
	$completedAt = $todo->getCompletedAt() ? $todo->getCompletedAt()->format('Y-m-d H:i:s') : null;

	$updatedAt = $updatedAt ? "'{$updatedAt}'" : "NULL";
	$completedAt = $completedAt ? "'{$completedAt}'" : "NULL";

	$sql = "INSERT INTO todos (id, title, completed, created_at, updated_at, completed_at) VALUES (
		'{$id}', 
		'{$title}', 
		'{$completed}', 
		'{$createdAt}', 
		{$updatedAt}, 
		{$completedAt}
    )";

	$result = mysqli_query($connection, $sql);

	if (!$result)
	{
		throw new Exception('Database error: ' . mysqli_error($connection));
	}

	return true;
}
