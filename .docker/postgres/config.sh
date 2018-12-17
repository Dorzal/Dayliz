#!/bin/bash
set -e

sed -ri "s/#log_statement = 'none'/log_statement = 'all'/g" /var/lib/postgresql/data/pgdata/postgresql.conf
sed -ri "s/#logging_collector = 'Off'/logging_collector = 'On'/g" /var/lib/postgresql/data/pgdata/postgresql.conf