run:

seed:
	docker compose run --rm php-cli php artisan db:seed
fresh:
	docker compose run --rm php-cli php artisan migrate:fresh

start-worker:
	docker compose run --rm php-cli php artisan queue:work

