<?php

namespace App\Nasabah\ORM\Models;

/**
 * Used for Alamat Models
 * 
 * @author cmooy
 */
// use App\CrossServices\ClosedDoorModelObserver;
use App\Nasabah\ORM\Traits\BelongsToNasabah;

class AlamatModel extends BaseModel 
{
	use BelongsToNasabah;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'alamat';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'nasabah_id'		,
											'alamat'			,
											'kota'				,
											'provinsi'			,
											'negara'			,
											'kode_pos'			,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'alamat'			=> 'required',
											'kota'				=> 'required|max:255',
											'provinsi'			=> 'required|max:255',
											'negara'			=> 'required|max:255',
											'kode_pos'			=> 'max:255',
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
 
        // AlamatModel::observe(new ClosedDoorModelObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/
}
