<?php

namespace App\Nasabah\ORM\Transformers;

use League\Fractal\TransformerAbstract;

class NasabahTransformer extends TransformerAbstract
{
	/**
	 * fungsi untuk transform data index template akta.
	 * 
	 * Perubahan ini mempengaruhi fungsi : ThunderTransformer@list_template_akta
	 * @param  	array $value
	 * @return 	array data //lebih jelas baca dokumentasi template index
	 * 
	 */
	public function transform(array $value)
	{
		$value['nomor_telepon']	= $value['mobile']['akun'];
		$value['email']			= $value['email']['akun'];
		$value['ktp']			= json_decode($value['ktp']['isi'], true);
		$value['npwp']			= json_decode($value['npwp']['isi'], true);
		$value['passport']		= json_decode($value['passport']['isi'], true);
		$value['sim']			= json_decode($value['sim']['isi'], true);

		$data	= \App\Nasabah\Entities\Nasabah::build($value);

	    return $data;
	}
}