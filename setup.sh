#!/bin/bash

function info() {
  printf "\033[36m$1\033[m\n"
}

function fail() {
  printf "\033[31m$1\033[m\n"
}

function prepare_environment() {
  docker-compose build
  docker-compose up -d
  docker-compose run composer install
  docker-compose run nuxt yarn install
  docker-compose run admin yarn install
  docker-compose exec php chown -R www-data:www-data /var/www
  docker-compose exec php chmod 755 ./
  docker-compose exec php php artisan db:create
  docker-compose down
}

if ! type docker-compose &> /dev/null; then
  fail "  x Please install the Docker Compose."
  exit 1
fi

if docker-compose build; then
  info '  + Done building Docker Container.'
else
  fail '  x Failed to build Docker Image by Docker Compose.'
  fail "  x Check error messages and resolve the problem."

  exit 1
fi

if prepare_environment; then
  info '  + Done preparing environment.'
else
  fail "  x Check error messages and resolve the problem."
fi

info '  + Done to setup'
