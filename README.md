# slim-sample-app

A sample app using:

- Slim
- Docker
- ElasticSearch
- MySQL
- Doctrine
- PHP7
- Swagger

# Environment versions

- Docker Engine: 18.03.1-c
- Docker Compose: 3.6


# Instructions

In your `host machine`:

```
docker-compose up -d
```

## Using composer:

Inside `slim_app` container:

```
docker container exec -it slim_app bash
```

Download composer:

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

Run composer

```
docker container exec -it slim_app composer install 
```

# Helpful commands

Testing Elasticsearch access:
 
```
docker container exec -it slim_app curl slim_elasticsearch:9200
```

Remove dangling images:

```
docker rmi $(docker images -q -f dangling=true)
```

# Run cli application

Inside `slim_app` container:

```
php composer.phar start
```

to create DB schema:

```
php cli-config.php orm:schema-tool:create
```

# Test application

```
php composer.phar test
```