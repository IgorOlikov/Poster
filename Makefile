run:

seed:
	docker compose run --rm php-cli php artisan db:seed
fresh:
	docker compose run --rm php-cli php artisan migrate:fresh

