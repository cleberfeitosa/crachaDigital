# Crachá Digital

![Amount Languages](https://img.shields.io/github/languages/count/cleberfeitosa/crachaDigital?logoColor=red&style=for-the-badge)
![Top Language](https://img.shields.io/github/languages/top/cleberfeitosa/crachaDigital?style=for-the-badge)
![Code size](https://img.shields.io/github/repo-size/cleberfeitosa/crachaDigital?style=for-the-badge)
![github](https://user-images.githubusercontent.com/72306241/233846544-aaeb3fda-39a4-41c3-a6d7-2089d19ab753.png)

## Sobre

O Crachá digital é um projeto, que tem como objetivo digitalizar o processo de liberação de alunos do Instituto Federal de Mato Grosso (IFMT), Campus Rondonópolis.

## Ferramentas 🛠

As seguintes ferramentas são utilizadas no projeto:

- ReactJS
- Typescript
- PHP
- Laravel
- PostgresSQL

## Como rodar o projeto

### API

1. Instale as dependências do Laravel
   ```bash
   composer install
   ```
2. Crie o arquivo .env
   ```bash
   touch .env
   ```
3. Inicie o container do banco de dados
   ```shell
   docker compose up
   ```
4. Rode as migrations
   ```shell
   php artisan migrate
   ```
5. Rode a seed para popular o banco de dados
   ```shell
   php artisan db:seed --class=DatabaseSeeder
   ```
6. Inicie a API
   ```shell
   php artisan serve
   ```
7. Inicie a fila de Jobs
   ```shell
   php artisan queue:work
   ```
