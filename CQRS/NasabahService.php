<?php

namespace App\Nasabah\CQRS;

use App\Nasabah\Repositories\InterfaceRepositoryNasabah;

class NasabahService 
{
	public function __construct(InterfaceRepositoryNasabah $repository)
	{
		$this->repository 	= $repository;
	}

	public function semua()
	{
		return $this->repository->semua();
	}

	public function cariBerdasarkanID($variable)
	{
		return $this->repository->cariBerdasarkanID($variable);
	}

	public function cariBerdasarkanNama($variable)
	{
		return $this->repository->cariBerdasarkanNama($variable);
	}

	public function simpan($nasabah)
	{
		$entities 	= \App\Nasabah\Entities\Nasabah::build($nasabah);

		return $this->repository->simpan($entities);
	}

	public function hapus($id)
	{
		return $this->repository->hapus($id);
	}
}