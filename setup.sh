dpkg --configure -a
apt-get install -y xvfb libfontconfig fontconfig libpng16-16 libxrender1 xfonts-75dpi build-essential xorg
dpkg -i wkhtmltopdf.deb
apt-get update