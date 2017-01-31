<?php

namespace App\Nasabah\Entities;

use App\Nasabah\ValueObjects\MasaBerlaku;

use App\Nasabah\Entities\Traits\GetterTrait;
use App\Nasabah\Entities\Traits\SetterTrait;

class SIM
{
	use SetterTrait, GetterTrait;

	protected $id;
	protected $nomor;
	protected $nama;
	protected $jenis;
	protected $masa_berlaku;

	protected function __construct($id, $nomor, $nama, $jenis, MasaBerlaku $masa_berlaku)
	{
		$this->id 				= $id;
		$this->nomor 			= $nomor;
		$this->nama 			= $nama;
		$this->jenis 			= $jenis;
		$this->masa_berlaku 	= $masa_berlaku;
	}

	public static function build($sim)
	{	
		$masa_berlaku 			= new MasaBerlaku($sim['masa_berlaku']);
		
		return new static($sim['id'], $sim['nomor'], $sim['nama'], $sim['jenis'], $masa_berlaku);
	}
		
	public function getAttributes()
	{
		return ['id' => $this->id, 'nomor' => $this->nomor, 'nama' => $this->nama, 'jenis' => $this->jenis, 'masa_berlaku' => (string) $this->masa_berlaku];
	}
}