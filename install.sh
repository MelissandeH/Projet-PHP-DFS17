
  #!/bin/bash

  echo "Choisis une version de PHP"
  select optPHP in php7.3 php7.2 php5.6; do
    sudo add-apt-repository ppa:ondrej/php -y
    sudo apt update
    sudo apt install apache2 -y
    sudo apt install ${optPHP} -y
    sudo apt install libapache2-mod-${optPHP} -y
    sudo apt install php-xdebug -y
    sudo apt install ${optPHP}-mysql -y
    sudo apt install ${optPHP}-zip -y
    sudo apt install ${optPHP}-mbstring -y
    sudo apt install ${optPHP}-dom -y
    sudo apt install ${optPHP}-curl -y
    sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password 1234"
    sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password 1234"
    sudo apt install mysql-server -y

    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"
    sudo mv composer.phar /usr/local/bin/composer

    case $optPHP in
    php5.6)
      sudo sed -i '466s/Off/On/' /etc/php/5.6/apache2/php.ini
      sudo sed -i '477s/Off/On/' /etc/php/5.6/apache2/php.ini
      sudo sed -i '16s/www-data/vagrant/' /etc/apache2/envvars
      sudo sed -i '17s/www-data/vagrant/' /etc/apache2/envvars
      ;;
    *)
      sudo sed -i '474s/Off/On/' /etc/php/7.3/apache2/php.ini
      sudo sed -i '485s/Off/On/' /etc/php/7.3/apache2/php.ini
      sudo sed -i '16s/www-data/vagrant/' /etc/apache2/envvars
      sudo sed -i '17s/www-data/vagrant/' /etc/apache2/envvars
      ;;
esac

    sudo a2enmod rewrite

    sudo service apache2 restart
    echo "Done! Ton mot de passe mysql est 1234, change le!"
    break
    rm /var/www/html/install.sh
  done
  
