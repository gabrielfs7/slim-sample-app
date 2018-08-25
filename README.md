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

Initializing environment

```
docker-compose up -d
```

Running composer

```
docker container -it slim_app composer install 
```

Testing Elasticsearch access:
 
```
docker container exec -it slim_app curl slim_elasticsearch:9200
```

# Helpful commands

Remove dangling images:

```
docker rmi $(docker images -q -f dangling=true)
```