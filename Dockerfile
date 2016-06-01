FROM ubuntu:14.04.4
RUN apt-get update;
RUN apt-get install php5-common php5 php5-mcrypt php5-gd php5-mysql supervisor mysql-server nginx -yqq
RUN apt-get install php5-fpm -yqq
RUN rm -f /etc/nginx/sites-enabled/*
ADD site.conf /etc/nginx/sites-enabled/site.conf
ADD code /var/www/html
RUN /usr/sbin/mysqld & \
    sleep 10s &&\
    echo "GRANT ALL ON *.* TO sermin@'%' IDENTIFIED BY '1234' WITH GRANT OPTION; FLUSH PRIVILEGES;" | mysql &&\
    echo "create database server" | mysql && \
    mysql -u 'sermin' -p'1234' server < /var/www/html/server.sql
WORKDIR /var/www/html
