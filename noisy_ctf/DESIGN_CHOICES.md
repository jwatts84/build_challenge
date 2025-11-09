# What is this CTF?
The CTF I have created is something that you may find in the wild when when an app has been deployed with MySQL running on the same machine (or with a shared volume in a docker container).  

In such cases, we may find that MySQL can write to /var/www/html.
Combine that with a poorly sanitised SQL queries and naive WAF we have an realistic exploit path.
It is common to find legacy apps or neglected dev projects on a network.

## PHP Nginx MySQL on UBUNTU
This is a common stack seen in the wild. It also was the most efficient way to demonstrate the attack vector.


## Use of Docker containers and docker compose
I chose to use dockers and docker compose as suggested in the Build Challenge brief.


## Multiple containers use
I chose to use multiple containers, being one service per containter to follow the
recommended design patterns from Docker documentation.

## Challenges

### Docker security features

Docker has security features which restrict permissions between containers to access and read/write/execute files. I noted when I had
SQL user write php file to var/www/html, that www-data did not have read access, even when succesfully written to that location.

To overcome this, I set up a file-fixer script which polls the var/www/html file and updates permission on any new files within the folder. This overcome the docker container restrictions and allows 'other users' read privileges in /var/www/html.

I noted that I could have put all the services, MySQL and Nginx, php-app in one docker container, however that would have required additional setup with a supervisor or something similar.

Given the purpose is to simuate are OWASP 10 vulnerability, the scripts is reliable and suitable solution.








