<?php 

namespace App\Nasabah\Entities\Traits;

/**
 * php oop magic function getter
 *
 * @author cmooy
 */
trait GetterTrait 
{
    public function __get($attribute)
    {
        return $this->$attribute;
    }
}