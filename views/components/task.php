<?php
/**
 * @var Todo $todo
 * @var bool $isHistory
 */
?>
<article class="todo">
	<label>
		<input
			type="checkbox"
			<?= ($todo->getCompleted()) ? 'checked' : '' ?>
			<?= ($isHistory) ? 'disabled' : '' ?>
		>
		<?= safe_output(truncate($todo->getTitle(), option('TRUNCATE_TODO', 200))); ?>
		<time datetime="<?= $todo->getCreatedAt()->format(DateTimeInterface::ATOM) ?>"
			  class="todo-time"><?= $todo->getCreatedAt()->format('M, d'); ?></time>
	</label>
</article>

