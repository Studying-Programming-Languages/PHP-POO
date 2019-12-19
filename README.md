# PHP PDO

docker run -d --rm --name postgresdb -v $(pwd)/database/:/docker-entrypoint-initdb.d/ -e POSTGRES_PASSWORD=R00t -e POSTGRES_DB=livro postgres:12-alpine
