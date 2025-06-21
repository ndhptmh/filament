## Clone Project
1. Buat folder baru pada folder htdocs atau di folder lainnya.
2. clone project dengan menggunakan cmd, dengan cara : git clone https://github.com/ndhptmh/filament.git .
3. lalu buka projectnya.

## install dependencies
1. composer install
2. composer require filament/filament
3. php artisan filament:install

## env
1. copy env.example atau ganti menjadi env
2. sesuaikan variable di bawah ini sesuai dengan setup pada database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_db
DB_USERNAME=root
DB_PASSWORD=

3. sesuaikan variable di bawah ini sesuai dengan setup email anda
MAIL_MAILER=smtp
MAIL_HOST=<smtp_host>
MAIL_PORT=587
MAIL_USERNAME=<mail_user>
MAIL_PASSWORD=<mail_password>
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=<alamat_email>
MAIL_FROM_NAME="${APP_NAME}"

## migration dan seeder
1. setelah setup di atas, jalan perintah berikut
- php artisan migrate:fresh --seed

## run project
1. jalankan perintah berikut di terminal php artisan serve
2. akan muncul http://localhost:8000
3. akses http://localhost:8000/admin/login untuk ke halaman login page admin
email : admin@email.com
password : password
4. akses http://localhost:8000/user/login untuk ke halaman login page user
email : user@email.com
password : password
5. untuk menjalankan pengiriman email, jalankan perintah berikut
php artisan queue:work
