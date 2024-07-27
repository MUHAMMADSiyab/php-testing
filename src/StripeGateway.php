<?php

namespace App;

class StripeGateway implements Gateway
{
	public function create()
	{
		var_dump("Some processing going on...");
	}
}
