FROM postgres:11

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
    dos2unix \
    && rm -r /var/lib/apt/lists/*

ADD config.sh /docker-entrypoint-initdb.d/
RUN chmod +x /docker-entrypoint-initdb.d/config.sh
RUN dos2unix /docker-entrypoint-initdb.d/config.sh