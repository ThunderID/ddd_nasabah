<?php

namespace App\Nasabah\Entities;

use App\Nasabah\ValueObjects\MasaBerlaku;

use App\Nasabah\Entities\Traits\GetterTrait;
use App\Nasabah\Entities\Traits\SetterTrait;

class KTP
{
	use SetterTrait, GetterTrait;

	protected $id;
	protected $nik;
	protected $nama;
	protected $pekerjaan;
	protected $kewarganegaraan;
	protected $masa_berlaku;

	protected function __construct($id, $nik, $nama, $pekerjaan, $kewarganegaraan, MasaBerlaku $masa_berlaku)
	{
		$this->id 				= $id;
		$this->nik 				= $nik;
		$this->nama 			= $nama;
		$this->pekerjaan 		= $pekerjaan;
		$this->kewarganegaraan 	= $kewarganegaraan;
		$this->masa_berlaku 	= $masa_berlaku;
	}

	public static function build($ktp)
	{	
		$masa_berlaku 			= new MasaBerlaku($ktp['masa_berlaku']);

		return new static($ktp['id'], $ktp['nik'], $ktp['nama'], $ktp['pekerjaan'], $ktp['kewarganegaraan'], $masa_berlaku);
	}
		
	public function getAttributes()
	{
		return ['id' => $this->id, 'nik' => $this->nik, 'nama' => $this->nama, 'pekerjaan' => $this->pekerjaan, 'kewarganegaraan' => $this->kewarganegaraan, 'masa_berlaku' => (string) $this->masa_berlaku];
	}
}