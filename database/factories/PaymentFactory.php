<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            [
                'user_id' => '1',
                'name_card' => 'CV. Thahira',
                'metode' => $this->faker->creditCardType(),
                'number_rek' => $this->faker->creditCardNumber()
            ],
            [
                'user_id' => '2',
                'name_card' => 'User',
                'metode' => $this->faker->creditCardType(),
                'number_rek' => $this->faker->creditCardNumber()
            ],
            [
                'user_id' => '3',
                'name_card' => 'PT. Golden BOx',
                'metode' => $this->faker->creditCardType(),
                'number_rek' => $this->faker->creditCardNumber()
            ],
            [
                'user_id' => '4',
                'name_card' => 'PT> VODA',
                'metode' => $this->faker->creditCardType(),
                'number_rek' => $this->faker->creditCardNumber()
            ],
            [
                'user_id' => '5',
                'name_card' => 'PT. Aftec Makassar',
                'metode' => $this->faker->creditCardType(),
                'number_rek' => $this->faker->creditCardNumber()
            ],
            [
                'user_id' => '6',
                'name_card' => 'PT. Nachitape',
                'metode' => $this->faker->creditCardType(),
                'number_rek' => $this->faker->creditCardNumber()
            ],
            [
                'user_id' => '7',
                'name_card' => 'Toko sumber rezki',
                'metode' => $this->faker->creditCardType(),
                'number_rek' => $this->faker->creditCardNumber()
            ],
            [
                'user_id' => '8',
                'name_card' => 'Toko rayyan',
                'metode' => $this->faker->creditCardType(),
                'number_rek' => $this->faker->creditCardNumber()
            ],
            [
                'user_id' => '9',
                'name_card' => 'Toko muaffaq',
                'metode' => $this->faker->creditCardType(),
                'number_rek' => $this->faker->creditCardNumber()
            ],
            [
                'user_id' => '10',
                'name_card' => 'Toko.aswan',
                'metode' => $this->faker->creditCardType(),
                'number_rek' => $this->faker->creditCardNumber()
            ],
            [
                'user_id' => '11',
                'name_card' => 'Toko ifan',
                'metode' => $this->faker->creditCardType(),
                'number_rek' => $this->faker->creditCardNumber()
            ],
            [
                'user_id' => '12',
                'name_card' => 'BossPakcing',
                'metode' => $this->faker->creditCardType(),
                'number_rek' => $this->faker->creditCardNumber()
            ],
            [
                'user_id' => '13',
                'name_card' => 'Dangguan Hilbo Co.Ltd',
                'metode' => $this->faker->creditCardType(),
                'number_rek' => $this->faker->creditCardNumber()
            ],
            [
                'user_id' => '14',
                'name_card' => 'CV. Zam-Zam',
                'metode' => $this->faker->creditCardType(),
                'number_rek' => $this->faker->creditCardNumber()
            ],
        ];
    }
}
