# Laravel 11 Breeze + Vue 3 + Inertia Application

Esta é uma aplicação Laravel 11 que utiliza o sistema de autenticação Breeze para autenticação, Vue 3 para renderização de componentes do lado do cliente e Inertia.js para criar single-page apps de forma simples, mantendo o fluxo tradicional de desenvolvimento do Laravel.

## Requisitos

Certifique-se de ter os seguintes requisitos instalados em sua máquina local:

- PHP >= 8.3
- Composer
- Node.js >= 20.x
- NPM >= 10.x
- Docker (Opcional, se desejar usar Sail para executar a aplicação)

## Configuração do Ambiente de Desenvolvimento

### Instalação Local

1. Clone este repositório em sua máquina local:

    ```bash
    git clone https://github.com/lucasdauto/meu-campeonato-trade-tech.git
    ```

2. Navegue até o diretório do projeto:

    ```bash
    cd meu-campeonato-trade-tech
    ```

3. Instale as dependências do Composer:

    ```bash
    composer install
    ```

4. Instale as dependências do NPM:

    ```bash
    npm install
    ```

5. Copie o arquivo de ambiente de exemplo e configure suas variáveis de ambiente:

    ```bash
    cp .env.example .env
    ```

6. Gere a chave de aplicativo:

    ```bash
    php artisan key:generate
    ```

7. Execute as migrações do banco de dados (certifique-se de ter configurado corretamente seu banco de dados no arquivo `.env`):

    ```bash
    php artisan migrate
    ```
8. Rode as migrações do banco de dados
    
    ```bash
    php artisan db:seed
    ```
9. Inicie o servidor do front-end

    ```bash
    npm run serve
    ```
10. Inicie o servidor de desenvolvimento:

    ```bash
    php artisan serve
    ```

Acesse a aplicação em `http://localhost:8000`.

### Usando Laravel Sail

Sail é um ambiente de desenvolvimento para Laravel usando Docker. Se você preferir executar a aplicação usando Sail, siga estas etapas:

1. Clone este repositório em sua máquina local (se já clonou, ignore esta etapa):

    ```bash
    git clone https://github.com/seu-usuario/meu-campeonato-trade-tech.git
    ```

2. Navegue até o diretório do projeto:

    ```bash
    cd meu-campeonato-trade-tech
    ```

3. Copie o arquivo de ambiente de exemplo e configure suas variáveis de ambiente:

    ```bash
    cp .env.example .env
    ```

4. Execute o comando Sail para iniciar o ambiente Docker:

    ```bash
    ./vendor/bin/sail up -d
    ```

5. Execute as migrações do banco de dados (certifique-se de ter configurado corretamente seu banco de dados no arquivo `.env`):

    ```bash
    ./vendor/bin/sail artisan migrate && ./vendor/bin/sail artisan db:seed
    ```
6. Execute as seeds do banco de dados:

    ```bash
    ./vendor/bin/sail artisan db:seed
    ```


7.  Compilar assets para desenvolvimento

    ```bash
    ./vendor/bin/sail npm run dev
    ```

Acesse a aplicação em `http://localhost`.

## Desenvolvimento

Para desenvolver a aplicação, você pode usar os seguintes comandos:

- Compilar assets para desenvolvimento:

    ```bash
    npm run dev
    ```

- Compilar e minificar assets para produção:

    ```bash
    npm run prod
    ```

- Observar alterações nos arquivos e compilar automaticamente:

    ```bash
    npm run watch
    ```

- Executar testes PHPUnit:

    ```bash
    php artisan test
    ```

## Documentação Adicional

Para obter mais informações sobre como desenvolver com Laravel, consulte a [documentação oficial do Laravel](https://laravel.com/docs).

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir uma issue ou enviar um pull request.

## Licença

Este projeto está licenciado sob a [Licença MIT](LICENSE).
