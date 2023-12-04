# Lost and Found

## Run Docker

Install Docker: https://docs.docker.com/get-docker/
Install Docker Compose: https://docs.docker.com/compose/install/

```bash
# Start Docker (build and run the docker container)
$ docker-compose up -d

# Stop Docker (stop and remove the docker container)
$ docker-compose down
```

## Connect to MySQL in the command line (terminal)

```bash
# Connect to the docker container
$ docker-compose exec db bash
$ mysql -u root -p
```
