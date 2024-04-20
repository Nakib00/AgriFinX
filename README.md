# AgriFinX - Agricultural Finance Management Platform

AgriFinX is a fintech platform specifically designed to cater to the needs of the agricultural sector. It provides comprehensive solutions for managing various aspects of agricultural finance, including user management, crop insurance, loan processing, investment management, and data analytics. This README file serves as a guide to understand the project structure, installation process, and usage of AgriFinX.

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


#User Email

1. Insurance email
zantech@gmail.com
napver@gmail.com
cisco@gmail.com
napinsurance@gmail.com
Keya@gmail.com

2. Microloan Providers
ahisan@gmail.com
labello@gmail.com
sunlite@gmail.com
sesip@gmail.com
living@gmail.com

3. Investing Organizations
microlab@gmail.com
samsung@gmail.com
formulae@gmail.com
reo@gmail.com
fantech@gmail.com

4. Farmer
rahim@gmail.com
remu@gmail.com
joymia@gmail.com

5. Agricultural Officer
dhaka@gmail.com
pabna@gmail.com
feni@gmail.com

6. Investor
nakibulisalm54@gmail.com

Pass: 12345678

