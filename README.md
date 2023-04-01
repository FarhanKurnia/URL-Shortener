# URL Shortener
## About
This apps build with laravel v.10 to shorten your urls and make them more accessible.


------------------------------------------------------------------------
## Implementations
1. Create MySQL database</br>

2. Clone Repository </br>
    ```
    git clone https://github.com/FarhanKurnia/REST-API-CCO-LUMEN.git
    ```

3. Install Composer </br>
    ```
    composer install
    ```

4. Copy and Set up environment</br>
    ```
    cp .env.example .env
    ```

5. Customize environment (.env) files with DB name that has been created.</br>

6. Install your extension of PHP (Ubuntu) depend on what the db that you use (optional) </br>
    ```
    sudo apt-get install php7.4-mysql //for mysql
    sudo apt-get install php7.4-pgsql //for postgres

    ```

7. Migrate database</br>
    ```
    php artisan migrate
    ```

9. Run local server</br>
    ```
    php -S localhost:8000 -t public
    ```

10. Access localhost:8000 or your public link