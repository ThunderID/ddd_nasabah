<?php

namespace App\Nasabah\ValueObjects;

use Carbon\Carbon;

class MasaBerlaku
{

	private $masa_berlaku;

	function __construct($masa_berlaku)
	{
		$this->masa_berlaku = Carbon::parse($masa_berlaku);
	}

	function __toString()
	{
		return $this->masa_berlaku->format('Y-m-d');
	}


}