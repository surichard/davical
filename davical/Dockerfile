FROM php:7.2-fpm

RUN apt-get update && apt-get install -y libpq-dev libc-client-dev libkrb5-dev libyaml-perl libdbd-pg-perl \
    && docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-install -j$(nproc) pdo pdo_pgsql pgsql imap gettext calendar \
    && rm -rf /var/lib/apt/lists/*

ENV DAVICAL_VERSION=1.1.9.3 \
    AWL_VERSION=0.60 \
    DAVICAL_ADMIN_EMAIL='' \
    DAVICAL_ADMIN_DB_USER='davical_dba' \
    DAVICAL_ADMIN_DB_PASS='' \
    DAVICAL_ADMIN_DB_HOST='' \
    DAVICAL_ADMIN_DB_NAME='davical' \
    DAVICAL_ADMIN_DB_PORT='5432' \
    DAVICAL_APP_DB_USER='davical_app' \
    DAVICAL_APP_DB_PASS='' \
    DAVICAL_ENABLE_AUTO_SCHEDULE='true'

RUN curl -o /usr/share/davical.tar.gz https://gitlab.com/davical-project/davical/repository/archive.tar.gz?ref=r${DAVICAL_VERSION} \
    && curl -o /usr/share/awl.tar.gz https://gitlab.com/davical-project/awl/repository/archive.tar.gz?ref=r${AWL_VERSION} \
    && cd /usr/share && tar -xzvf davical.tar.gz && tar -xzvf awl.tar.gz && rm *.tar.gz && mv awl-* awl && mv davical-* davical

ADD config.php /etc/davical/
