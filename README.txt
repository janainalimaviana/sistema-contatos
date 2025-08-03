===========================
SISTEMA DE GERENCIAMENTO DE CONTATOS
===========================

Desenvolvedora: Janaína Lima  
Curso: Sistemas de Informação  
Disciplina: Programação para Internet II  
Professor: Gabriel Schardong Ferrão  

-------------------------------------------
🧾 Descrição do Projeto
-------------------------------------------
Este sistema permite o cadastro, edição, listagem, filtro e exclusão de contatos pessoais.  
A aplicação é composta por:

1. **Back-End** (API REST em PHP + MySQL)
2. **Front-End** (HTML, PHP e CSS com Bootstrap)

-------------------------------------------
🧩 Estrutura do Projeto
-------------------------------------------

📁 api-contatos  
→ API REST em PHP  
→ Conecta-se ao banco de dados MySQL  
→ Oferece rotas: GET, POST, PUT, DELETE

📁 front-contatos  
→ Interface do usuário  
→ Usa Bootstrap para visual responsivo  
→ Consome a API via fetch (JavaScript)

-------------------------------------------
🗃️ Banco de Dados
-------------------------------------------
Nome do banco: `meubanco`  
Nome da tabela: `contatos`

Campos da tabela:
- `id` (int, auto_increment, chave primária)
- `nome` (varchar 100)
- `telefone` (varchar 20)
- `email` (varchar 100)
- `aniversario` (date)
- `categoria` (varchar 20)
- `observacao` (text)

-------------------------------------------
🖥️ Como acessar
-------------------------------------------

✔️ Back-End (API):  
http://localhost/api-contatos/api.php

✔️ Front-End:  
http://localhost/front-contatos/index.php

⚙️ Requisitos:
- PHP (via Laragon)
- MySQL (via Laragon/phpMyAdmin)

-------------------------------------------
📦 Instruções de uso
-------------------------------------------

1. Extraia o conteúdo do ZIP para `C:\laragon\www`
2. Inicie o Laragon e abra o phpMyAdmin
3. Crie o banco `meubanco` e a tabela `contatos` conforme descrito acima
4. Acesse os links acima no navegador

Obrigada!
