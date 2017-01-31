<?php

namespace App\Nasabah\Repositories;

use Illuminate\Support\Collection;

use App\Nasabah\Entities\Nasabah;

interface InterfaceRepositoryNasabah 
{
	/**
	 * @param Nasabah $nasabah
	 * @return mixed
	 */
	public function simpan(Nasabah $nasabah);

	public function semua();

	public function hapus($id);
	
	public function cariBerdasarkanID($variable);

	public function cariBerdasarkanNama($variable);
} 