#!/bin/bash
host="root@saruman.me.delex-ws.net"
directory="/var/www/vhosts/shenteon"
password=""
usage(){
        echo "Impossibile fare il rsync";
        echo "Utilizzo:";
        echo "   $0 direct";
        echo "Oppure:";
        echo "   $0 dry";
}
echo "Host: $host";
echo "Directory: $directory"
if [ $# -eq 1 ]; then
        if [ "$1" == "dry" ]; then
                echo "Modalità DRY-RUN";
                rsync -CvzrltD --force --delete --exclude-from="app/config/rsync_exclude.txt" -e "sshpass -p '$password' ssh -p11119" ./ $host:$directory --dry-run
        elif [ "$1" == "direct" ]; then
                echo "Modalità Normale";
                rsync -CvzrltD --force --delete --exclude-from="app/config/rsync_exclude.txt" -e "sshpass -p '$password' ssh -p11119" ./ $host:$directory

        else
                usage;
        fi;
else
        usage;
fi