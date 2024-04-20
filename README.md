# AgriFinx

AgriFinx is a web application aimed at facilitating agricultural financing, risk assessment, and subsidy management for farmers, investors, and agricultural organizations. The platform allows farmers to create crop projects, apply for microloans, insurance, and subsidies, while investors can invest in crop projects and agricultural organizations.

## Features

### For Farmers:
- **Crop Project Creation:** Farmers can create crop projects, providing details about the crops they plan to cultivate, expected yields, and other relevant information.
- **Risk Assessment:** AgriFinx provides risk assessment tools to help farmers evaluate the viability and potential risks associated with their crop projects.
- **Microloan Application:** Farmers can apply for microloans from loan providers to finance their crop projects.
- **Insurance Application:** Farmers can apply for insurance coverage for their crop projects to mitigate risks due to crop failure or other unforeseen events.
- **Subsidy Management:** Farmers can access subsidy programs facilitated by local agricultural officers through AgriFinx.

### For Investors:
- **Investment Opportunities:** Investors can browse and invest in crop projects listed on AgriFinx, diversifying their investment portfolio in the agricultural sector.
- **Investment in Agricultural Organizations:** Investors can also invest in agricultural organizations that facilitate microloans, insurance, and subsidies for farmers.

### For Agricultural Organizations:
- **Investment Management:** Agricultural organizations can manage investments received from investors and allocate funds to various crop projects.
- **Microloan Provision:** Organizations can provide microloans to farmers through AgriFinx, facilitating financial support for crop cultivation.
- **Insurance Coverage:** Organizations can offer insurance coverage to farmers through AgriFinx, protecting their crop projects against unforeseen risks.

### Admin Panel:
- **Crop Management:** The admin panel allows administrators to add new crops and update current crop prices to keep the platform up-to-date with market trends.

## Technologies Used
- **Frontend:** HTML, CSS, JavaScript
- **Backend:** Laravel
- **Database:** MySQL

## Getting Started
To run AgriFinx locally, follow these steps:
1. Clone this repository.
2. Install dependencies using `composer install` for Laravel.
3. Set up a MySQL database and update the database configuration in the `.env` file.
4. Run migrations using `php artisan migrate` to create the necessary tables.
5. Serve the application using `php artisan serve`.


#How to use

# First migrate those table

When migrating a table to the database, follow these steps:

1. First, migrate the specific table by running the following command:

    ```sh
    php artisan migrate --path="database\migrations\2024_03_15_062836_create_crops_table.php"
    ```

   ```sh
   php artisan migrate --path="database\migrations\2024_03_15_070801_create_flnancial_groups_table.php"
    ```

   ```sh
    php artisan migrate --path="database\migrations\2024_03_15_082501_create_agricultural_officers_table.php"
    ```

1. After migrating the specific table, migrate all tables by running the following command:

    ```sh
    php artisan migrate
    ```

This command will migrate all pending migrations, including the one for the `crops` table and any other tables defined in your migration files.
jani naa


# Email Contacts

## Insurance Providers
1. [zantech@gmail.com](mailto:zantech@gmail.com)
2. [napver@gmail.com](mailto:napver@gmail.com)
3. [cisco@gmail.com](mailto:cisco@gmail.com)
4. [napinsurance@gmail.com](mailto:napinsurance@gmail.com)
5. [Keya@gmail.com](mailto:Keya@gmail.com)

- Password: 12345678


## Microloan Providers
1. [ahisan@gmail.com](mailto:ahisan@gmail.com)
2. [labello@gmail.com](mailto:labello@gmail.com)
3. [sunlite@gmail.com](mailto:sunlite@gmail.com)
4. [sesip@gmail.com](mailto:sesip@gmail.com)
5. [living@gmail.com](mailto:living@gmail.com)

- Password: 12345678


## Investing Organizations
1. [microlab@gmail.com](mailto:microlab@gmail.com)
2. [samsung@gmail.com](mailto:samsung@gmail.com)
3. [formulae@gmail.com](mailto:formulae@gmail.com)
4. [reo@gmail.com](mailto:reo@gmail.com)
5. [fantech@gmail.com](mailto:fantech@gmail.com)

- Password: 12345678


## Farmer
1. [rahim@gmail.com](mailto:rahim@gmail.com)
2. [remu@gmail.com](mailto:remu@gmail.com)
3. [joymia@gmail.com](mailto:joymia@gmail.com)

- Password: 12345678


## Agricultural Officer
1. [dhaka@gmail.com](mailto:dhaka@gmail.com)
2. [pabna@gmail.com](mailto:pabna@gmail.com)
3. [feni@gmail.com](mailto:feni@gmail.com)

- Password: 12345678

## Investor
- Email: [nakibulisalm54@gmail.com](mailto:nakibulisalm54@gmail.com)
- Password: 12345678

##Screenshot
![AgriFinx Website](https://github.com/Nakib00/AgriFinX/blob/main/Website%20Image/screencapture-127-0-0-1-8000-2024-04-20-21_56_53.png?raw=true)
![AgriFinx Website](https://github.com/Nakib00/AgriFinX/blob/main/Website%20Image/screencapture-127-0-0-1-8000-dashboard-2024-04-20-21_58_10.png?raw=true)
![AgriFinx Website](https://github.com/Nakib00/AgriFinX/blob/main/Website%20Image/screencapture-127-0-0-1-8000-farmer-dashboard-2024-04-20-21_57_25.png?raw=true)
![AgriFinx Website](https://github.com/Nakib00/AgriFinX/blob/main/Website%20Image/screencapture-127-0-0-1-8000-farmer-login-2024-04-20-21_57_38.png?raw=true)
![AgriFinx Website](https://github.com/Nakib00/AgriFinX/blob/main/Website%20Image/screencapture-127-0-0-1-8000-investor-dashboard-2024-04-20-21_57_50.png?raw=true)


