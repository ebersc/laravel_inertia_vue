# Inertia Vue

Projeto Laravel 12 + Inertia.js + Vue 3 desenvolvido acompanhando a playlist do curso [Laravel + Inertia + Vue](https://www.youtube.com/playlist?list=PLyugqHiq-SKcNWoXhsln0tsNxI2liw3D-).

O foco deste repositório é praticar uma aplicação web com autenticação, listagem e cadastro de usuários, usando o fluxo tradicional do Laravel no backend e páginas Vue no frontend.

## Stack

- Laravel 12
- PHP 8.2
- Inertia.js 3
- Vue 3
- Vite
- Boostrap
- PostgreSQL

## Funcionalidades

- Login com sessão
- Listagem de usuários
- Cadastro de usuários
- Exclusão de usuários
- Estrutura Inertia com páginas em `resources/js/Pages`

## Requisitos

- PHP 8.2+
- Composer
- Node.js 20+
- PostgreSQL

## Instalação

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

## Executando o projeto

```bash
composer run dev
```

Esse comando sobe o Laravel, a fila e o Vite no mesmo terminal.

Se preferir rodar separado:

```bash
php artisan serve
npm run dev
```

## Testes

```bash
php artisan test
```

## Observações

- O usuário autenticável está em `app/Models/User.php`.
- O login é tratado em `app/Http/Controllers/LoginController.php`.
- As telas principais ficam em `resources/js/Pages/Auth` e `resources/js/Pages/Users`.

