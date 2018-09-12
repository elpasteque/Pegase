# Pégase

Pégase is an open-source management plateform for non-profit organizations.

The aim of Pégase is the simplification of the administratives procedures, by offering online processes. All the organization members can register online, pay their subscription, download and upload official documents, participate in projects, etc.


# Installation
Pégase works with PHP 7.1+, Apache 2 and a MySQL server (MariaDB). The Symfony 4 framework is used.

## RHEL7/CentOS7
PHP 7.1 is not provided in the default package repositories in RedHat distribution, so it's needed to use Software Collections.

Enable repository:

* On RHEL7: 

    `# subscription-manager repos --enable rhel-server-rhscl-7-eus-rpms`
    
* On CentOS 7: 

    `# yum install centos-release-scl`

Disable SELinux in `/etc/selinux/config` and reboot.

Install needed packages:

    # yum install httpd rh-php71-php rh-php71-php-common rh-php71-php-pdo rh-php71-php-xml unzip rh-php71-php-opcache.x86_64 sclo-php71-php-pecl-apcu-bc.x86_64 sclo-php71-php-pecl-xdebug.x86_64 mariadb.x86_64

Link new PHP config file to Apache configuration:

    # ln -s /opt/rh/httpd24/root/etc/httpd/conf.d/rh-php71-php.conf /etc/httpd/conf.d/
    # ln -s /opt/rh/httpd24/root/etc/httpd/conf.modules.d/15-rh-php71-php.conf /etc/httpd/conf.modules.d/
    # ln -s /opt/rh/httpd24/root/etc/httpd/modules/librh-php71-php7.so /etc/httpd/modules/

Set timezone (example for France) in `/etc/opt/rh/rh-php71/php.ini`:

    date.timezone = Europe/Paris

Restart Apache to apply:

    # systemctl restart httpd

Add the PHP executable to bin directory:

    # ln -s /opt/rh/rh-php71/root/bin/php /bin/php

Install Composer:

    # php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    # php composer-setup.php --install-dir=/bin
    # php -r "unlink('composer-setup.php');"

Add rules to the internal firewall:

    # firewall-cmd --add-service=http --permanent
    # firewall-cmd --add-service=https --permanent
    # systemctl restart firewalld

Enable and start MariaDB server:

    # systemctl enable mariadb.service
    # systemctl start mariadb.service

Secure the database with first wizard:

    # mysql_secure_installation
    
Configure the user and the database:

    # mysql -u root -p
    
    > CREATE USER 'pegase'@'localhost' IDENTIFIED BY 'p@ssw0rd';    
    > CREATE DATABASE pegase;
    > GRANT ALL PRIVILEGES ON pegase.* TO 'pegase'@'localhost';
    > FLUSH PRIVILEGES;
    
## Debian / Ubuntu
### *todo*
