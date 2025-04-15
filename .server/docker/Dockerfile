FROM php:8.4-fpm

# Setup UID/GID build arguments
ARG APP_UID=1000
ARG APP_GID=1000

# Install PHP extensions
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions amqp bcmath gd intl opcache pdo_mysql pdo_pgsql sockets xsl zip xdebug pcov

# Enable and configure xdebug
RUN docker-php-ext-enable xdebug && \
    echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create custom user and group to match host
RUN groupadd -g ${APP_GID} appgroup && \
    useradd -u ${APP_UID} -g appgroup -m appuser

# Set working directory
WORKDIR /app
RUN chown -R appuser:appgroup /app


#### This is project specific ####

# Composer install
#RUN composer install --prefer-dist --no-scripts --no-interaction
# Copy the entrypoint script
COPY --chown=root:root ./.server/docker/entrypoint.sh /usr/local/bin/entrypoint.sh
# Ensure the entrypoint script is executable
RUN chmod +x /usr/local/bin/entrypoint.sh
# Use the entrypoint script
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

CMD ["php-fpm"]

USER appuser

