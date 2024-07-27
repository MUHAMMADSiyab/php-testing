<?php

namespace App;

class User
{
	public function __construct(protected string $name, protected bool $subscribed = false)
	{
	}

	public function markAsSubscribed()
	{
		$this->subscribed = true;
	}

	public function isSubscribed()
	{
		return $this->subscribed;
	}
}
