<?php

namespace Afpa\CalculetteBundle\Fibonacci;

class Fibonacci
{
	public function __construct()
	{
		// Rien de particulier ici
	}

	public function get($fib)
	{
		if($fib == 0) {
			return 0;
		}

		if($fib == 1) {
			return 1;	
		}
		else {
			return $this->get($fib - 2) + $this->get($fib - 1);
		}
	}
}