<?php

namespace App\Nasabah\ORM;

use App\Nasabah\Repositories\InterfaceRepositoryNasabah;

use App\Nasabah\ORM\Models\NasabahModel;
use App\Nasabah\ORM\Models\KontakModel;
use App\Nasabah\ORM\Models\AlamatModel;
use App\Nasabah\ORM\Models\KartuIdentitasModel;

use App\Nasabah\Entities\Nasabah;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

use App\Nasabah\ORM\Transformers\NasabahTransformer;

class RepositoryNasabahEloquent implements InterfaceRepositoryNasabah 
{
	public function simpan(Nasabah $nasabah)
	{
		//1. simpan nasabah
		$nasabahmodel 			= NasabahModel::findornew($nasabah->id);
		$nasabahmodel->fill($nasabah->getAttributes());
		$nasabahmodel->save();
		
		//2. simpan ktp
		$ktpmodel 				= KartuIdentitasModel::findornew($nasabah->ktp->id);
		$ktpmodel->type 		= 'ktp';
		$ktpmodel->isi 			= json_encode($nasabah->ktp->getAttributes());
		$ktpmodel->nasabah_id	= $nasabahmodel->id;
		$ktpmodel->save();

		//3. simpan npwp
		$npwpmodel 				= KartuIdentitasModel::findornew($nasabah->npwp->id);
		$npwpmodel->type 		= 'npwp';
		$npwpmodel->isi 		= json_encode($nasabah->npwp->getAttributes());
		$npwpmodel->nasabah_id	= $nasabahmodel->id;
		$npwpmodel->save();

		//4. simpan passport
		$passportmodel 				= KartuIdentitasModel::findornew($nasabah->passport->id);
		$passportmodel->type 		= 'passport';
		$passportmodel->isi 		= json_encode($nasabah->passport->getAttributes());
		$passportmodel->nasabah_id	= $nasabahmodel->id;
		$passportmodel->save();

		//5. simpan sim
		$simmodel 				= KartuIdentitasModel::findornew($nasabah->sim->id);
		$simmodel->type 		= 'sim';
		$simmodel->isi 			= json_encode($nasabah->sim->getAttributes());
		$simmodel->nasabah_id	= $nasabahmodel->id;
		$simmodel->save();

		//6. simpan nomor telepon
		$phonemodel 			= KontakModel::where('nasabah_id', $nasabahmodel->id)->where('type', 'mobile')->first();
		if(!$phonemodel)
		{
			$phonemodel 		= new KontakModel;
		}

		$phonemodel->type 		= 'mobile';
		$phonemodel->akun 		= $nasabah->nomor_telepon;
		$phonemodel->nasabah_id	= $nasabahmodel->id;
		$phonemodel->save();

		//7. simpan email
		$emailmodel 			= KontakModel::where('nasabah_id', $nasabahmodel->id)->where('type', 'email')->first();
		if(!$emailmodel)
		{
			$emailmodel 		= new KontakModel;
		}

		$emailmodel->type 		= 'email';
		$emailmodel->akun 		= $nasabah->email;
		$emailmodel->nasabah_id	= $nasabahmodel->id;
		$emailmodel->save();

		//8. simpan alamat
		$addressmodel 				= AlamatModel::findornew($nasabah->alamat->id);
		$addressmodel->fill($nasabah->alamat->getAttributes());
		$addressmodel->nasabah_id	= $nasabahmodel->id;
		$addressmodel->save();

		return $nasabah;
	}

	public function semua()
	{
		//1. lihat semua data nasabah dari database
		$nasabah			= NasabahModel::with(['ktp', 'npwp', 'passport', 'sim', 'mobile', 'email', 'alamat'])->get()->toArray();

		//2. transform data ke array
		$fractal			= new Manager();
		$resource 			= new Collection($nasabah, new NasabahTransformer);

		return $fractal->createData($resource)->toArray()['data'];
	}

	public function hapus($id)
	{
		//1. lihat data nasabah dari database
		$nasabah			= NasabahModel::with(['ktp', 'npwp', 'passport', 'sim', 'mobile', 'email', 'alamat'])->id($id)->first();

		//2. transform data ke entity
		$fractal			= new Manager();

		$resource 			= new Collection([$nasabah->toArray()], new NasabahTransformer);

		$data 				= $fractal->createData($resource)->toArray()['data'];

		//3. hapus identitas
		$identitas 			= KartuIdentitasModel::nasabahid($nasabah->id)->delete();

		//4. hapus kontak
		$kontak 			= KontakModel::nasabahid($nasabah->id)->delete();

		//5. hapus alamat
		$alamat 			= AlamatModel::nasabahid($nasabah->id)->delete();

		//6. hapus nasabah
		$nasabah->delete();

		return $data[0];		
	}

	public function cariBerdasarkanNama($variable)
	{
		//1. lihat data nasabah dari database
		$nasabah			= NasabahModel::with(['ktp', 'npwp', 'passport', 'sim', 'mobile', 'email', 'alamat'])->nama($variable)->get()->toArray();

		//2. transform data ke entity
		$fractal			= new Manager();

		$resource 			= new Collection($nasabah, new NasabahTransformer);

		return $fractal->createData($resource)->toArray()['data'];
	}

	public function cariBerdasarkanID($variable)
	{
		//1. lihat data nasabah dari database
		$nasabah			= NasabahModel::with(['ktp', 'npwp', 'passport', 'sim', 'mobile', 'email', 'alamat'])->id($variable)->first()->toArray();

		//2. transform data ke entity
		$fractal			= new Manager();

		$resource 			= new Collection([$nasabah], new NasabahTransformer);

		return $fractal->createData($resource)->toArray()['data'][0];
	}
}