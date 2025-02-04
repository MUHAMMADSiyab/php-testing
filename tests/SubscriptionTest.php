<?php

namespace Tests;

use App\Gateway;
use App\Mailer;
use App\Subscription;
use App\User;
use PHPUnit\Framework\TestCase;

class SubscriptionTest extends TestCase
{
	/**
	 * @test
	 */
	public function it_creates_a_stripe_subscription()
	{
		$this->assertTrue(true);
	}

	/**
	 * @test
	 */
	public function creating_a_subscription_mark_the_user_as_subscribed()
	{
		$gateway = $this->createMock(Gateway::class);
		$mailer = $this->createMock(Mailer::class);
		$subscription = new Subscription($gateway, $mailer);
		$user = new User("Brad Traversy");

		$this->assertFalse($user->isSubscribed());

		$subscription->create($user);

		$this->assertTrue($user->isSubscribed());
	}

	/**
	 * @test
	 */
	public function it_delivers_a_receipt()
	{
		$gateway = $this->createMock(Gateway::class);
		$gateway->method('create')->willReturn('receipt-stub');

		$mailer = $this->createMock(Mailer::class);
		$mailer
			->expects($this->once())
			->method('deliver')
			->with('Your receipt number is: receipt-stub');

		$subscription = new Subscription($gateway, $mailer);

		$subscription->create(new User("Brad Traversy"));
	}
}
