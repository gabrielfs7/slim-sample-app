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

## Set up Swagger Codegen with Docker

In your `host machine`:

```
git clone https://github.com/swagger-api/swagger-codegen
cd swagger-codegen
./run-in-docker.sh mvn package
```

Now you can use `./run-in-docker.sh` as your **swagger-codegen-cli** to
generate HTML documentation for your OpenAPI 3.0 specification. Example:
 
Executes 'help' command for swagger-codegen-cli:
```
./run-in-docker.sh help
```

Executes 'langs' command for swagger-codegen-cli
```
./run-in-docker.sh langs
```

Builds the Go client:
```
./run-in-docker.sh /gen/bin/go-petstore.sh
```

Generates go client, outputs locally to ./out/go-petstore
```
./run-in-docker.sh generate -i ../swagger.yaml -l go -o /gen/out/slim_app -DpackageName=slim_app
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

# Test application

```
php composer.phar test
```