# Lost and Found

## 1. About the project

This is a web application for lost and found items. Users can post items that they have lost or found. Other users can comment on the items. The application is built with PHP and MySQL.

## 2. Tech Stack

- Frontend:
  - Language: HTML, CSS, JavaScript
  - Framework: Bootstrap 5
- Backend:
  - Language: PHP
  - Web Server: Apache
  - Database: MySQL
- DevOps:
  - Server: Linux (Ubuntu)
  - Containerization: Docker
  - Reverse Proxy: Nginx
  - CI/CD: GitHub Actions

## 3. Run the project (production) with Docker

1. Install Docker and Docker Compose

Install Docker: https://docs.docker.com/get-docker/  
Install Docker Compose: https://docs.docker.com/compose/install/

2. Run the following commands:

```bash
# Go to the project directory:
$ cd path/to/lost-and-found
# Pull the latest images specified in docker-compose.prod.yml:
$ docker-compose -f docker-compose.prod.yml pull
# Run the containers with Docker Compose in detached mode:
$ docker-compose -f docker-compose.prod.yml up -d
```

Note:
The website now is running on http://localhost:8081
If you didn't create the database and tables, you will see an error message.
To create the database and tables, check out the `db/README.md` file for instructions.

## 4. Run the project (development) with Docker

1. Install Docker and Docker Compose

Install Docker: https://docs.docker.com/get-docker/  
Install Docker Compose: https://docs.docker.com/compose/install/

2. Run the following commands:

```bash
# Build and run the docker container in detached mode
$ docker-compose up -d
# The project now is running on http://localhost
# Stop Docker (stop and remove the docker container)
$ docker-compose down
```

Note:
The website now is running on http://localhost
If you didn't create the database and tables, you will see an error message.
To create the database and tables, check out the `db/README.md` file for instructions.
