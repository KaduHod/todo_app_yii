# 📝 Todo List - Yii Framework

Este é um simples aplicativo de Todo List criado com o [Yii Framework](https://www.yiiframework.com/) com o objetivo de estudar e explorar os recursos oferecidos pelo framework.

## 🚀 Como subir o projeto

Certifique-se de ter o **Docker** e o **Docker Compose** instalados na sua máquina.
Para iniciar o projeto, execute:

```bash
docker-compose up --build
```

Esse comando irá iniciar três containers:

- **PHP-FPM 8.3.3**
- **Nginx**
- **PostgreSQL**

## ⚙️ Configuração

Antes de rodar o projeto, você precisa criar um arquivo `.env` na raiz com as seguintes variáveis:

```env
DB_HOST=yii-db
DB_NAME=postgres
DB_PWD={SUA_SENHA}
```

Substitua `{SUA_SENHA}` pela senha desejada para o banco de dados PostgreSQL.

## 👤 Usuário e Autenticação

Crie um **usuário**!. Com ele, é possível acessar o sistema e gerenciar suas tarefas.

## ✅ Funcionalidades

Com o usuário criado, você pode:

- Criar tarefas com:
  - Nome
  - Descrição
  - Status (Pendente ou Concluída)
  - Data prevista para finalização
- Listar, editar e excluir tarefas
- Funcionalidades básicas de um CRUD

## 📦 Tecnologias Utilizadas

- [Yii Framework](https://www.yiiframework.com/)
- PHP 8.3.3 (FPM)
- Nginx
- PostgreSQL
- Docker + Docker Compose

---

Desenvolvido com foco em aprendizado e experimentação com Yii Framework 🚧

