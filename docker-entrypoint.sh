#!/bin/bash
set -e

if pidof apache2 > /dev/null; then
    echo "Stopping existing Apache processes..."
    kill -9 $(pidof apache2)
fi

exec "$@"
