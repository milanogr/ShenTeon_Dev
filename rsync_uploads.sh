#!/bin/bash
host="root@saruman.me.delex-ws.net"
directory="/var/www/vhosts/shenteon/web/uploads/itemsType"
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
                rsync -rvz -u -e "sshpass -p '$password' ssh -p11119" $host:$directory ./web/test --dry-run
        elif [ "$1" == "direct" ]; then
                echo "Modalità Normale";
                rsync -rzv -e "sshpass -p '$password' ssh -p11119" $host:$directory ./web/test
                #sshpass -p "$password" ssh $host "cd $directory && ./after_deploy.sh"
        else
                usage;
        fi;
else
        usage;
fi