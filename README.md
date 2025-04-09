# Laravel 12 crud_sail_docker_vue3

A simple webapp to demonstrate laravel 12 shadcn starter kit, sail/docker, Simple CRUD.

## Recommended IDE Setup

[VSCode](https://code.visualstudio.com/) + [Volar](https://marketplace.visualstudio.com/items?itemName=Vue.volar) (and disable Vetur).

## Customize configuration

See [Vite Configuration Reference](https://vite.dev/config/).

## Ready The Environment Vasriable File

   1. create file .env
   2. copy the content of file .env.example
   3. paste it to the new created .env file

## Project Setup

```sh
npm install
```

### Compile and Minify for Production

```sh
npm run build
```

## Setup Sail/Docker (WSL2)

Install first [make]

```sh
make up
```

### Migration In Sail/Docker (WSL2)

```sh
make migrate
```

### Shut down Sail/Docker (WSL2)

```sh
make down
```

### Compile and Hot-Reload for Development

```sh
npm run serve
```

### Lint with [ESLint](https://eslint.org/)

```sh
npm run lint
```
