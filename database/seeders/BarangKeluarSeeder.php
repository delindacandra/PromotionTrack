<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_barangKeluar' => 1,
                'id_fungsi' => 4,
                'id_sa' => 5,
                'tanggal_barangKeluar' => '2024/09/14',
                'keperluan' => '-',
                'keterangan' => 'SA NTB',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 2,
                'id_fungsi' => 4,
                'id_sa' => 5,
                'tanggal_barangKeluar' => '2024/09/14',
                'keperluan' => 'M-',
                'keterangan' => 'SA NTB',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 3,
                'id_fungsi' => 4,
                'id_sa' => 5,
                'tanggal_barangKeluar' => '2024/09/14',
                'keperluan' => 'M-',
                'keterangan' => 'SA NTB',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 4,
                'id_fungsi' => 4,
                'id_sa' => 5,
                'tanggal_barangKeluar' => '2024/09/14',
                'keperluan' => '-',
                'keterangan' => 'SA NTB',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 5,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/09/19',
                'keperluan' => '-',
                'keterangan' => '',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 6,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/09/19',
                'keperluan' => '-',
                'keterangan' => 'Mandalika',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 7,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/09/19',
                'keperluan' => '-',
                'keterangan' => 'Comrel',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 8,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/09/25',
                'keperluan' => '-',
                'keterangan' => 'CS Retail Sales',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 9,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/10/03',
                'keperluan' => '-',
                'keterangan' => 'SBM Fuel 1 Surabaya',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 10,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/10/07',
                'keperluan' => '-',
                'keterangan' => 'Untuk Pak GM',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 11,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/10/11',
                'keperluan' => '-',
                'keterangan' => 'Untuk Pejabat BPJS',
                'id_permintaan' => null
            ], 
            [
                'id_barangKeluar' => 12,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/10/12',
                'keperluan' => '-',
                'keterangan' => 'Kepentingan HC',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 13,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/10/12',
                'keperluan' => '-',
                'keterangan' => 'Open booth',
                'id_permintaan' => null
            ], 
            [
                'id_barangKeluar' => 14,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/10/14',
                'keperluan' => '-',
                'keterangan' => 'Keperluan fungsi finance',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 15,
                'id_fungsi' => 4,
                'id_sa' => 2,
                'tanggal_barangKeluar' => '2024/10/14',
                'keperluan' => '-',
                'keterangan' => 'SA Malang',
                'id_permintaan' => null
            ], 
            [
                'id_barangKeluar' => 16,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/10/15',
                'keperluan' => '-',
                'keterangan' => 'Pak Nando - PWP',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 17,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/10/24',
                'keperluan' => '-',
                'keterangan' => 'Sosialisasi program intensifikasi pertashop',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 18,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/10/29',
                'keperluan' => '-',
                'keterangan' => 'Pertamina Goes to Campus',
                'id_permintaan' => null
            ], 
            [
                'id_barangKeluar' => 19,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/10/30',
                'keperluan' => '-',
                'keterangan' => 'Pertamina Goes to Campus',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 20,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/11/05',
                'keperluan' => '-',
                'keterangan' => 'SA Surabaya - SBM 1',
                'id_permintaan' => null
            ], 
            [
                'id_barangKeluar' => 21,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/11/11',
                'keperluan' => '-',
                'keterangan' => 'SBM Madura',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 22,
                'id_fungsi' => 4,
                'id_sa' => 2,
                'tanggal_barangKeluar' => '2024/11/19',
                'keperluan' => '-',
                'keterangan' => 'Keperluan SA Malang',
                'id_permintaan' => null
            ], 
            [
                'id_barangKeluar' => 23,
                'id_fungsi' => 4,
                'id_sa' => 2,
                'tanggal_barangKeluar' => '2024/11/21',
                'keperluan' => '-',
                'keterangan' => 'Keperluan FGD bersama dinas ESDM Provinsi Jatim',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 24,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/11/23',
                'keperluan' => '-',
                'keterangan' => 'Kegiatan Session of Drive di Graha Fair Ground',
                'id_permintaan' => null
            ], 
            [
                'id_barangKeluar' => 25,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/12/05',
                'keperluan' => '-',
                'keterangan' => 'City rally Surabaya',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 26,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/12/05',
                'keperluan' => '-',
                'keterangan' => 'Pertamina Rans Carnival Malang 2024',
                'id_permintaan' => null
            ], 
            [
                'id_barangKeluar' => 27,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/12/08',
                'keperluan' => '-',
                'keterangan' => 'Pertamina Rans Carnival Malang 2024',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 28,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/12/11',
                'keperluan' => '-',
                'keterangan' => 'PWP Acara Rutinan',
                'id_permintaan' => null
            ], 
            [
                'id_barangKeluar' => 29,
                'id_fungsi' => 4,
                'id_sa' => 6,
                'tanggal_barangKeluar' => '2024/12/13',
                'keperluan' => '-',
                'keterangan' => 'Kunjungan Direktur Pemasaran Regional',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 30,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/12/13',
                'keperluan' => '-',
                'keterangan' => 'Satgas Naru 2024',
                'id_permintaan' => null
            ], 
            [
                'id_barangKeluar' => 31,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/12/13',
                'keperluan' => '-',
                'keterangan' => 'Support acara SPPSN',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 32,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2024/12/17',
                'keperluan' => '-',
                'keterangan' => 'Acara sosialisasi bersama peternakan tuban',
                'id_permintaan' => null
            ]
        ];
        DB::table('barang_keluar')->insert($data);
    }
}
