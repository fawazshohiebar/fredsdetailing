#!/bin/bash
# Move to the website directory
cd /home/fredsdetailing/htdocs

# Pull latest code from GitHub
git pull origin main

# Install dependencies (only if composer.json changed)
composer install --no-interaction --prefer-dist --optimize-autoloader

# Clear Statamic caches to reflect new changes
php please stache:clear
php please static:clear

