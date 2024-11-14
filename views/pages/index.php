<?php
/**
* @var array $todos
* @var bool $isHistory
*/
?>
<main class="main">
	<?php foreach ($todos as $todo) : ?>
	<?= view('components/task', ['todo' => $todo, 'isHistory' => $isHistory]);?>
	<?php endforeach; ?>

	<?php if ($isHistory) :?>
		<form action="/" method="post" class="add-task">
			<input type="text" placeholder="What we need to do?">
			<button type="submit">Save</button>
		</form>
	<?php endif;?>
</main>
