#!/bin/bash
 
# chmod 0777 tmp/
chmod 755 -R /var/www/html/tmp
echo "$(ls -lah /tmp)" > output 