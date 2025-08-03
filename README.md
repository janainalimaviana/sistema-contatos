# 📇 Sistema de Gerenciamento de Contatos

Este projeto é uma aplicação web simples para cadastro, listagem, edição e exclusão de contatos pessoais.  
Desenvolvido como atividade prática da disciplina **Programação para Internet II** – Curso de Sistemas de Informação.

---

## 🔧 Tecnologias Utilizadas

- **PHP** (API REST)
- **MySQL** (armazenamento dos contatos)
- **HTML, CSS e Bootstrap** (front-end)
- **JavaScript (fetch API)** para integração entre front e back

---

## 🎯 Funcionalidades

- ✅ Cadastro de contatos com: nome, telefone, e-mail, data de aniversário, categoria e observação
- ✅ Edição e exclusão
- ✅ Busca por nome
- ✅ Filtro por categoria (favorito, principal, outro)
- ✅ Layout com cards e ícones (responsivo com Bootstrap)

---

## 🗃️ Banco de Dados

**Banco:** `meubanco`  
**Tabela:** `contatos`  
**Campos:**

| Campo        | Tipo         |
|--------------|--------------|
| id           | int (PK, AI) |
| nome         | varchar(100) |
| telefone     | varchar(20)  |
| email        | varchar(100) |
| aniversario  | date         |
| categoria    | varchar(20)  |
| observacao   | text         |

---

## 📂 Estrutura do Projeto

sistema_contatos/
├── api-contatos/ ← API REST em PHP
├── front-contatos/ ← Interface visual (HTML/PHP/CSS)

---

## 📌 Como Executar

1. Instale o [Laragon](https://laragon.org) ou outro ambiente com PHP + MySQL
2. Clone o repositório:
git clone https://github.com/janainalimaviana/sistema-contatos.git

3. Copie a pasta para `C:\laragon\www\`
4. Crie o banco `meubanco` no phpMyAdmin e a tabela `contatos` com os campos acima
5. Acesse no navegador:
- API: [http://localhost/api-contatos/api.php](http://localhost/api-contatos/api.php)
- Front-end: [http://localhost/front-contatos/index.php](http://localhost/front-contatos/index.php)

---

## 👩‍💻 Desenvolvido por

**Janaína Lima Viana**  
Estudante de Sistemas de Informação  
Turma 2025

---


