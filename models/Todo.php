<?php
declare(strict_types = 1);

class Todo
{
	private string $id;
	private string $title;
	private bool $completed = false;
	private DateTime $createdAt;
	private ?DateTime $updatedAt = null;
	private ?DateTime $completedAt = null;

	public function __construct(string $title, ?string $id = null, ?bool $completed = null, ?DateTime $createdAt = null,
		?DateTime $updatedAt = null, ?DateTime $completedAt = null)
	{
		$this->id = $id ?? uniqid();
		$this->completed = $completed ?? false;
		$this->createdAt = $createdAt ?? new DateTime();
		$this->updatedAt = $updatedAt;
		$this->completedAt = $completedAt;

		$this->setTitle($title);
	}

	public function done()
	{
		$now = new DateTime();

		$this->completed = true;
		$this->completedAt = $now;
		$this->updatedAt = $now;
	}

	public function undone()
	{
		$this->completed = false;
		$this->completedAt = null;
		$this->updatedAt = new DateTime();
	}

	public function getCompleted(): bool
	{
		return $this->completed;
	}

	private function setTitle(string $title)
	{
		$title = trim($title);
		if (strlen($title) === 0)
		{
			throw new Exception('Task title cannot be empty');
		}

		return $this->title = $title;
	}

	public function getTitle(): string
	{
		return $this->title;
	}

	public function getCompletedAt(): ?DateTime
	{
		return $this->completedAt;
	}

	public function getUpdatedAt(): ?DateTime
	{
		return $this->updatedAt;
	}

	public function getCreatedAt(): DateTime
	{
		return $this->createdAt;
	}

	public function getId(): string
	{
		return $this->id;
	}
}
