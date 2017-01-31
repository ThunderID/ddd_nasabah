<?php

namespace App\Nasabah\ORM\Models;

/**
 * Used for Nasabah Models
 * 
 * @author cmooy
 */
// use App\CrossServices\ClosedDoorModelObserver;

class NasabahModel extends BaseModel 
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table				= 'nasabah';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable				=	[
											'nama'				,
											'tanggal_lahir'		,
											'jenis_kelamin'		,
										];

	/**
	 * Basic rule of database
	 *
	 * @var array
	 */
	protected $rules				=	[
											'nama'				=> 'required|max:255',
											'tanggal_lahir'		=> 'required|date_format:"Y-m-d"',
											'jenis_kelamin'		=> 'required|in:pria,wanita',
										];

	/**
	 * Date will be returned as carbon
	 *
	 * @var array
	 */
	protected $dates				= ['created_at', 'updated_at', 'deleted_at'];

	/* ---------------------------------------------------------------------------- RELATIONSHIP ----------------------------------------------------------------------------*/
	public function ktp()
	{
		return $this->hasOne('\App\Nasabah\ORM\Models\KartuIdentitasModel', 'nasabah_id', 'id')->where('type', 'ktp')->orderby('updated_at');
	}

	public function npwp()
	{
		return $this->hasOne('\App\Nasabah\ORM\Models\KartuIdentitasModel', 'nasabah_id', 'id')->where('type', 'npwp')->orderby('updated_at');
	}

	public function passport()
	{
		return $this->hasOne('\App\Nasabah\ORM\Models\KartuIdentitasModel', 'nasabah_id', 'id')->where('type', 'passport')->orderby('updated_at');
	}

	public function sim()
	{
		return $this->hasOne('\App\Nasabah\ORM\Models\KartuIdentitasModel', 'nasabah_id', 'id')->where('type', 'sim')->orderby('updated_at');
	}

	public function mobile()
	{
		return $this->hasOne('\App\Nasabah\ORM\Models\KontakModel', 'nasabah_id', 'id')->where('type', 'mobile')->orderby('updated_at');
	}

	public function email()
	{
		return $this->hasOne('\App\Nasabah\ORM\Models\KontakModel', 'nasabah_id', 'id')->where('type', 'email')->orderby('updated_at');
	}

	public function alamat()
	{
		return $this->hasOne('\App\Nasabah\ORM\Models\AlamatModel', 'nasabah_id', 'id')->orderby('updated_at');
	}

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
 
        // NasabahModel::observe(new ClosedDoorModelObserver());
	}

	/* ---------------------------------------------------------------------------- SCOPES ----------------------------------------------------------------------------*/
	
	public function scopeNama($query, $variable)
    {
        return $query->where('nama', 'like', '%'.$variable.'%');
    }
}
