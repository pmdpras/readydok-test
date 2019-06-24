
FROM 1and1internet/ubuntu-16-nginx-php-7.1

#install ekstensi php
RUN apt-get install -y php7.1-mysqli

# Copy the nginx config file
COPY ./docker/gabung/nginx.conf /etc/nginx/conf.d/default.conf

RUN echo "localhost localhost.localdomain" >> /etc/hosts

RUN apt-get install -y \
    --no-install-recommends \
    locales \
    && sed -i 's/# en_US.UTF-8 UTF-8/en_US.UTF-8 UTF-8/g' /etc/locale.gen \
    && sed -i 's/# id_ID.UTF-8 UTF-8/id_ID.UTF-8 UTF-8/g' /etc/locale.gen \
    && locale-gen en_US.UTF-8 id_ID.UTF-8

ENV LANG en_US.UTF-8
ENV LANGUAGE en_US:en
ENV LC_ALL en_US.UTF-8

#install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#install git
RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git

#install npm
#RUN apt-get update
#RUN apt-get -y install curl gnupg
#RUN curl -sL https://deb.nodesource.com/setup_11.x  | bash -
#RUN apt-get -y install nodejs
#RUN npm install

WORKDIR /var/www

#COPY ./docker/gabung/php-fpm.conf /etc/php/7.2/fpm/pool.d/www.conf
COPY ./docker/gabung/nginx.conf /etc/nginx/conf.d/default.conf
COPY ./docker/gabung/zz-docker.conf /etc/php/7.1/fpm/pool.d/zz-docker.conf

COPY . /code

VOLUME ["/code"]