#!/usr/bin/env bash

set -e

docker compose build
docker compose up -d

docker compose exec composer composer update

docker compose exec apache bash -c 'if [ ! -d "./var" ]; then
  mkdir -p "var/logs"
fi

if [ ! -f "./var/bdd.db" ]; then
  sqlite3 ./var/bdd.db <documents/schema.sql
fi

chmod -R o+w "./var"

chmod -R o+w "./uploads"
'
