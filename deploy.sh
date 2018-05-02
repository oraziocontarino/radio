#!/usr/bin/expect -f
git pull
/bin/cp -rf resources/assets/images/* /public/images
/bin/cp -rf resources/assets/css/* /public/css
/bin/cp -rf resources/assets/js/* /public/js