sudo apt update && sudo apt install -y mysql-server
sudo systemctl start mysql.service
#sudo mysql -uroot -p -e "SET PASSWORD FOR 'root'@'localhost' = PASSWORD('Password&1');"

#sudo tee -a /etc/mysql/mysql.conf.d/mysqld.cnf <<EOF
#  [mysqld]
#  bind-address = 10.10.20.11
#EOF

sudo sed -i 's/bind-address = 127.0.0.1/bind-address = 10.10.20.11/' /etc/mysql/mysql.conf.d/mysqld.cnf

sudo mysql < /vagrant/database/archivio.sql
sudo mysql -e "CREATE USER 'web'@'10.10.20.%' IDENTIFIED BY 'Password&1'";
sudo mysql -e "GRANT ALL PRIVILEGES ON archiviodb.* TO 'web'@'10.10.20.%' WITH GRANT OPTION";

sudo systemctl restart mysql