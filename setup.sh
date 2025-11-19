#!/bin/bash

echo "============================================================"
echo "   AUTOMATIC APPLICATION INSTALLATION"
echo "============================================================"
sleep 2


APP_DIR="/var/www/travelflow.local/public_html"

REPO_URL="https://github.com/MGergont/TravelTaskManager.git"


DB_NAME="travelapp"
DB_USER="appuser"
DB_PASS="superhaslo123"
DB_HOST="localhost"

SERVER_NAME="travelflow.local"


echo "[1/9] Installing packages..."
apt install -y git curl unzip software-properties-common

echo "Adding PHP 8.2..."
add-apt-repository ppa:ondrej/php -y
apt update

echo "PHP installation + modules..."
apt install -y apache2 php8.2 php8.2-pgsql php8.2-cli php8.2-xml php8.2-mbstring php8.2-curl php8.2-zip libapache2-mod-php8.2

systemctl enable apache2
systemctl start apache2

echo "[2/9] PostgreSQL installation..."
apt install -y postgresql postgresql-contrib

echo "[3/9] Creating a database and user..."

sudo -u postgres psql <<EOF
CREATE USER $DB_USER WITH PASSWORD '$DB_PASS';
CREATE DATABASE $DB_NAME OWNER $DB_USER;
GRANT ALL PRIVILEGES ON DATABASE $DB_NAME TO $DB_USER;
EOF

echo "[4/9] Composer installation..."
cd /tmp
curl -sS https://getcomposer.org/installer -o composer-setup.php
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
composer --version

echo "[5/9] Downloading the project from GitHub..."

if [ -d "$APP_DIR" ]; then
  echo "Katalog $APP_DIR już istnieje — pomijam."
else
  git clone $REPO_URL $APP_DIR
fi

echo "[6/9] Creating an .env file..."

cd $APP_DIR

if [ -f ".env" ]; then
  echo ".env exists - I omit."
else
  cat > .env <<EOF
APP_ENV=production

DB_HOST=$DB_HOST
DB_PORT=5432
DB_NAME=$DB_NAME
DB_USER=$DB_USER
DB_PASS=$DB_PASS

# Ustawienia smtp
# SMTP_HOST=
# SMTP_PORT=465 / 587
# SMTP_USER=
# SMTP_PWD_CRYPT=
# SMTP_TYP_CONECT=ssl / tls
# SMTP_USER_FROM=
# SMTP_FROM_NAME=

# SECRET_KEY_ENCRYPT= 'encryption phrase'
# SECRET_IV_ENCRYPT='initial vector'

EOF
fi

echo "[7/9] Installing PHP dependencies..."
composer install


if [ -f "vendor/bin/phinx" ]; then
  echo "[8/9] Performing database migration..."
  php vendor/bin/phinx migrate -e production
else
  echo "Lack Phinx — I omit migrations."
fi


echo "[9/9] Apache configuration..."

VHOST_PATH="/etc/apache2/sites-available/$SERVER_NAME.conf"

cat > $VHOST_PATH <<EOF
<VirtualHost *:80>
    ServerAdmin webmaster@travelflow.local
    ServerName $SERVER_NAME
    ServerAlias www.$SERVER_NAME
    DocumentRoot $APP_DIR
    <Directory $APP_DIR>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    ErrorLog \${APACHE_LOG_DIR}/app_error.log
    CustomLog \${APACHE_LOG_DIR}/app_access.log combined
</VirtualHost>
EOF

a2ensite $SERVER_NAME.conf
a2enmod rewrite
systemctl reload apache2

echo "Adding an entry to /etc/hosts..."
echo "127.0.0.1   $SERVER_NAME" >> /etc/hosts

echo "============================================================"
echo " INSTALLATION COMPLETE!"
echo " The application is available at:  http://$SERVER_NAME"
echo " The application administration panel is available at:  http://$SERVER_NAME/admin"
echo " Login: admin"
echo " Password: qwerty12345"
echo "============================================================"