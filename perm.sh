#!/bin/bash
 
# chmod 0777 tmp/
sudo chmod 0777 -R tmp/cache
echo "$(ls -lah /tmp)" > output 