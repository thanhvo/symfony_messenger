FROM php:7.4-fpm-alpine 

RUN curl -sS https://getcomposer.org/installer | php -- \
--install-dir=/usr/bin --filename=composer

RUN apk update && apk add bash && apk add git && apk add openssh

RUN mkdir /home/gfg && cd /home/gfg 

#RUN git clone git@github.com:GFG/symfony_workers.git
COPY . /home/gfg/symfony_workers

RUN cd /home/gfg/symfony_workers && composer dump-autoload --optimize --no-dev --classmap-authoritative
