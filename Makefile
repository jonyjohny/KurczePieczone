.DEFAULT_GOAL := help
.RECIPEPREFIX +=

server: ## Start docker
    php artisan serve

start: ## Start docker
    docker-compose up -d

stop: ## Stop docker
    docker-compose stop

help:
  @grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "  \033[32m%-15s\033[0m %s\n", $$1, $$2}'
