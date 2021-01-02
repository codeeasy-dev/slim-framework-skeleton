<h1 align="center">
    Slim Framework Skeleton by Code Easy<br/>
</h1>

<p align="center">Uma maneira simples de começar com o Slim Framework tendo o mínimo necessário.</p>

<p align="center">
    <img src="https://img.shields.io/github/license/codeeasy-dev/slim-framework-skeleton" alt="license">
</p>

## TABELA DE CONTEÚDOS

* [Sobre](#sobre)
* [Status do Projeto](#status-do-projeto)
* [Funcionalidades](#funcionalidades)
* [Pré-requisitos](#pré-requisitos)
* [Como Rodar a Aplicação/Testes](#como-rodar-a-aplicaçãotestes)
    1. [Download](#1-download)  
        1.1. [Composer](#11-composer)  
        1.2. [Github (Download Manual)](#12-github-download-manual)  
    2. [Configurações](#2-configurações)  
    3. [Executando](#3-executando)  
        3.1. [PHP](#31-php)  
        3.2. [Docker](#32-docker)  
    4. [Dicas para o Docker](#4-dicas-para-o-docker)  
    5. [Testes](#5-testes)  
* [Tecnologias Utilizadas](#tecnologias-utilizadas)
* [Contribuição](#contribuição)
* [Autor](#autor)
* [Licensa](#licensa)

---

## SOBRE

O "Slim Framework Skeleton by Code Easy" é um esqueleto de uma aplicação com o Slim Framework que tem o objetivo de trazer o mínimo necessário para desenvolver uma aplicação com o Slim Framework já configurada incluindo:

* Uma linguagem de template;
* Injeção de dependências;
* Testes automatizados;
* Estrutura de diretórios;
* Dotenv;
* Um projeto configurado com a arquitetura MVC;
* Containers através do Docker.

**OBS**: A única camada do MVC que não foi implementada é o Model pelo fato de que, para cada tipo de armazenamento, seja um banco de dados SQL, um arquivo, algum tipo de banco de dados NoSQL, entre outros, existe uma implementação diferente, além de que, uma aplicação ou um site com o mínimo necessário, pode nem mesmo precisar de um banco de dados as vezes.

---

## STATUS DO PROJETO

* 🚧 Helpers para testes automatizados: Em construção 🚧
* ⛔ Slim CSRF: Não iniciado ⛔
* ⛔ Manual de Contribuição: Não iniciado ⛔

---

## FUNCIONALIDADES

* Testes automatizados com o PHP Unit. Os testes estão localizados no diretório `tests/` e são configurados em `phpunit.xml`;
* Análise estática de código com o Psalm;
* Kernel da aplicação onde tudo é iniciado e configurado, localizado em `src/Kernel/Server.php`;
* Provedor de Serviços, funciona com o PHP-DI e fica localizado em `src/Kernel/Provider.php`, local esse onde é possível realizar as injeções de dependências no Slim Framework;
* Middlewares localizados em `src/Http/Middleware` e configurados em `src/Kernel/Middleware.php`;
* Sistema de rotas construído em `src/Routes` e invocados em `src/Kernel/Server.php`;
* Controllers construídos em `src/Http/Controller` e invocados em `src/Routes`;
* Área de Serviços (Services) que podem ser construídos para a sua aplicação e injetados pelo Provedor de Serviços;
* Linguagem de template Twig:
    * Os arquivos Twig se encontram no diretório `resources/view/`;
    * O serviço do Twig se encontra no diretório `src/Service/Twig` bem como as suas configurações;
    * Dentro do serviço do Twig já tem uma estrutura pronta para você configurar as suas próprias funções e filtros do Twig;
    * Possui um sistema de cache sendo que o cache fica armazenado em `cache/twig`.
* Helpers personalizados que podem ser constrídos em `config/helpers.php`;
* Diretório public com arquivos prontos para a publição de um site com foco no SEO.

---

## PRÉ-REQUISITOS

Para utilizar esse esqueleto os requisito são:

* PHP 7.4 ou superior;
* Composer (De preferência a versão 2, mesma utilizada na criação desse projeto);
* Docker e Docker Compose (Opcional).

---

## COMO RODAR A APLICAÇÃO/TESTES

#### 1. Download

> **OBS:** Problemas na execução do composer podem ocorrer caso esteja faltando algum módulo a ser instalado no seu PHP.

##### 1.1. Composer

Você deve baixar o esqueleto como um novo projeto através do composer com o comando `composer create-project codeeasy/slim-framework-skeleton <nome-do-projeto>`.

Você também pode escolher uma das versões e executar o comando `composer create-project "codeeasy/slim-framework-skeleton:v0.0.3" <nome-do-projeto>`, por exemplo, alterando a `v0.0.3` pela versão desejada.

As versões se encontram no link a seguir:

* Packagist: https://packagist.org/packages/codeeasy/slim-framework-skeleton

##### 1.2. Github (Download Manual)

Acesse o seguinte link:

* Github Releases: https://github.com/codeeasy-dev/slim-framework-skeleton/releases

Aqui você terá todas as versões do projeto, da mais recente à mais antiga, é só você escolher uma e baixar o `.zip` ou o `.tar.gz` e depois descompactar.

Por fim, acesse o diretório descompactado e execute o comando `composer install` para instalar as dependências.

---

#### 2. Configurações

Copie o arquivo `.env.example` para `.env` e preencha com os dados necessários, se necessário.

---

#### 3. Executando

##### 3.1 PHP

Se for usar o PHP que está instalado na sua máquina então execute o comando `php -S 0.0.0.0:<SUA-PORTA> -t public` como por exemplo `php -S 0.0.0.0:8080 -t public`, depois acesse o seu navegador com o link `http://localhost:<PORTA_ESCOLHIDA>`, se aparecer o site então é porque está tudo pronto, agora é só começar a programar.

##### 3.2 Docker

Se for usar o docker acesse o arquivo `dockerfile` e altere os conteúdos da linha 2 a linha 6.

```dockerfile
ARG USER=demo
ARG UID=1000
ARG GID=1000
ARG PW=demo
```

Aqui você pode alterar `USER=demo` por um outro nome de usuário como `USER=codeeasy` por exemplo e também alterar a senha de `PW=demo` para outra como `PW=1234`.

O `UID` e o `GID` estão relacionados ao ID do usuário e o ID do grupo numa distribuição linux, se você estiver usando uma distribuição linux você pode colocar os mesmos IDs que o seu usuário e grupo para evitar problemas de permissão de arquivos.

Para descobrir os IDs de usuário e grupo, repectivamente, na sua distribuição linux execute no terminal o comando `echo $(id -u) $(id -g)` e os dois IDs serão mostrados.

É claro que você também pode colocar qualquer outro ID.

No Windows o sistema de arquivos funciona diferente então você pode colcoar qualquer ID ou deixar o padrão de `1000 1000`.

Depois você pode acessar o `docker-compose.yml` e alterar a porta padrão que está como `8080`, se desejar, para isso basta alterar **APENAS UMA** das portas para a porta desejada como é mostrado a baixo.

```yml
ports:
    - <PORTA-A-SER-ALTERADA>:8080
```

Exemplo alterando para a porta 8085:

```yml
ports:
    - 8085:8080
```

Também é possível alterar o nome do container como é mostrado a baixo:

```yml
services:
  web:
    build: .
    container_name: <NOME-DO-CONTAINER>
```

Depois disso execute o comando `docker-compose up -d` para montar a imagem e criar o container.

Execute o comando `docker-compose ps` para verificar se o container está em execução e se aparecer `State Up` e `Ports 0.0.0.0:8080-><PORTA-ESCOLHIDA>/tcp` então o container está funcionando.

Por fim acesse no seu navegador a URL `http://localhost:<PORTA-ESCOLHIDA>`, se aparecer o site então é porque está tudo pronto, agora é só começar a programar.

---

#### 4. Dicas para o Docker

Se você estiver usando o docker segue algumas dicas de comandos para serem utilizados:

* `docker-compose ps`: Verifica o status dos containers especificados no arquivo `docker-compose.yml`;
* `docker-compose up -d`: Faz o build da imagem do `dockerfile`, caso não exista o build ainda, e cria os containers;
* `docker-compose build`: Faz o build da imagem do dockerfile;
* `docker-compose down`: Destrói os containers especificados no `docker-compose.yml`;
* `docker-compose stop`: Para a execução dos containers especificados no `docker-compose.yml`;
* `docker-compose start`: Inicia a execução dos containers especificados no `docker-compose.yml` caso os containers já tenham sido criados;
* `docker exec -it <NOME-DO-CONTAINER> /bin/bash`: Acessa o terminal de um container em específico usando o bash.

---

#### 5. Testes

##### 5.1 PHP Unit

Todos os testes se encontram dentro do diretório `tests/`.

Para executar os testes automatizados execute o comando `vendor/bin/phpunit`.

##### 5.2 Psalm

Para executar os testes execute o comando `vendor/bin/psalm --show-info=true`.

---

## TECNOLOGIAS UTILIZADAS

* [PHP 7.4^](https://www.php.net/)
* [Slim Framework 4](https://www.slimframework.com/)
* [Guzzle Http](https://docs.guzzlephp.org/en/stable/)
* [PHP Unit](https://phpunit.de/)
* [Twig](https://twig.symfony.com/)
* [PHP DI](https://php-di.org/)
* [Psalm](https://psalm.dev/)
* [PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer)
* [PHP DotEnv](https://github.com/vlucas/phpdotenv)
* [Docker](https://www.docker.com/)

---

## CONTRIBUIÇÃO

<table>
  <tr>
    <td align="center"><a href="https://github.com/frv-dev"><img src="https://avatars.githubusercontent.com/u/20212780?v=3" width="100px;" alt=""/><br /><sub><b>Felipe Vieira</b></sub></a><br /><a href="https://github.com/codeeasy-dev/slim-framework-skeleton/commits?author=frv-dev" title="Code">💻</a></td>
  </tr>
</table>

---

## AUTOR

<a href="https://github.com/frv-dev">
    <img src="https://avatars.githubusercontent.com/u/20212780?v=3" width="100px;" alt=""/>
    <br />
    <sub>
        <b>Felipe Vieira</b>
    </sub>
</a>

<br/>

[![Linkedin Badge](https://img.shields.io/badge/-Felipe%20Renan%20Vieira-blue?logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/felipe-renan-vieira/)](https://www.linkedin.com/in/felipe-renan-vieira/)
[![Gmail Badge](https://img.shields.io/badge/-feliperenanvieira%40gmail.com-red?logo=Gmail&logoColor=white&link=mailto:feliperenanvieira@gmail.com)](mailto:feliperenanvieira@gmail.com)
