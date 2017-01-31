<?php

namespace App\Nasabah\ORM\Models;

/**
 * Used for Kontak Models
 * 
 * @author cmooy
 */
// use App\CrossServices\ClosedDoorModelObserver;
use App\Nasabah\ORM\Traits\BelongsToNasabah;

class KontakModel extends BaseModel 
{
	use BelongsToNasabah;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'kontak';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'nasabah_id'		,
											'type'				,
											'akun'				,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'type'				=> 'required',
											'akun'				=> 'required|max:255',
										];

	/**
	 * Date will be returned as carbon
	 *
	 * @var array
	 */
	protected $dates				= ['created_at', 'updated_at', 'deleted_at'];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- QUERY BUILDER ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- MUTATOR ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- ACCESSOR ----------------------------------------------------------------------------*/
	
	/* ---------------------------------------------------------------------------- FUNCTIONS ----------------------------------------------------------------------------*/
		
	/**
	 * boot
	 * observing model
	 *
	 */	
	public static function boot() 
	{
		parent::boot();
 
        // KontakModel::observe(new ClosedDoorModelObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/
}
