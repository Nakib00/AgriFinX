<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{farmer, cropproject, investor, crop, crop_marcket_price, production_of_crop, investing_track, flnancial_group, investing_track_Organization, micro_loan, insurance, insurance_claim_reason, subsidies, agricultural_officer, subsides_issue};
use Faker\Factory as Faker;

class sentdata extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // farmer seed
        // foreach (range(1, 20) as $index) {
        //     Farmer::create([
        //         'f_name' => $faker->firstName,
        //         'l_name' => $faker->lastName,
        //         'email' => $faker->email,
        //         'nid' => sprintf('%010d', mt_rand(0, 9999999999)),
        //         'phone' => $faker->numerify('###########'),
        //         'address' => $faker->address,
        //         'dateofbirth' => $faker->date($format = 'Y-m-d', $max = 'now')
        //     ]);
        // }

        // crop project seed
        // foreach (range(1, 20) as $index) {
        //     cropproject::create([
        //         'farmer_id' => $faker->numberBetween(1, 20),
        //         'project_name' => $faker->words(3, true),
        //         'description' => $faker->paragraph,
        //         'launch_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        //         'end_date' => $faker->date($format = 'Y-m-d', $max = '+1 year'), // Assuming projects end within a year
        //         'farm_size' => $faker->randomNumber(2) . ' acres',
        //         'corp_quality' => $faker->randomElement(['High', 'Medium', 'Low']),
        //         'pesticide_cost' => $faker->randomFloat(2, 10, 1000), // Random cost between 10 and 1000
        //         'labour_cost' => $faker->randomFloat(2, 100, 10000),
        //         'funding_status' => $faker->boolean
        //     ]);
        // }

        // investor seed
        // foreach (range(1, 20) as $index) {
        //     investor::create([
        //         'f_name' => $faker->firstName,
        //         'l_name' => $faker->lastName,
        //         'email' => $faker->email,
        //         'nid' => sprintf('%010d', mt_rand(0, 9999999999)),
        //         'phone' => $faker->numerify('###########'),
        //         'address' => $faker->address,
        //         'dateofbirth' => $faker->date($format = 'Y-m-d', $max = 'now')
        //     ]);
        // }

        // crop seed
        // foreach (range(1, 20) as $index) {

        //     $cultivationEnd = $faker->dateTimeBetween('now', '+6 months')->format('Y-m-d');
        //     $cultivationStart = $faker->dateTimeBetween('-6 months', $cultivationEnd)->format('Y-m-d');

        //     crop::create([
        //         'name' => $faker->word,
        //         'cultavation_start' => $cultivationStart,
        //         'cultavation_end' => $cultivationEnd
        //     ]);
        // }

        // crop market prices seed
        // foreach (range(1, 20) as $index) {
        //     crop_marcket_price::create([
        //         'crop_id' => $faker->numberBetween(1, 20),
        //         'current_price' => $faker->randomFloat(2, 1, 100),
        //         'price_date' => $faker->date($format = 'Y-m-d', $max = 'now')
        //     ]);
        // }

        //crop production amounts seed
        // foreach (range(1, 20) as $index) {
        //     production_of_crop::create([
        //         'crop_id' => $faker->numberBetween(1, 20),
        //         'project_id' => $faker->numberBetween(1, 20),
        //         'production_amount' => $faker->randomFloat(2, 1, 10000),
        //     ]);
        // }

        //Investing tracking seed
        // foreach (range(1, 20) as $index) {
        //     investing_track::create([
        //         'investor_id' => $faker->numberBetween(1, 20),
        //         'project_id' => $faker->numberBetween(1, 20),
        //         'investing_amount' => $faker->randomFloat(2, 1, 100000),
        //         'investing_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        //         'percentage_rate' => $faker->randomFloat(2, 0, 100)
        //     ]);
        // }

        //flnancial_group seed
        // $organizationTypes = ['loan provider', 'investing organization', 'insurance organization'];
        // foreach (range(1, 20) as $index) {
        //     flnancial_group::create([
        //         'f_name' => $faker->firstName,
        //         'l_name' => $faker->lastName,
        //         'email' => $faker->email,
        //         'phone' => $faker->numerify('###########'),
        //         'address' => $faker->address,
        //         'Orgnization_type'=>$faker->randomElement($organizationTypes)
        //     ]);
        // }

        //investing_track_Organization seed
        // foreach (range(1, 10) as $index) {
        //     investing_track_Organization::create([
        //         'investor_id' => $faker->numberBetween(1, 20),
        //         'Organization_id' => $faker->numberBetween(1, 20),
        //         'investing_amount' => $faker->randomFloat(2, 1, 100000),
        //         'investing_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        //         'percentage_rate' => $faker->randomFloat(2, 0, 100)
        //     ]);
        // }

        // micro_loan seed
        //   foreach (range(1, 10) as $index) {
        //     micro_loan::create([
        //         'farmer_id' => $faker->numberBetween(1, 20),
        //         'Organization_id' => $faker->numberBetween(1, 20),
        //         'reason_of_taking_loan' => $faker->sentence(),
        //         'amount' => $faker->randomFloat(2, 100, 10000),
        //         'interest_rate' => $faker->randomFloat(2, 1, 10),
        //         'installment_period' => $faker->randomElement(['Monthly', 'Quarterly', 'Bi-annually', 'Annually']),
        //         'approval_status' => $faker->boolean(),
        //         'loan_issue_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        //         'debt_repayment_date' => $faker->date($format = 'Y-m-d', $max = '+1 year')
        //     ]);
        // }

        // insurance seed
        //   foreach (range(1, 10) as $index) {
        //     insurance::create([
        //         'farmer_id' => $faker->numberBetween(1, 20),
        //         'Organization_id' => $faker->numberBetween(1, 20),
        //         'insurance_premium' => $faker->randomFloat(2, 100, 1000),
        //         'claim_amount' => $faker->randomFloat(2, 10000, 100000),
        //         'crop_amount' => $faker->randomFloat(2, 1000, 50000),
        //         'approvel_status' => $faker->boolean(),
        //         'issue_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        //     ]);
        // }

        // insurance_claim_reason seed
        // $disaster_types = [
        //     "Hurricanes and Typhoons",
        //     "Earthquakes",
        //     "Cybersecurity Breaches",
        //     "Infrastructure Failures",
        //     "Market Crashes",
        //     "Bankruptcy",
        //     "Scandals and Controversies",
        //     "Product Recalls",
        //     "Workplace Accidents",
        //     "Leadership Failures",
        //     "Lawsuits and Legal Battles"
        // ];

        // foreach (range(1, 7) as $index) {
        //     insurance_claim_reason::create([
        //         'insurance_id' => $faker->numberBetween(1, 20),
        //         'Organization_id' => $faker->numberBetween(1, 20),
        //         'disaster_type' => $faker->randomElement($disaster_types),
        //         'status' => $faker->boolean(),
        //         'issue_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        //     ]);
        // }

        // subsidies seed
        //   foreach (range(1, 10) as $index) {
        //     subsidies::create([
        //         'farmer_id' => $faker->numberBetween(1, 20),
        //         'reason_of_taking_subsidies' => $faker->sentence(),
        //         'amount' => $faker->randomFloat(2, 100, 10000),
        //         'farm_size' => $faker->randomFloat(2, 1, 20),
        //         'approvel_status' => $faker->boolean(),
        //     ]);
        // }

        // agricultural_officer seed
        // foreach (range(1, 20) as $index) {
        //     agricultural_officer::create([
        //         'f_name' => $faker->firstName,
        //         'l_name' => $faker->lastName,
        //         'email' => $faker->email,
        //         'phone' => $faker->numerify('###########'),
        //         'address' => $faker->address,
        //         'dateofbirth' => $faker->date($format = 'Y-m-d', $max = 'now')
        //     ]);
        // }

        // subsides_issue seed
        // foreach (range(1, 10) as $index) {
        //     subsides_issue::create([
        //         'subsides_id' => $faker->numberBetween(1, 20),
        //         'agri_officer_id' => $faker->numberBetween(1, 20),
        //         'issue_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        //     ]);
        // }
    }
}
