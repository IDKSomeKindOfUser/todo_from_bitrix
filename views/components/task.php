<?php
/**
 * @var array $todo
 * @var bool $isHistory
 */
?>
<article class="todo">
	<label>
		<input
			type="checkbox"
			<?= ($todo['completed']) ? 'checked' : '' ?>
			<?= (!$isHistory) ? 'disabled' : '' ?>
		>
		<?= $todo['title']; ?>
	</label>
</article>

