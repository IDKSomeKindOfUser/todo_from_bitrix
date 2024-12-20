<?php

function view(string $path, array $variables = []) : string
{
	if (!preg_match('/^[0-9A-Za-z\/_-]+$/', $path))
	{
		throw new Exception("Invalid template path: $path");
	}

	$absolutePath = ROOT . "/views/$path.php";

	if (!file_exists($absolutePath))
	{
		throw new Exception("Template not found: $path");
	}

	extract($variables);

	ob_start();

	require $absolutePath;

	return ob_get_clean();
};

function safe_output(string $value): string
{
	return htmlspecialchars($value, ENT_QUOTES);
}

function truncate(string $text, ?int $maxLength = null): string
{
	if ($maxLength === null)
	{
		return $text;
	}

	$cropped = mb_substr($text, 0, $maxLength);
	if ($cropped !== $text)
	{
		return "$cropped...";
	}

	return $text;
}