<?php 

namespace App\Nasabah\Entities\Traits;

/**
 * php oop magic function setter
 *
 * @author cmooy
 */
trait SetterTrait 
{
	public function __set($attribute, $variable)
	{
		$this->$attribute 		= $variable;
	}
}