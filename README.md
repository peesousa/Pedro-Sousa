# Portfólio Pessoal - Pedro Sousa

Este é o repositório do meu site de portfólio pessoal, desenvolvido para mostrar meus projetos, compartilhar artigos no blog e facilitar o contato. A aplicação foi construída utilizando o ecossistema TALL (Tailwind CSS, Alpine.js, Laravel, e Livewire) e inclui um painel administrativo completo feito com Filament.

## ✨ Features

  * **Projetos:** Uma seção para exibir os projetos em que trabalhei, com descrições, tecnologias e links.
  * **Blog:** Um blog integrado para publicar aprendizados, curiosidades e conhecimentos gerais.
  * **Formulário de Contato:** Um formulário funcional para que visitantes possam enviar mensagens diretamente para mim.
  * **Design Responsivo:** Interface adaptável para uma ótima experiência em desktops, tablets e celulares.
  * **Suporte Multilíngue:** Conteúdo disponível em Português (pt-BR) e Inglês (en). (em desenvolvimento)
  * **Painel Administrativo:** Uma área de gerenciamento robusta construída com [Filament](https://filamentphp.com/) para gerenciar projetos, posts do blog e usuários.

## 🛠️ Tecnologias Utilizadas

A aplicação foi construída com as seguintes tecnologias:

  * **Backend:**
      * [PHP 8.3](https://www.php.net/)
      * [Laravel 12](https://laravel.com/)
  * **Frontend:**
      * [Livewire 3](https://livewire.laravel.com/)
      * [Alpine.js](https://alpinejs.dev/)
      * [Tailwind CSS](https://tailwindcss.com/)
      * [Vite](https://vitejs.dev/)
  * **Painel Administrativo:**
      * [Filament 3](https://filamentphp.com/)
  * **Banco de Dados:**
      * Compatível com MySQL / PostgreSQL

## 🚀 Instalação e Configuração Local

Siga os passos abaixo para executar o projeto em seu ambiente local.

**Pré-requisitos:**

  * PHP 8.3+
  * Composer
  * Node.js & NPM
  * Um banco de dados (ex: MySQL, PostgreSQL)

**Passos:**

1.  **Clone o repositório:**

    ```bash
    git clone https://github.com/peesousa/pedro-sousa.git
    cd pedro-sousa
    ```

2.  **Instale as dependências do PHP:**

    ```bash
    composer install
    ```

3.  **Instale as dependências do Node.js:**

    ```bash
    npm install
    ```

4.  **Configure o ambiente:**

      * Copie o arquivo de exemplo `.env.example` para um novo arquivo chamado `.env`.
        ```bash
        cp .env.example .env
        ```
      * Gere a chave da aplicação:
        ```bash
        php artisan key:generate
        ```
      * Configure as variáveis de ambiente no arquivo `.env`, principalmente as de conexão com o banco de dados (`DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).

5.  **Execute as migrações e os seeders:**

      * As migrações criarão as tabelas no banco de dados. Os seeders preencherão o banco com dados de exemplo.

    ```bash
    php artisan migrate --seed
    ```

6.  **Compile os assets do frontend:**

    ```bash
    npm run dev
    ```

7.  **Inicie o servidor de desenvolvimento:**

    ```bash
    php artisan serve
    ```

    A aplicação estará disponível em `http://127.0.0.1:8000`.

## 🔐 Painel Administrativo

O painel administrativo, construído com Filament, permite gerenciar o conteúdo do site.

  * **Acesso:** Navegue para `/admin` na URL da sua aplicação (ex: `http://127.0.0.1:8000/admin`).

  * **Criar um usuário administrador:**
    Para acessar o painel, você precisa de um usuário. Execute o comando interativo do Filament para criar um:

    ```bash
    php artisan make:filament-user
    ```

    Siga as instruções para definir o nome, email e senha do administrador. Após a criação, você poderá usar essas credenciais para fazer login.
