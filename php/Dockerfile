FROM php:7.4.22-fpm
# composer に必要なパッケージ
RUN apt-get update \
&& apt-get install -y zlib1g-dev \
&& apt-get install -y libzip-dev \
&& docker-php-ext-install zip \
&& apt-get install -y unzip \
# PHP-GD
&& apt-get install -y libpq-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
&& docker-php-ext-configure gd --with-freetype --with-jpeg \
&& docker-php-ext-install -j$(nproc) gd
# php設定ファイルの適用
COPY php.ini /usr/local/etc/php/

COPY --from=composer:2.1.5 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

# npmとnodejsのインストール
# RUN apt-get install -y nodejs npm && npm install n -g && n stable && apt-get purge -y nodejs npm
# laravelを新規でインストールできるコマンド
RUN composer global require "laravel/installer" 
