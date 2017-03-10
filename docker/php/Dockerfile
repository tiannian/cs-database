FROM debian:jessie

MAINTAINER tiannian dtiannian@aliyun.com

RUN apt-get update && apt-get install php5 php5-fpm php5-pgsql -y --no-install-recommends

RUN apt-get autoremove && apt-get clean

RUN sed -i "s|listen = /var/run/php5-fpm.sock|listen = [::]:9000|g" /etc/php5/fpm/pool.d/www.conf

VOLUME /work

WORKDIR /work

EXPOSE 9000

CMD ["php5-fpm","-F"]