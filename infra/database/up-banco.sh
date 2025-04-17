#!/bin/bash
docker run --name postgres-container \
  -e POSTGRES_PASSWORD=qN6m39doREM4O7YBBy \
  -e POSTGRES_USER=postgres \
  -p 5432:5432 \
  -v pgdata:/var/lib/postgresql/data \
  -d postgres

