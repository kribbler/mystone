#!/bin/bash

if [ -f /.node-installed ]; then
    echo "Node already installed"
    exit 0
fi

echo "=> Instaling Node, npm, bower and gulp"
cd /
/usr/bin/php -r "readfile('https://getcomposer.org/installer');" | /usr/bin/php
apt-get -y install nodejs
apt-get -y install npm
ln -s /usr/bin/nodejs /usr/bin/node
npm install -g bower
npm install -g gulp

echo "=> Done!"
touch /.node-installed
