<?php
/**
 * @var array $items
 */

$currentPage = $_SERVER["REQUEST_URI"];
?>

<nav class="footer-menu">
	<?php foreach ($items as $item) : ?>
		<a href="<?= $item['url']; ?>" class="<?= ($item['url'] === $currentPage) ? 'is-active' : '';?>"><?= $item['title']; ?></a>
	<?php endforeach;?>
</nav>
