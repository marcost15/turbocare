#!/bin/bash

echo -n Eliminando Carpeta templates_c ...
rm -rf templates_c
echo [Listo]

mkdir templates_c
chmod -R 755 .
chmod 777 templates_c
chmod -R 644 *.php
chmod 777 respaldobd

