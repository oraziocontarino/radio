###
Raspbian setup  
1. `sudo apt-get update -y`  
2. `sudo apt-get upgrade -y`  
3. `sudo apt-get update -y`  
4. `sudo apt-get install apache2 -y`  
5. `sudo apt-get install php7 -y`  
6. `sudo apt-get install php-xml -y`  
7. `sudo apt-get install vlc -y`  

###
VirtualHost configuration  
1. `sudo mkdir -p /var/www/project-radio.com/public_html`  
2. `sudo chown -R $USER:$USER /var/www/project-radio.com/public_html`  
3. `sudo chmod -R 755 /var/www`  
4. `cd /var/www/project-radio.com/public_html`
5. `git clone https://github.com/oraziocontarino/radio.git`
6. `nano /etc/apache2/sites-available/000-default.conf`  
7. prepend before </virtualhost> this lines (and save):  
`alias /radio /var/www/project-radio.com/public_html/radio`  
`<Directory "/var/www/project-radio.com/public_html/radio">`  
`AllowOverride all`  
`Require all granted`  
`</Directory>`  
8. `sudo service apache2 restart`  

###
Other configurations
1. `chmod 777 /var/www/project-radio.com/public_html/radio/log/backend.log`
