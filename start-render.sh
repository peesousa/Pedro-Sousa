#!/bin/sh
set -e

echo "Limpando cache de configuração..."
php artisan config:clear

echo "Executando migrações do banco de dados..."
php artisan migrate --force

echo "Iniciando o servidor Apache..."

apache2-foreground
