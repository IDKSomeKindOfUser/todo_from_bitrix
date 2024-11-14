<?php
/**
 * @var string $title
 * @var string $content
 */
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="/public/style.css">
	<title><?= $title; ?></title>
</head>
<body>
<section class="content">
	<header class="header">
		<span class="icon">📝</span>
		<?= $title; ?>
	</header>
	<?= $content; ?>
	<footer class="footer">
		&copy; <?= date('Y'); ?> Todo list by Bitrix University.
	</footer>
</section>

</body>
</html>

