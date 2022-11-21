<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;
class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */

    public function run()
    {
        Payment::insert([
            [
                'user_id' => '1',
                'name_card' => 'CV. Thahira',
                'metode' => "BANK BRI",
                'number_rek' => '011191827034501'
            ],
            [
                'user_id' => '2',
                'name_card' => 'User',
                'metode' => "BANK BRI",
                'number_rek' => '478284561548501'
            ],
            [
                'user_id' => '3',
                'name_card' => 'PT. Golden BOx',
                'metode' => "BANK DANAMON",
                'number_rek' => '034101000743303'
            ],
            [
                'user_id' => '4',
                'name_card' => 'PT. VODA',
                'metode' => "BANK BRI",
                'number_rek' => '335845655214567'
            ],
            [
                'user_id' => '5',
                'name_card' => 'PT. Aftec Makassar',
                'metode' => "BANK BRI",
                'number_rek' => '497847885455501'
            ],
            [
                'user_id' => '6',
                'name_card' => 'PT. Nachitape',
                'metode' => "BANK BRI",
                'number_rek' => '49778469542501'
            ],
            [
                'user_id' => '7',
                'name_card' => 'Toko sumber rezki',
                'metode' => "BANK BRI",
                'number_rek' => '47824841387501'
            ],
            [
                'user_id' => '8',
                'name_card' => 'Toko rayyan',
                'metode' => "BANK BRI",
                'number_rek' => '497894565123501'
            ],
            [
                'user_id' => '9',
                'name_card' => 'Toko muaffaq',
                'metode' => "BANK BRI",
                'number_rek' => '494561894567501'
            ],
            [
                'user_id' => '10',
                'name_card' => 'Toko.aswan',
                'metode' => "BANK BRI",
                'number_rek' => '0111819283768501'
            ],
            [
                'user_id' => '11',
                'name_card' => 'Toko ifan',
                'metode' => "BANK BRI",
                'number_rek' => '0111819283768501'
            ],
            [
                'user_id' => '12',
                'name_card' => 'BossPakcing',
                'metode' => "BANK BRI",
                'number_rek' => '0111819283768501'
            ],
            [
                'user_id' => '13',
                'name_card' => 'Dangguan Hilbo Co.Ltd',
                'metode' => "BANK BRI",
                'number_rek' => '0111819283768501'
            ],
            [
                'user_id' => '13',
                'name_card' => 'Dangguan Hilbo Co.Ltd',
                'metode' => "BANK BNI",
                'number_rek' => '7310252527'
            ],
            [
                'user_id' => '14',
                'name_card' => 'CV. Zam-Zam',
                'metode' => "BANK BRI",
                'number_rek' => '1800004293571'
            ],
            [
                'user_id' => '14',
                'name_card' => 'CV. Zam-Zam',
                'metode' => "BANK BNI",
                'number_rek' => '0238272088'
            ],
        ]);
    }
}
