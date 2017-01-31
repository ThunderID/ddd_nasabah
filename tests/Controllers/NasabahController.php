<?php 

namespace App\Nasabah\tests\Controllers;

use Illuminate\Routing\Controller;

use App\Nasabah\CQRS\NasabahService;

class NasabahController extends Controller 
{
    /**
     * The order repository instance.
     */
    protected $nasabah;

    /**
     * Create a controller instance.
     *
     * @param  NasabahService  $nasabah
     * @return void
     */
    public function __construct(NasabahService $nasabah)
    {
        $this->nasabah      = $nasabah;
    }

    /**
     * lihat nasabah
     *
     * @return Response
     */
    public function index()
    {
        $nasabah        = $this->nasabah->semua();

        return view('nasabah', compact('nasabah'));
    }

    /**
     * lihat nasabah tertentu
     *
     * @return Response
     */
    public function show($id)
    {
        return $this->nasabah->cariBerdasarkanID($id);
    }

    /**
     * simpan data nasabah.
     *
     * @return Response
     */
    public function store()
    {
       $array   =   
        [
            'id'            => 1,
            'nama'          => 'Chelsy',
            'tanggal_lahir' => '11 August 1993',
            'jenis_kelamin' => 'wanita',
            'ktp'           => 
                [
                    'id'    => 1, 
                    'nik'   => '3573035108930004', 
                    'nama'  => 'Chelsy', 
                    'pekerjaan'         => 'Mahasiswi', 
                    'kewarganegaraan'   => 'WNI',
                    'masa_berlaku'      => '08-11-2017'
                ],
            'npwp'          => 
                [
                    'id'    => 2, 
                    'nomor' => '74.220.569.3-623.000', 
                    'nama'  => 'Chelsy', 
                    'nik'   => '3573035108930004', 
                    'kpp'   => 'KPP Pratama Malang Selatan'
                ],
            'passport'      =>
                [
                    'id'    => 3,
                    'nomor' => 'A8096555',
                    'nama'  => 'Chelsy',
                    'jenis' => 'Wisata',
                    'masa_berlaku'      => '08-11-2017'
                ],
            'sim'       =>
                [
                    'id'    => 4,
                    'nomor' => '930815250365',
                    'nama'  => 'Chelsy',
                    'jenis' => 'C',
                    'masa_berlaku'      => '08-11-2018'
                ],
            'nomor_telepon'     => '089654562911',
            'email'             => 'chelsymooy1108@gmail.com',
            'alamat'            => 
                [
                    'id'        => 1,
                    'alamat'    => 'Puri Cempaka Putih II AS 86',
                    'kota'      => 'Malang',
                    'provinsi'  => 'Jawa Timur',
                    'negara'    => 'Indonesia',
                    'kode_pos'  => '65135'                  
                ]
        ];
        
        return $this->nasabah->simpan($array);
    }

    /**
     * hapus nasabah
     *
     * @return Response
     */
    public function destroy($id)
    {
        return $this->nasabah->hapus($id);
    }
}