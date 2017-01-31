<?php

namespace App\Nasabah\Entities;

use Carbon\Carbon;
use App\Nasabah\ValueObjects\Email;

use App\Nasabah\Entities\Traits\GetterTrait;
use App\Nasabah\Entities\Traits\SetterTrait;

class Nasabah 
{
	use SetterTrait, GetterTrait;

	protected $id;
	protected $nama;
	protected $tanggal_lahir;
	protected $jenis_kelamin;
	protected $npwp;
	protected $ktp;
	protected $passport;
	protected $sim;
	protected $nomor_telepon;
	protected $email;
	protected $alamat;

	protected function __construct($id, $nama, Carbon $tanggal_lahir, $jenis_kelamin, NPWP $npwp, KTP $ktp, Passport $passport, SIM $sim, $nomor_telepon, Email $email, Alamat $alamat)
	{
		$this->id 				= $id;
		$this->nama 			= $nama;
		$this->tanggal_lahir 	= $tanggal_lahir;
		$this->jenis_kelamin 	= $jenis_kelamin;
		$this->npwp 			= $npwp;
		$this->ktp 				= $ktp;
		$this->passport 		= $passport;
		$this->sim 				= $sim;
		$this->nomor_telepon 	= $nomor_telepon;
		$this->email 			= $email;
		$this->alamat 			= $alamat;
	}

	public static function build($nasabah)
	{	
		$tanggal_lahir 			= Carbon::parse($nasabah['tanggal_lahir']);
		$npwp 					= NPWP::build($nasabah['npwp']);
		$ktp 					= KTP::build($nasabah['ktp']);
		$passport 				= Passport::build($nasabah['passport']);
		$sim 					= SIM::build($nasabah['sim']);
		$email 					= new Email($nasabah['email']);
		$alamat 				= Alamat::build($nasabah['alamat']);

		return new static($nasabah['id'], $nasabah['nama'], $tanggal_lahir, $nasabah['jenis_kelamin'], $npwp, $ktp, $passport, $sim, $nasabah['nomor_telepon'], $email, $alamat);
	}
		
	public function getAttributes()
	{
		return ['id' => $this->id, 'nama' => $this->nama, 'tanggal_lahir' => $this->tanggal_lahir->format('Y-m-d'), 'jenis_kelamin' => $this->jenis_kelamin, 'npwp' => $this->npwp->getAttributes(), 'ktp' => $this->ktp->getAttributes(), 'passport' => $this->passport->getAttributes(), 'sim' => $this->sim->getAttributes(), 'nomor_telepon' => $this->nomor_telepon, 'email' => (string) $this->email, 'alamat' => $this->alamat->getAttributes()];
	}

	public function __toString()
    {
        return json_encode($this->getAttributes());
    }
}