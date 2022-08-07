---
title: "VulnHub Write Up: Topo"
date: "2018-09-19"
---

- VulnHub Image: [Toppo](https://www.vulnhub.com/entry/toppo-1,245/)
- Rating: Easy
- Author: [@h4d3sw0rm](https://twitter.com/h4d3sw0rm")

# Getting Started

Once you have the Toppo virtual disk mounted in a virtual machine and start up, you are greeted with a login prompt and ip address (see below).

![image](/1.png)

First I ping the IP address from my Kali system to make sure my network is setup correctly and I can connect to the box.

![image](/2.png)

Since the network is setup correctly, I can do a quick nmap scan of the host:

    nmap -sV 10.0.1.137

Which shows me that port 22, 80, and 111 are all open.

![image](/3.png)

A quick Google search for "exploit rpcbind 111" tells me that it is part of an NFS (Network File System) and likely has exploits available.

I open metasploit and search for "rpcbind", but only find a DoS module.  Searching metasploit for "nsf" also doesn't seem to point to any promising results.

After a bit of digging (and using rpcinfo and showmount), I determined that it was unlikely that nsf was actually running on this system.

# Web Application

Since port 80 is open, lets turn our attention there.  Visiting our target's IP address in a browser reveals a simple blog.

![image](/4.png)

Based on our nmap scan, we also know that the webserver is Apache 2.4.10, which was released on July 21, 2014.  I couldn't find anything obvious that would make this exploitable.

I tried finding the admin portal to this blog by visiting http://10.0.1.137/admin, which showed a file tree with a notes.txt file (Security Misconfiguration)!

![image](/5.png)

And the notes.txt file contained a username and password:

![image](/6.png)

# SSH
We also know from the nmap scan that port 22 is open, so lets try using this password we found to get in through ssh.  A few tries at root didn't get anywhere, but since this user's name could be ted (based on the password), trying ted@10.0.1.137 with the password found in notes.txt worked!

![image](/7.png)

After some digging, I couldn't find any flags as ted, but some directories are only accessible with root.

# Privilege Escalation

I was unable to figure out privilege escalation on my own, so I referenced <a href="https://medium.com/@ikuamike/toppo-1-vulnhub-vm-writeup-6ef37586345e">@ikuamike write-up on Medium</a>.  They used LinEnum.sh to check for local privilege escalation, so I downloaded and ran it:

    wget https://raw.githubusercontent.com/rebootuser/LinEnum/master/LinEnum.sh

    sh LinEnum.sh -s 12345ted123

and confirmed that it finds that ted can run awk as root with no password.

![image](/8.png)

In the future, I can always just look at the /etc/sudoers file to check for this.

![image](/9.png)

awk can then be used to write a simple program to run system commands:

    awk 'BEGIN {system("COMMAND_HERE")}'

Using this, we can look at the files in the root directory, where we find flag.txt!  And then running cat on the file gives us the contents and our flag.

![image](/10.png)

# Learnings from other write-ups

Another tool that @ikuamike referenced was a web server scanner called nikto, which is installed on Kali by default.

Running nikto on the target would have removed some of the guess work when trying to find interesting URLs on the blog.

![image](/11.png)