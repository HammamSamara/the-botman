<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects., such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

## Setup the-botman Project

This project is configured to work with docker (aka dockerized).
Meaning you don't have to have the Laravel environment setup locally on your machine.
However if you favor to work with Laravel without docker, you can find [here](https://laravel.com/docs/5.6/installation#installation) the installation requirements

### Getting started

- [x] if you don't have `git` yet, please follow the [offical guide](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git) to install it.
If you already have git installed, please skip to the next step.

- [x] Install [Docker](https://www.docker.com/community-edition) from docker offical page.

- [x] clone the repository `git clone --recursive git@github.com:HammamSamara/the-botman.git`
- [x] change directory to the project folder `cd the-botman`
- [x] copy the env file `cp .env.example .env`
- [x] change directory to laradock folder `cd laradock`
- [x] copy the env file `cp .env.example .env`
- [x] Now setup and run the project `docker-compose up -d nginx mysql phpmyadmin`
- [x] accessing the workspace:
	- `docker-compose exec workspace shell`
- [x] run composer `composer install`

## Contributing (Later in the session)

- Checkout botman branch
	- `git fetch`
	- `git checkout botman`
	- Start adding conversations!
