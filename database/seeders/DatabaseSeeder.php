<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use App\Models\Stock;
use App\Models\Bawaan;
use App\Models\Customer;
use App\Models\BahanBaku;
use App\Models\BahanBakuAir;
use App\Models\Suppliers;
use App\Models\Persediaan;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\BawaanBahanBakuAir;
use App\Models\Payment;
use App\Models\StockBahanBakuAirMineral;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $team = [
        //     [
        //         'name' => "Admin's Team",
        //         'user_id' => '1',
        //         'personal_team' => '1'
        //     ],

        //     [
        //         'name' => "wawan's Team",
        //         'user_id' => '2',
        //         'personal_team' => '2'
        //     ],
        //     [
        //         'name' => "PT. Golden Box's Team",
        //         'user_id' => '3',
        //         'personal_team' => '3'
        //     ],
        //     [
        //         'name' => "PT. Voda's Team",
        //         'user_id' => '4',
        //         'personal_team' => '4'
        //     ],
        //     [
        //         'name' => "PT. Aftec Makassar's Team",
        //         'user_id' => '5',
        //         'personal_team' => '5'
        //     ],
        //     [
        //         'name' => "PT. Nachitape's Team",
        //         'user_id' => '6',
        //         'personal_team' => '6'
        //     ],
        //     [
        //         'name' => "PT. Nachitape's Team",
        //         'user_id' => '7',
        //         'personal_team' => '7'
        //     ],
        //     [
        //         'name' => "PT. Nachitape's Team",
        //         'user_id' => '8',
        //         'personal_team' => '8'
        //     ],
        //     [
        //         'name' => "PT. Nachitape's Team",
        //         'user_id' => '9',
        //         'personal_team' => '9'
        //     ],
        //     [
        //         'name' => "PT. Nachitape's Team",
        //         'user_id' => '10',
        //         'personal_team' => '10'
        //     ],
        //     [
        //         'name' => "PT. Nachitape's Team",
        //         'user_id' => '11',
        //         'personal_team' => '11'
        //     ],
        //     [
        //         'name' => "BossPacking's Team",
        //         'user_id' => '12',
        //         'personal_team' => '12'
        //     ],
        //     [
        //         'name' => "DonghuanHilbo Co.Ltd's Team",
        //         'user_id' => '13',
        //         'personal_team' => '13'
        //     ],
        //     [
        //         'name' => "CV. Zam-Zam's Team",
        //         'user_id' => '14',
        //         'personal_team' => '14'
        //     ],
        // ];
        // Team::insert($team);
        $user = [
            [
                'name' => 'Admin',
                'email' => 'Admin@gmail.com',
                'password' => '$2y$10$FozrqVhN9DqexMiduZ2IRuzwb8YLvwe3AylrgLsMXKRV8hg/JzdFC',
                'current_team_id' => '1',
                'role_id' => '999',
                'phone' => '6281524269051',
                'alamat' => 'Bulukumba',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'wawan',
                'email' => 'wawan@gmail.com',
                'password' => '$2y$10$FozrqVhN9DqexMiduZ2IRuzwb8YLvwe3AylrgLsMXKRV8hg/JzdFC',
                'current_team_id' => '2',
                'role_id' => '111',
                'phone' => '6281524269051',
                'alamat' => 'Bulukumba',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'PT. Golden Box',
                'email' => 'PT.GoldenBox@gmail.com',
                'password' => '$2y$10$FozrqVhN9DqexMiduZ2IRuzwb8YLvwe3AylrgLsMXKRV8hg/JzdFC',
                'current_team_id' => '3',
                'role_id' => '112',
                'phone' => '6281524269051',
                'alamat' => 'Lebaniwaras, Kec. Wringinanom, Kabupaten Gresik, Jawa Timur 61176',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'PT. Voda',
                'email' => 'PT.Voda@gmail.com',
                'password' => '$2y$10$FozrqVhN9DqexMiduZ2IRuzwb8YLvwe3AylrgLsMXKRV8hg/JzdFC',
                'current_team_id' => '4',
                'role_id' => '112',
                'phone' => '(031) 8913458',
                'alamat' => 'Dusun Sruni, Sruni, Kec. Gedangan, Kabupaten Sidoarjo, Jawa Timur 61254',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'PT. Aftec Makassar',
                'email' => 'PT.AftecMakassar@gmail.com',
                'password' => '$2y$10$FozrqVhN9DqexMiduZ2IRuzwb8YLvwe3AylrgLsMXKRV8hg/JzdFC',
                'current_team_id' => '5',
                'role_id' => '112',
                'phone' => '6281524269051',
                'alamat' => ' Kec. Biringkanaya, Kota Makassar, Sulawesi Selatan 90242',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'PT. Nachitape',
                'email' => 'PT.Nachitape@gmail.com',
                'password' => '$2y$10$FozrqVhN9DqexMiduZ2IRuzwb8YLvwe3AylrgLsMXKRV8hg/JzdFC',
                'current_team_id' => '6',
                'role_id' => '112',
                'phone' => '6281524269051',
                'alamat' => 'Kec. Tegalsari, Kota SBY, Jawa Timur 60264',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Toko sumber rezki',
                'email' => 'Toko.sumber.rezki@gmail.com',
                'password' => '$2y$10$FozrqVhN9DqexMiduZ2IRuzwb8YLvwe3AylrgLsMXKRV8hg/JzdFC',
                'current_team_id' => '7',
                'role_id' => '111',
                'phone' => '6281524269051',
                'alamat' => 'Ela-Ela',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Toko rayyan',
                'email' => 'Toko.rayyane@gmail.com',
                'password' => '$2y$10$FozrqVhN9DqexMiduZ2IRuzwb8YLvwe3AylrgLsMXKRV8hg/JzdFC',
                'current_team_id' => '8',
                'role_id' => '111',
                'phone' => '6281524269051',
                'alamat' => 'Jl. Sultan Dg Raja, Ponre',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Toko muaffaq',
                'email' => 'Toko.muaffaq@gmail.com',
                'password' => '$2y$10$FozrqVhN9DqexMiduZ2IRuzwb8YLvwe3AylrgLsMXKRV8hg/JzdFC',
                'current_team_id' => '9',
                'role_id' => '111',
                'phone' => '6281524269051',
                'alamat' => 'Jl. Lanto Dg Pasewang',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Toko.aswan',
                'email' => 'Toko.aswane@gmail.com',
                'password' => '$2y$10$FozrqVhN9DqexMiduZ2IRuzwb8YLvwe3AylrgLsMXKRV8hg/JzdFC',
                'current_team_id' => '10',
                'role_id' => '111',
                'phone' => '6281524269051',
                'alamat' => 'Paenre Lompoe Gantarang',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Toko ifan',
                'email' => 'Toko.ifan@gmail.com',
                'password' => '$2y$10$FozrqVhN9DqexMiduZ2IRuzwb8YLvwe3AylrgLsMXKRV8hg/JzdFC',
                'current_team_id' => '11',
                'role_id' => '111',
                'phone' => '6281524269051',
                'alamat' => 'BontoMana',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'BossPakcing',
                'email' => 'BossPakcing@gmail.com',
                'password' => '$2y$10$FozrqVhN9DqexMiduZ2IRuzwb8YLvwe3AylrgLsMXKRV8hg/JzdFC',
                'current_team_id' => '12',
                'role_id' => '112',
                'phone' => '6281524269051',
                'alamat' => 'Jl. Karang Asem Gardu PLN No.18, Ploso, Kec. Tambaksari, Kota SBY, Jawa Timur 60133',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Dongguan Hilbo Magnesium Alloy Material Co.,Ltd',
                'email' => 'Donghua.Gilbo.Co.Ltd@gmail.com',
                'password' => '$2y$10$FozrqVhN9DqexMiduZ2IRuzwb8YLvwe3AylrgLsMXKRV8hg/JzdFC',
                'current_team_id' => '13',
                'role_id' => '112',
                'phone' => '+86 13714725615',
                'alamat' => "No.1 West street Zhongnan North Road,Shang sha Community Chang'An Town,Dong guan City, China",
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'CV. Zam-Zam',
                'email' => 'CV. Zam-Zam@gmail.com',
                'password' => '$2y$10$FozrqVhN9DqexMiduZ2IRuzwb8YLvwe3AylrgLsMXKRV8hg/JzdFC',
                'current_team_id' => '14',
                'role_id' => '112',
                'phone' => '08135047073',
                'alamat' => 'Jl. Wonosari, Kalimantan Timur',
                'remember_token' => Str::random(10),
            ],
        ];
        // User::insert($user);
        User::insert($user);
        // Team::insert($team);
        $supplier = [
            [
                'supplier' => 'PT. Golden Box',
                'user_id' => '3',

            ],
            [
                'supplier' => 'PT. Voda',
                'user_id' => '4'
                      ],
            [
                'supplier' => 'PT. Aftec Makassar',
                'user_id' => '5'           ],
            [
                'supplier' => 'PT. Nachitape',
                'user_id' => '6'          ],
            [
                'supplier' => 'BossPacking',
                'user_id' => '12'
            ],
            [
                'supplier' => 'Donghuan Hilbo Co.Ltd',
                'user_id' => '13'
            ],
            [
                'supplier' => 'CV. Zam-Zam',
                'user_id' => '14'
            ],
        ];
        Suppliers::insert($supplier);
        $cutomer = [
            [
                'customer' => 'Toko sumber rezki',
                'user_id' => '7',

            ],
            [
                'customer' => 'Toko rayyan',
                'user_id' => '8',

            ],
            [
                'customer' => 'Toko muaffaq',
                'user_id' => '9'
            ],
            [
                'customer' => 'Toko aswanr',
                'user_id' => '10'
            ],
            [
                'customer' => 'Toko ifan',
                'user_id' => '11'
            ],
        ];
        Customer::insert($cutomer);
        $stock = [
            [
                'bawaan_id' => '1',

                'jumlah_stock' => '19000',
                'satuan' => 'Buah',
                'tgl_stock' => '2020-05-14',
            ],
            [
                'bawaan_id' => '2',
                'jumlah_stock' => '18988',
                'satuan' => 'Pcs',
                'tgl_stock' => '2020-05-14',
            ],
            [
                'bawaan_id' => '3',

                'jumlah_stock' => '19201',
                'satuan' => 'Buah',
                'tgl_stock' => '2020-05-14',
            ],
            [
                'bawaan_id' => '4',
                'jumlah_stock' => '17281',
                'satuan' => 'Pcs',
                'tgl_stock' => '2020-05-14',
            ],
        ];
        // Stock::insert($stock);

        $dfStock = [
        ['gambar' => "kardus.png", 'bahan_baku' => 'Dus', "bbs" => '1', 'maxbb' => '20', 'volume' => '40'],
            ['gambar' => "pipet.png", 'bahan_baku' => 'Pipet/Sedotan', "bbs" => '50', 'maxbb' => '16', 'volume' => '50'],
            ['gambar' => "cup.png", 'bahan_baku' => 'Cup/Gelas', "bbs" => '48', 'maxbb' => '15', 'volume' => '3350'],
            ['gambar' => "lid_cup.png", 'bahan_baku' => 'Lid Cup/Penutup', "bbs" => '48', 'maxbb' => '13', 'volume' => '232'],
        ];
        Bawaan::insert($dfStock);
        $BBBA = [
            ['gambar' => "karbon_aktif.jpg", 'bahan_baku' => 'Karbon Aktif'],
            ['gambar' => "pasir_aktif.jpg", 'bahan_baku' => 'Pasir Aktif',],
            ['gambar' => "pasir_silica.jpg", 'bahan_baku' => 'Pasir Silica',],
            ['gambar' => "magnesium.webp", 'bahan_baku' => 'Magnesium Bubuk',],
            ['gambar' => "post_carbon_filter.jpg", 'bahan_baku' => 'Post Carbon Filter',],
        ];
        BawaanBahanBakuAir::insert($BBBA);
        $persediaan = [
            [
                'bahan_baku' => '1',
                'default_stock' => '20',
            ],
            [
                'bahan_baku' => '2',
                'default_stock' => '20',
            ],
            [
                'bahan_baku' => '3',
                'default_stock' => '20',
            ],
            [
                'bahan_baku' => '4',
                'default_stock' => '20',
            ],
            [
                'bahan_baku' => '5',
                'default_stock' => '20',
            ],
            [
                'bahan_baku' => '6',
                'default_stock' => '20',
            ],
            [
                'bahan_baku' => '7',
                'default_stock' => '20',
            ],
        ];
        Persediaan::insert($persediaan);
        $bahan = [
            [
                'gambar' => 'kardus.png',
                'bawaan_id' => '1',
                'isi' => '24',
                'satuan' => 'Dus',
                'harga' => '3200',
                'jumlah_stock'=> '23919',
                'suppliers_id' => '1'
            ],
            [
                'gambar' => 'pipet.png',
                'bawaan_id' => '2',
                'isi' => '50',
                'satuan' => 'Dus',
                'harga' => '70000',
                'jumlah_stock'=> '1387319',
                'suppliers_id' => '3'
            ],

            [
                'gambar' => 'cup.png',
                'bawaan_id' => '3',
                'isi' => '232',
                'satuan' => 'Dus',
                'harga' => '375000',
                'jumlah_stock'=> '193190',
                'suppliers_id' => '3'
            ],
            [
                'gambar' => 'lidcup.png',
                'bawaan_id' => '4',
                'isi' => '3350',
                'satuan' => 'Dus',
                'harga' => '225000',
                'jumlah_stock'=> '91829',
                'suppliers_id' => '2'
            ],

        ];
        BahanBaku::insert($bahan);
        StockBahanBakuAirMineral::insert([

            [
                'bahanbaku_air_id' => '1',
                'jumlah_stock' => '913901',
                'satuan' => 'Kg',
                'tgl_stock' => '2020-05-14',
            ],
            [
                'bahanbaku_air_id' => '2',
                'jumlah_stock' => '31998',
                'satuan' => 'Kg',
                'tgl_stock' => '2020-05-14',
            ],
            [
                'bahanbaku_air_id' => '3',
                'jumlah_stock' => '130130',
                'satuan' => 'Kg',
                'tgl_stock' => '2020-05-14',
            ],
            [
                'bahanbaku_air_id' => '4',
                'jumlah_stock' => '1083100',
                'satuan' => 'Kg',
                'tgl_stock' => '2020-05-14',
            ],
            [
                'bahanbaku_air_id' => '5',
                'jumlah_stock' => '794791',
                'satuan' => 'Buah',
                'tgl_stock' => '2020-05-14',
            ],
        ]);
        $bahanair = [
            [
                'gambar' => 'karbonaktif.jpg',
                'bahanbaku_air_id' => '1',
                // 'isi' => '24',
                'satuan' => 'Kg',
                'harga' => '25000',
                'jumlah_stock'=> '2000',
                'suppliers_id' => '5'
            ],
            [
                'gambar' => 'pasiraktif.jpg',
                'bahanbaku_air_id' => '2',
                // 'isi' => '30',
                'satuan' => 'Kg',
                'harga' => '10000',
                'jumlah_stock'=> '2000',
                'suppliers_id' => '5'
            ],
            [
                'gambar' => 'pasirsilica.jpg',
                'bahanbaku_air_id' => '3',
                // 'isi' => '29',
                'satuan' => 'Kg',
                'harga' => '10000',
                'jumlah_stock'=> '2000',
                'suppliers_id' => '5'
            ],
            [
                'gambar' => 'magnesium.webp',
                'bahanbaku_air_id' => '4',
                // 'isi' => '80',
                'satuan' => 'Kg',
                'harga' => '19000',
                'jumlah_stock'=> '2000',
                'suppliers_id' => '6'
            ],
            [
                'gambar' => 'postcarbonfilter.jpg',
                'bahanbaku_air_id' => '5',
                // 'isi' => '80',
                'satuan' => 'Buah',
                'harga' => '16000',
                'jumlah_stock'=> '2000',
                'suppliers_id' => '7'
            ],
        ];
        BahanBakuAir::insert($bahanair);
       $this->call([
        ProdukSeeder::class,
        PaymentSeeder::class,
        BahanBakuSeeder::class,
        BarangMasukSeeder::class,
        BarangMasukAirSeeder::class,
       ]);
        // Payment::factory()->insert();
    }
}
