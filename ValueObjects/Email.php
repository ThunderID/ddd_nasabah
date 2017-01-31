<?php

namespace App\Nasabah\ValueObjects;

class Email 
{
	private $email;

	function __construct($email)
	{
		// $this->disallowInvalidEmail($email);
		$this->email = $email;
	}

	private function disallowInvalidEmail($email)
	{
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			throw new \InvalidArgumentException("Email address is invalid");
		}
	}

	function __toString()
	{
		return $this->email;
	}
}