conf:
	composer install --no-scripts
	cp .env.example .env
	php artisan key:generate
	$(MAKE) bd-create
	php config-env.php
	$(MAKE) bd-migrate

bd-create:
	mysql -u root -p --execute="drop database if exists idealizit; create database idealizit; drop user if exists 'idealizit'; create user 'idealizit' identified with mysql_native_password by 'secret'; grant all privileges on idealizit.* to 'idealizit';"

bd-migrate:
	php artisan migrate:refresh --seed
# 	sed -i 's/DB_DATABASE.*/DB_DATABASE=idealizit/' .env
# 	sed -i 's/DB_USERNAME.*/DB_USERNAME=idealizit/' .env
# 	sed -i 's/DB_PASSWORD.*/DB_PASSWORD=secret/' .env
# 	sed -i 's/MAIL_HOST.*/MAIL_HOST=smtp.gmail.com/' .env
# 	sed -i 's/MAIL_PORT.*/MAIL_PORT=587/' .env
# 	sed -i 's/MAIL_USERNAME.*/MAIL_USERNAME=mail@idealiz.it/' .env
# 	sed -i 's/MAIL_PASSWORD.*/MAIL_PASSWORD=secret/' .env
# 	sed -i 's/MAIL_ENCRYPTION.*/MAIL_ENCRYPTION=tls/' .env