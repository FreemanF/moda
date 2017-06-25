#!/bin/sh

case "$1" in
    '')
    echo "Usage: $0 <task> [<param>]"
    exit 1
esac
#case "$2" in
#    '') command=elevatorist
#	;;
#    *)  command=$2
#esac
command=empty
task=$1
echo execute $command $task

sudo -u www-data /opt/lampp/bin/php /var/www/024-YiiCMS/htdocs/protected/cron.php $command $task $2 $3 $4
tail -n 20 /home/uniser/www/projects/024-YiiCMS/htdocs/protected/runtime/cron.log

