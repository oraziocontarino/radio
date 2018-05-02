###
Configuration  

1. `sudo apt-get install apache2`  
2. `sudo apt-get install php7`  
3. `sudo su`  
- `apt-get remove --purge node* npm*`  
- `curl -sL https://deb.nodesource.com/setup_9.x | sudo -E bash -`  
- `apt-get install node`  
- `exit` 
- `node -v` should be 9.x.x  
- `npm -v` should be 5.x.x  
5. `sudo npm install -g bower`  
6. `sudo npm install -g gulp`  
7. `sudo npm install -g laravel-elixir`  
8. `sudo npm install`  
9. `sudo npm link laravel-elixir`  
10. `sudo npm link laravel-gulp`  
11. `sudo npm link del`  
12. `gulp`  
13. `composer update`  
14. `sudo chmod 777 -R /var/www/project-radio.com/public_html/radio/storage/framework/sessions`
15. `sudo chmod 777 -R /var/www/project-radio.com/public_html/radio/storage/framework/views`  

utils  
`composer create-project --prefer-dist laravel/laravel projectName 5.4`  
 