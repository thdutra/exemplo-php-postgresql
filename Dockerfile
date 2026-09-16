FROM debian:trixie

RUN apt-get update && apt-get -y upgrade
RUN apt-get install -y apache2 libapache2-mod-php php-pgsql

EXPOSE 80

COPY ./*.php /var/www/html/

CMD ["apache2ctl", "-D", "FOREGROUND"]
