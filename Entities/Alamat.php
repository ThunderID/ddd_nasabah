<?php

namespace App\Nasabah\Entities;

use App\Nasabah\Entities\Traits\GetterTrait;
use App\Nasabah\Entities\Traits\SetterTrait;

class Alamat
{
	use SetterTrait, GetterTrait;

	protected $id;
	protected $alamat;
	protected $kota;
	protected $provinsi;
	protected $negara;
	protected $kode_pos;

	protected function __construct($id, $alamat, $kota, $provinsi, $negara, $kode_pos)
	{
		$this->id 				= $id;
		$this->alamat 			= $alamat;
		$this->kota 			= $kota;
		$this->provinsi 		= $provinsi;
		$this->negara 			= $negara;
		$this->kode_pos 		= $kode_pos;
	}

	public static function build($alamat)
	{	
		return new static($alamat['id'], $alamat['alamat'], $alamat['kota'], $alamat['provinsi'], $alamat['negara'], $alamat['kode_pos']);
	}
		
	public function getAttributes()
	{
		return ['id' => $this->id, 'alamat' => $this->alamat, 'kota' => $this->kota, 'provinsi' => $this->provinsi, 'negara' => $this->negara, 'kode_pos' => $this->kode_pos];
	}
}