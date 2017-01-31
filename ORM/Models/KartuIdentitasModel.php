<?php

namespace App\Nasabah\ORM\Models;

/**
 * Used for KartuIdentitas Models
 * 
 * @author cmooy
 */
// use App\CrossServices\ClosedDoorModelObserver;
use App\Nasabah\ORM\Traits\BelongsToNasabah;

class KartuIdentitasModel extends BaseModel 
{
	use BelongsToNasabah;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'kartu_identitas';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'nasabah_id'		,
											'type'				,
											'isi'				,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'type'				=> 'required|max:255',
											'isi'				=> 'required',
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
 
        // KartuIdentitasModel::observe(new ClosedDoorModelObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/
}
