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
                'id_barang_keluar' => 1,
                'id_fungsi' => 4,
                'id_sa' => 5,
                'tanggal_barang_keluar' => '2024/09/14',
                'keperluan' => '-',
                'keterangan' => 'SA NTB',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 2,
                'id_fungsi' => 4,
                'id_sa' => 5,
                'tanggal_barang_keluar' => '2024/09/14',
                'keperluan' => 'M-',
                'keterangan' => 'SA NTB',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 3,
                'id_fungsi' => 4,
                'id_sa' => 5,
                'tanggal_barang_keluar' => '2024/09/14',
                'keperluan' => 'M-',
                'keterangan' => 'SA NTB',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 4,
                'id_fungsi' => 4,
                'id_sa' => 5,
                'tanggal_barang_keluar' => '2024/09/14',
                'keperluan' => '-',
                'keterangan' => 'SA NTB',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 5,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/09/19',
                'keperluan' => '-',
                'keterangan' => 'Mandalika',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 6,
                'id_fungsi' => 13,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/09/19',
                'keperluan' => '-',
                'keterangan' => 'Comrel',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 7,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/09/19',
                'keperluan' => '-',
                'keterangan' => 'CS Retail Sales',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 8,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/09/25',
                'keperluan' => '-',
                'keterangan' => 'SBM Fuel 1 Surabaya',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 9,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/10/03',
                'keperluan' => '-',
                'keterangan' => 'Untuk Pak GM',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 10,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/10/07',
                'keperluan' => '-',
                'keterangan' => 'Untuk Pejabat BPJS',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 11,
                'id_fungsi' => 11,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/10/11',
                'keperluan' => '-',
                'keterangan' => 'Kepentingan HC',
                'id_permintaan' => null
            ], 
            [
                'id_barang_keluar' => 12,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/10/12',
                'keperluan' => '-',
                'keterangan' => 'Open booth Inmar - vasa hotel',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 13,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/10/12',
                'keperluan' => '-',
                'keterangan' => 'Open booth delta plaza',
                'id_permintaan' => null
            ], 
            [
                'id_barang_keluar' => 14,
                'id_fungsi' => 10,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/10/14',
                'keperluan' => '-',
                'keterangan' => 'Keperluan fungsi finance',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 15,
                'id_fungsi' => 2,
                'id_sa' => 2,
                'tanggal_barang_keluar' => '2024/10/14',
                'keperluan' => '-',
                'keterangan' => 'SA Malang',
                'id_permintaan' => null
            ], 
            [
                'id_barang_keluar' => 16,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/10/15',
                'keperluan' => '-',
                'keterangan' => 'Pak Nando - PWP',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 17,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/10/24',
                'keperluan' => '-',
                'keterangan' => 'Sosialisasi program intensifikasi pertashop',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 18,
                'id_fungsi' => 13,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/10/29',
                'keperluan' => '-',
                'keterangan' => 'Pertamina Goes to Campus',
                'id_permintaan' => null
            ], 
            [
                'id_barang_keluar' => 19,
                'id_fungsi' => 13,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/10/30',
                'keperluan' => '-',
                'keterangan' => 'Pertamina Goes to Campus',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 20,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/11/05',
                'keperluan' => '-',
                'keterangan' => 'SA Surabaya - SBM 1',
                'id_permintaan' => null
            ], 
            [
                'id_barang_keluar' => 21,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/11/11',
                'keperluan' => '-',
                'keterangan' => 'SBM Madura',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 22,
                'id_fungsi' => 4,
                'id_sa' => 2,
                'tanggal_barang_keluar' => '2024/11/19',
                'keperluan' => '-',
                'keterangan' => 'Keperluan SA Malang',
                'id_permintaan' => null
            ], 
            [
                'id_barang_keluar' => 23,
                'id_fungsi' => 4,
                'id_sa' => 2,
                'tanggal_barang_keluar' => '2024/11/21',
                'keperluan' => '-',
                'keterangan' => 'Keperluan FGD bersama dinas ESDM Provinsi Jatim',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 24,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/11/23',
                'keperluan' => '-',
                'keterangan' => 'Kegiatan Session of Drive di Graha Fair Ground',
                'id_permintaan' => null
            ], 
            [
                'id_barang_keluar' => 25,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/12/05',
                'keperluan' => '-',
                'keterangan' => 'City rally Surabaya',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 26,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/12/05',
                'keperluan' => '-',
                'keterangan' => 'Pertamina Rans Carnival Malang 2024',
                'id_permintaan' => null
            ], 
            [
                'id_barang_keluar' => 27,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/12/08',
                'keperluan' => '-',
                'keterangan' => 'Pertamina Rans Carnival Malang 2024',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 28,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/12/11',
                'keperluan' => '-',
                'keterangan' => 'PWP Acara Rutinan',
                'id_permintaan' => null
            ], 
            [
                'id_barang_keluar' => 29,
                'id_fungsi' => 4,
                'id_sa' => 6,
                'tanggal_barang_keluar' => '2024/12/13',
                'keperluan' => '-',
                'keterangan' => 'Kunjungan Direktur Pemasaran Regional',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 30,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/12/13',
                'keperluan' => '-',
                'keterangan' => 'Satgas Naru 2024',
                'id_permintaan' => null
            ], 
            [
                'id_barang_keluar' => 31,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/12/13',
                'keperluan' => '-',
                'keterangan' => 'Support acara SPPSN',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 32,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/12/17',
                'keperluan' => '-',
                'keterangan' => 'Acara sosialisasi bersama peternakan tuban',
                'id_permintaan' => null
            ], 
            // =====
            [
                'id_barang_keluar' => 33,
                'id_fungsi' => 13,
                'id_sa' => 6,
                'tanggal_barang_keluar' => '2024/12/17',
                'keperluan' => '-',
                'keterangan' => 'Support kegiatan comrell di kupang NTT',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 34,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/12/18',
                'keperluan' => '-',
                'keterangan' => 'Satgas natu 2024',
                'id_permintaan' => null
            ], 
            [
                'id_barang_keluar' => 35,
                'id_fungsi' => 4,
                'id_sa' => 4,
                'tanggal_barang_keluar' => '2024/12/22',
                'keperluan' => '-',
                'keterangan' => 'Satgas natu 2024',
                'id_permintaan' => null
            ], 
            [
                'id_barang_keluar' => 36,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/12/22',
                'keperluan' => '-',
                'keterangan' => 'Kepada SBM Imam Bukhori untuk Satgas Naru 2024',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 37,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/12/22',
                'keperluan' => '-',
                'keterangan' => 'Satgas Naru 2024',
                'id_permintaan' => null
            ], 
            [
                'id_barang_keluar' => 38,
                'id_fungsi' => 4,
                'id_sa' => 2,
                'tanggal_barang_keluar' => '2024/12/22',
                'keperluan' => '-',
                'keterangan' => 'Kepada SBM Banyuwangi - Salman untuk Satgas Naru 2024',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 39,
                'id_fungsi' => 4,
                'id_sa' => 3,
                'tanggal_barang_keluar' => '2024/12/26',
                'keperluan' => '-',
                'keterangan' => 'Kepada SBM Madiun - Tsaqif Untuk Satgas Naru 2024',
                'id_permintaan' => null
            ], 
            [
                'id_barang_keluar' => 40,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/12/26',
                'keperluan' => '-',
                'keterangan' => 'Satgas Naru 2024 - Kunjungan direktur pemasaran',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 41,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2024/12/31',
                'keperluan' => '-',
                'keterangan' => 'Support acara agen NPSO di DBL - Angga Dexora',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 42,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2025/01/02',
                'keperluan' => '-',
                'keterangan' => 'Bagi-bagi merchandise',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 43,
                'id_fungsi' => 12,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2025/01/08',
                'keperluan' => '-',
                'keterangan' => 'Support acara di Bali',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 44,
                'id_fungsi' => 7,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2025/01/09',
                'keperluan' => '-',
                'keterangan' => 'Support acara HSSE',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 45,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2025/01/18',
                'keperluan' => '-',
                'keterangan' => 'Proliga Malang',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 46,
                'id_fungsi' => 7,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2025/01/30',
                'keperluan' => '-',
                'keterangan' => 'Support acara pelatihan K3 HSSE',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 47,
                'id_fungsi' => 5,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2025/02/03',
                'keperluan' => '-',
                'keterangan' => 'Support kegiatan fungsi S&D',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 48,
                'id_fungsi' => 4,
                'id_sa' => 5,
                'tanggal_barang_keluar' => '2025/02/06',
                'keperluan' => '-',
                'keterangan' => 'Support kegiatan kerjasama SA NTB - Jorgix dengan eksternal',
                'id_permintaan' => null
            ],
            [
                'id_barang_keluar' => 49,
                'id_fungsi' => 9,
                'id_sa' => 1,
                'tanggal_barang_keluar' => '2025/02/13',
                'keperluan' => '-',
                'keterangan' => 'HUT PPN 2025',
                'id_permintaan' => null
            ],
        ];
        DB::table('barang_keluar')->insert($data);
    }
}
