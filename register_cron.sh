echo "* * * * * bin/cake queue runworker
# Don't remove the empty line at the end of this file. It is required to run the cron job" > scheduler.txt

crontab scheduler.txt
cron -f