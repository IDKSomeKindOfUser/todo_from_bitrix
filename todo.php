<?php

declare(strict_types = 1);

require_once __DIR__ . '/boot.php';

function main(array $arguments): void
{
	array_shift($arguments);

	$command = array_shift($arguments);

	switch ($command)
	{
		case 'list':
			listCommand($arguments);
			break;
		case 'add':
			addCommand($arguments);
			break;
		case 'remove':
		case 'rm':
			removeCommand($arguments);
			break;
		case 'done':
			doneCommand($arguments);
			break;
		case 'undone':
			undoneCommand($arguments);
			break;
		default:
			echo 'Unknown command: ' . $command;
			exit(1);
	}
}

main($argv);
