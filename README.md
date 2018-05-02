###
Configuration  

1. Install Apache  
- `sudo apt-get install apache2 -y`  
2. Configure Apache  
- `sudo nano /etc/apache2/sites-available/000-default.config`
Just berofre `</VirtualHost>` tag add:  
- `#!conf`  
- `alias /radio E:/VirtualHosts/radio/public`  
- `<Directory "E:/VirtualHosts/radio/public">`  
- `AllowOverride all`  
- `Require all granted`  
- `</Directory>`  
Then  
- `sudo a2enmod rewrite`  
- `sudo service apache2 restart`  
3. Install php7  
- `sudo apt-get install php7.0 -y`  
- `sudo apt-get install php-mbstring -y`  
- `sudo apt-get install php7.0-xml -y`  
4. Install nodejs  
- `sudo su`  
- `apt-get remove --purge node* npm*`  
- `curl -sL https://deb.nodesource.com/setup_9.x | sudo -E bash -`  
- `apt-get install nodejs -y`  
- `exit`  
- `node -v` should be 9.x.x  
- `npm -v` should be 5.x.x  
5. Install composer  
- `curl -sS https://getcomposer.org/installer | php`  
- `sudo mv composer.phar /usr/local/bin/composer`  
- `service apache2 restart`
- `composer update`  
6. Configure laravel  
- `cp .env.example .env`  
- `sudo chown -R pi:www-data /var/www/project-radio/radio`  
- `sudo find /var/www/project-radio/radio -type d -exec chmod 775 {} \;`  
- `sudo find /var/www/project-radio/radio -type f -exec chmod 664 {} \;`  


Utils  
`composer create-project --prefer-dist laravel/laravel projectName 5.4`  
