# AgriFinX - Agricultural Finance Management Platform

AgriFinX is a fintech platform specifically designed to cater to the needs of the agricultural sector. It provides comprehensive solutions for managing various aspects of agricultural finance, including user management, crop insurance, loan processing, investment management, and data analytics. This README file serves as a guide to understand the project structure, installation process, and usage of AgriFinX.

# Use Case

When migrating a table to the database, follow these steps:

1. First, migrate the specific table by running the following command:

    ```sh
    php artisan migrate --path="database\migrations\2024_03_15_062836_create_crops_table.php"
    ```

    This command will execute the migration specifically for the `crops` table using the migration file `2024_03_15_062836_create_crops_table.php`.

2. After migrating the specific table, migrate all tables by running the following command:

    ```sh
    php artisan migrate
    ```

    This command will migrate all pending migrations, including the one for the `crops` table and any other tables defined in your migration files.
jani naa