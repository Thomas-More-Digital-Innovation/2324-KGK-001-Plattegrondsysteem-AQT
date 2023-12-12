#!/bin/bash

# Define the paths
PROJECT_DIR="/data/sites/web/wesleyvanlaerbe/subsites/aquaterra.wesleyvanlaer.be/"
BACKUP_DIR="/data/sites/web/wesleyvanlaerbe/backup-aquaterra/"
INCOMING_DIR="/data/sites/web/wesleyvanlaerbe/incoming-aquaterra/"

# Define the command to download the latest version
DOWNLOAD_CMD="git clone -b dev https://github.com/Thomas-More-Digital-Innovation/2324-KGK-001-Plattegrondsysteem-AQT.git"

# Get the current date and time
DATE=$(date +"%Y-%m-%d-%H-%M-%S")

# Create the backup and incoming folders
mkdir -p $BACKUP_DIR
mkdir -p $INCOMING_DIR

# Generate the backup sub directory
BACKUP_SUB_DIR="$BACKUP_DIR/$DATE"

# Create the backup folder
mkdir -p $BACKUP_SUB_DIR

# Copy the files to the backup folder
cp -r $PROJECT_DIR $BACKUP_SUB_DIR

# Download the latest version
cd $INCOMING_DIR
$DOWNLOAD_CMD

# Copy deployment files to production
cp -r $INCOMING_DIR/2324-KGK-001-Plattegrondsysteem-AQT/code/* $PROJECT_DIR -f

# Navigate to production folder
cd $PROJECT_DIR

# Rebuild application
npm install && composer install --no-dev --optimize-autoloader && composer update --no-dev --optimize-autoloader && php artisan config:clear && php artisan config:cache && php artisan queue:restart && npm run build
