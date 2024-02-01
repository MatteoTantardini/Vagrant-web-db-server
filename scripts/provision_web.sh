sudo apt update && sudo apt install apache2 -y
sudo apt -y install libapache2-mod-php8.1
sudo apt -y install php-mysqli

sudo sed -i 's/;extension=mysqli/extension=mysqli/' /etc/php/8.1/apache2/php.ini
sudo sed -i 's/;extension=mbstring/extension=mbstring/' /etc/php/8.1/apache2/php.ini

sudo systemctl restart apache2