FROM wordpress:latest

RUN apt-get update && apt-get install -y \
    vim \
    && rm -rf /var/lib/apt/lists/*

COPY wp-config.php /var/www/html/wp-config.php

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html

COPY ecslandingdev-feelme.conf /etc/apache2/sites-available/ecslandingdev-feelme.conf

RUN a2dissite 000-default.conf && a2ensite ecslandingdev-feelme.conf

RUN a2enmod rewrite

ENV WORDPRESS_DB_HOST=${WORDPRESS_DB_HOST}
ENV WORDPRESS_DB_USER=${WORDPRESS_DB_USER}
ENV WORDPRESS_DB_PASSWORD=${WORDPRESS_DB_PASSWORD}
ENV WORDPRESS_DB_NAME=${WORDPRESS_DB_NAME}

RUN chown -R www-data:www-data /var/www/html
RUN chmod 755 /var/www/html

RUN mkdir -p /var/www/html/wp-content/uploads && \
    chown -R www-data:www-data /var/www/html/wp-content/uploads

EXPOSE 80

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh

RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["docker-entrypoint.sh"]

CMD ["apache2-foreground"]
