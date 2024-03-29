<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customers>
 */
use App\Models\Customers;
use App\Models\Communes;
use Illuminate\Support\Facades\Log;
class CustomersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Customers::class;
    public function definition(): array
    {

        $customerData = [
            'dni' => rand(10000000, 99999999),
            'id_reg' => $this->faker->numberBetween(1, 10),
            'id_com' => $this->faker->numberBetween(1, 10),
            'email' => $this->faker->unique()->safeEmail,
            'name' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'address' => $this->faker->address,
            'date_reg' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'status' => $this->faker->randomElement(['A', 'I', 'TRASH']),
        ];

        $communeExists = Communes::where('id_reg', $customerData['id_reg'])
            ->where('id_com', $customerData['id_com'])
            ->exists();
            echo "Para el presente registro es: ";
            echo $this->faker->numberBetween(1, 10).'\n\n';
            if(!$communeExists){

                echo "----------------------Comuna no existe-------------------------------";
                return [
                    'dni' => '',
                    'id_reg' => '',
                    'id_com' => '',
                    'email' => '',
                    'name' => '',
                    'lastname' => '',
                    'address' => '',
                    'date_reg' => '',
                    'status' => '',
                ];
            }else{

                return $customerData;
            }
    }
}
