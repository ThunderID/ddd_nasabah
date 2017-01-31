<?php 

namespace App\Nasabah\ORM\Traits;

/**
 * php oop magic function getter
 *
 * @author cmooy
 */
trait BelongsToNasabah 
{
    public function scopeNasabahID($query, $variable)
    {
        return $query->where('nasabah_id', $variable);
    }
}