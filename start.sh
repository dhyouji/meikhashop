#!/bin/bash

set -e
ssh-keygen -A

#prepare run dir
if [ ! -d "/var/run/sshd" ]; then
  mkdir -p /var/run/sshd
fi

service ssh start 

# Navigate to the project directory
cd /var/www/html

# Run the desired commands or scripts
CRON_COMMAND="* * * * * /usr/local/bin/php -q -f /var/www/html/artisan schedule:run --no-ansi >> /var/log/cron.log 2>&1"

# Add the cron job command to the crontab
echo "$CRON_COMMAND" | crontab -

# Any other commands or scripts you want to run as part of the cron job

service apache2 start
cron
supervisord -n