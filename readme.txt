composer install
npm install
npm run dev

Crear base de datos y configurar datos en archivo .env. el nombre de la base de datos,
usuario y contraseña configurar en base a su entorno donde ejecutará el proyecto, 
DB_DATABASE=crm_hcom
DB_USERNAME=root

Es necesario configurar mailtrap, se dejan los datos de acceso a mailtrap.
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=0e3e70fdd1d9ac
MAIL_PASSWORD=70364debd48795
MAIL_ENCRYPTION=tls

php artisan migrate
php artisan db:seed --class=UserSeeder
php artisan key:generate


#Virtual Host para el caso de apache con xammp
<VirtualHost *:85>
ServerName "crm_hcom.local"
DocumentRoot C:\xampp\htdocs\crm_hcom\public
    <Directory "C:\xampp\htdocs">
        Require all granted
        AllowOverride All
    </Directory>
</VirtualHost>