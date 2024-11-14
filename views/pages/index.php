<?php
/**
* @var array $todos
* @var bool $isHistory
* @var array $errors
*/
?>
<main class="main">

	<?php if (!empty($errors)) :?>
		<div class="error-message">
			<?= implode('<br>', $errors)?>
		</div>
	<?php endif; ?>
	<?php foreach ($todos as $todo) : ?>
		<?= view('components/task', ['todo' => $todo, 'isHistory' => $isHistory]);?>
	<?php endforeach; ?>

	<?php if (!$isHistory) :?>
		<form action="/" method="post" class="add-task">
			<input type="text" name="title" required placeholder="What we need to do?">
			<button type="submit">Save</button>
		</form>
	<?php endif;?>
</main>
