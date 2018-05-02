###
Configuration  

1. Install Apache  
- `sudo apt-get install apache2 -y`  
2. Install php7  
- `sudo apt-get install php7.0 -y`  
3. Install nodejs  
- `sudo su`  
- `apt-get remove --purge node* npm*`  
- `curl -sL https://deb.nodesource.com/setup_9.x | sudo -E bash -`  
- `apt-get install nodejs -y`  
- `exit`  
- `node -v` should be 9.x.x  
- `npm -v` should be 5.x.x  
4. Install composer  
- `curl -sS https://getcomposer.org/installer | php`  
- `sudo mv composer.phar /usr/local/bin/composer`  
- `composer update`  
5. Fix laravel permissions  
- `sudo chmod 777 -R /var/www/project-radio.com/public_html/radio/storage/framework/sessions`
- `sudo chmod 777 -R /var/www/project-radio.com/public_html/radio/storage/framework/views`  


Utils  
`composer create-project --prefer-dist laravel/laravel projectName 5.4`  
