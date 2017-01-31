<?php

namespace App\Nasabah\Entities;

use App\Nasabah\Entities\Traits\GetterTrait;
use App\Nasabah\Entities\Traits\SetterTrait;

class NPWP
{
	use SetterTrait, GetterTrait;
	
	protected $id;
	protected $nomor;
	protected $nama;
	protected $nik;
	protected $kpp;

	protected function __construct($id, $nomor, $nama, $nik, $kpp)
	{
		$this->id 				= $id;
		$this->nomor 			= $nomor;
		$this->nama 			= $nama;
		$this->nik 				= $nik;
		$this->kpp 				= $kpp;
	}

	public static function build($npwp)
	{	
		return new static($npwp['id'], $npwp['nomor'], $npwp['nama'], $npwp['nik'], $npwp['kpp']);
	}
		
	public function getAttributes()
	{
		return ['id' => $this->id, 'nomor' => $this->nomor, 'nama' => $this->nama, 'nik' => $this->nik, 'kpp' => $this->kpp];
	}
}