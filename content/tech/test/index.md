# VulnHub Write-Up: Toppo

<table>
<tbody>
<tr>
<td>VulnHub Image:</td>
<td><a href="https://www.vulnhub.com/entry/toppo-1,245/">Toppo</a></td>
</tr>
<tr>
<td>Rating:</td>
<td>Easy</td>
</tr>
<tr>
<td>Author:</td>
<td>@<a href="https://twitter.com/h4d3sw0rm">h4d3sw0rm</a></td>
</tr>
</tbody>
</table>
<h1>Getting Started</h1>
Once you have the Toppo virtual disk mounted in a virtual machine and start up, you are greeted with a login prompt and ip address (see below).

<img class="alignnone wp-image-37" src="http://koskilla.com/admin/wp-content/uploads/2018/09/vulnhub-toppo-start-1024x573.png" alt="" width="820" height="459" />

&nbsp;

First I ping the IP address from my Kali system to make sure my network is setup correctly and I can connect to the box.

<img class="alignnone wp-image-41" src="http://koskilla.com/admin/wp-content/uploads/2018/09/Screen-Shot-2018-09-17-at-11.14.52-PM-1024x613.png" alt="" width="820" height="491" />

Since the network is setup correctly, I can do a quick nmap scan of the host:
<pre>nmap -sV 10.0.1.137</pre>
Which shows me that port 22, 80, and 111 are all open.

<img class="alignnone wp-image-42" src="http://koskilla.com/admin/wp-content/uploads/2018/09/Screen-Shot-2018-09-17-at-11.19.01-PM-1024x615.png" alt="" width="820" height="493" />

A quick Google search for "exploit rpcbind 111" tells me that it is part of an NFS (Network File System) and likely has exploits available.

I open metasploit and search for "rpcbind", but only find a DoS module.  Searching metasploit for "nsf" also doesn't seem to point to any promising results.

After a bit of digging (and using rpcinfo and showmount), I determined that it was unlikely that nsf was actually running on this system.
<h1>Web Application</h1>
Since port 80 is open, lets turn our attention there.  Visiting our target's IP address in a browser reveals a simple blog.

<img class="alignnone wp-image-45" src="http://koskilla.com/admin/wp-content/uploads/2018/09/Screen-Shot-2018-09-17-at-11.42.12-PM-1024x925.png" alt="" width="820" height="741" />

Based on our nmap scan, we also know that the webserver is Apache 2.4.10, which was released on July 21, 2014.  I couldn't find anything obvious that would make this exploitable.

I tried finding the admin portal to this blog by visiting http://10.0.1.137/admin, which showed a file tree with a notes.txt file (Security Misconfiguration)!

<img class="alignnone wp-image-59" src="http://koskilla.com/admin/wp-content/uploads/2018/09/Screen-Shot-2018-09-18-at-12.26.17-PM-1024x379.png" alt="" width="820" height="304" />

&nbsp;

And the notes.txt file contained a username and password:

<img class="alignnone wp-image-47" src="http://koskilla.com/admin/wp-content/uploads/2018/09/Screen-Shot-2018-09-17-at-11.49.58-PM-1024x282.png" alt="" width="820" height="225" />
<h1>SSH</h1>
We also know from the nmap scan that port 22 is open, so lets try using this password we found to get in through ssh.  A few tries at root didn't get anywhere, but since this user's name could be ted (based on the password), trying ted@10.0.1.137 with the password found in notes.txt worked!

<img class="alignnone wp-image-48" src="http://koskilla.com/admin/wp-content/uploads/2018/09/Screen-Shot-2018-09-17-at-11.55.37-PM-1024x336.png" alt="" width="820" height="269" />

After some digging, I couldn't find any flags as ted, but some directories are only accessible with root.
<h1>Privilege Escalation</h1>
I was unable to figure out privilege escalation on my own, so I referenced <a href="https://medium.com/@ikuamike/toppo-1-vulnhub-vm-writeup-6ef37586345e">@ikuamike write-up on Medium</a>.  They used LinEnum.sh to check for local privilege escalation, so I downloaded and ran it:
<pre>wget https://raw.githubusercontent.com/rebootuser/LinEnum/master/LinEnum.sh

sh LinEnum.sh -s 12345ted123</pre>
and confirmed that it finds that ted can run awk as root with no password.

<img class="alignnone wp-image-53" src="http://koskilla.com/admin/wp-content/uploads/2018/09/Screen-Shot-2018-09-18-at-12.10.14-PM-1024x518.png" alt="" width="820" height="415" />

In the future, I can always just look at the /etc/sudoers file to check for this.

<img class="alignnone wp-image-57" src="http://koskilla.com/admin/wp-content/uploads/2018/09/Screen-Shot-2018-09-18-at-12.24.42-PM-1024x214.png" alt="" width="820" height="171" />

awk can then be used to write a simple program to run system commands:
<pre>awk 'BEGIN {system("COMMAND_HERE")}'</pre>
Using this, we can look at the files in the root directory, where we find flag.txt!  And then running cat on the file gives us the contents and our flag.

&nbsp;

<img class="alignnone wp-image-56" src="http://koskilla.com/admin/wp-content/uploads/2018/09/Screen-Shot-2018-09-18-at-12.23.30-PM-1024x649.png" alt="" width="820" height="520" />
<h1>Learnings from other write-ups</h1>
Another tool that @ikuamike referenced was a web server scanner called nikto, which is installed on Kali by default.

Running nikto on the target would have removed some of the guess work when trying to find interesting URLs on the blog.

<img class="alignnone wp-image-62" src="http://koskilla.com/admin/wp-content/uploads/2018/09/Screen-Shot-2018-09-18-at-12.36.44-PM-1024x582.png" alt="" width="820" height="466" />

&nbsp;