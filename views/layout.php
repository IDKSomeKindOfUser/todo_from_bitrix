<?php
/**
 * @var string $title
 * @var string $content
 * @var array $footerMenu
 */
?>
<!doctype html>
<html lang="<?= option('APP_LANG', 'en')?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="style.css">
	<title><?= $title; ?></title>
</head>
<body>
<section class="content">
	<header class="header">
		<a href="/" class="icon">📝</a>
		<?= $title; ?>
	</header>
	<?= $content; ?>
	<footer class="footer">
		<div>&copy; <?= date('Y'); ?> <?= $title;?> by Bitrix University.</div>
		<?= view('components/footer-menu', ['items' => $footerMenu]) ?>
	</footer>
</section>

</body>
</html>

