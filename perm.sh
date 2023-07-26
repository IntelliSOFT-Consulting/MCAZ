#!/bin/bash
 
# chmod 0777 tmp/
sudo chmod 0777 -R tmp/cache
sudo chmod 0777 -R webroot
echo "$(ls -lah /tmp)" > output 