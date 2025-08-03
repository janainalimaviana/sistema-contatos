<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Contatos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container py-5">
    <h2 class="mb-4 text-center">📇 Lista de contatos</h2>

    <form id="filtro-form" class="row g-3 align-items-end mb-4">
  <div class="col-md-6">
    <label class="form-label">Buscar por nome:</label>
    <input type="text" id="busca" class="form-control" placeholder="Digite o nome...">
  </div>
  <div class="col-md-4">
    <label class="form-label">Filtrar por categoria:</label>
    <select id="filtro-categoria" class="form-select">
      <option value="">Todas</option>
      <option value="principal">Principal</option>
      <option value="favorito">Favorito</option>
      <option value="outro">Outro</option>
    </select>
  </div>
  <div class="col-md-2">
    <button type="submit" class="btn btn-primary w-100">Filtrar</button>
  </div>
</form>


    <div class="mb-3 text-end">
      <a href="formulario.php" class="btn btn-success">+ Novo contato</a>
    </div>

    <div class="row" id="lista-contatos">
        <!-- Contatos serão carregados aqui via JavaScript -->
    </div>
  </div>

  <script>
  let contatosOriginais = [];

  function carregarContatos() {
    fetch('http://localhost/api-contatos/api.php')
      .then(res => res.json())
      .then(contatos => {
        contatosOriginais = contatos;
        exibirContatos(contatos);
      })
      .catch(err => {
        alert('Erro ao carregar contatos.');
        console.error(err);
      });
  }

  function exibirContatos(contatos) {
    const container = document.getElementById('lista-contatos');
    container.innerHTML = '';

    if (contatos.length === 0) {
      container.innerHTML = '<p class="text-muted">Nenhum contato encontrado.</p>';
      return;
    }

    contatos.forEach(c => {
      const card = document.createElement('div');
      card.className = 'col-md-6 col-lg-4 mb-4';

      card.innerHTML = `
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title">${c.nome}</h5>
            <p class="card-text mb-1"><strong>📞</strong> ${c.telefone}</p>
            <p class="card-text mb-1"><strong>📧</strong> ${c.email}</p>
            <p class="card-text mb-1"><strong>🎂</strong> ${c.aniversario}</p>
            <p class="card-text mb-1"><strong>🏷️</strong> ${c.categoria}</p>
            <p class="card-text"><strong>📝</strong> ${c.observacao}</p>

            <div class="d-flex justify-content-end gap-2 mt-3">
              <a href="formulario.php?id=${c.id}" class="btn btn-sm btn-warning">✏️ Editar</a>
              <button class="btn btn-sm btn-danger" onclick="excluir(${c.id})">🗑️ Excluir</button>
            </div>
          </div>
        </div>
      `;
      container.appendChild(card);
    });
  }

  function excluir(id) {
    if (confirm("Tem certeza que deseja excluir este contato?")) {
      fetch(`http://localhost/api-contatos/api.php?id=${id}`, {
        method: 'DELETE'
      })
      .then(res => res.json())
      .then(msg => {
        alert(msg.mensagem || 'Contato excluído');
        carregarContatos();
      })
      .catch(err => {
        alert('Erro ao excluir');
        console.error(err);
      });
    }
  }

  document.getElementById('filtro-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const busca = document.getElementById('busca').value.toLowerCase();
    const categoria = document.getElementById('filtro-categoria').value;

    const filtrados = contatosOriginais.filter(c => {
      const nomeOk = c.nome.toLowerCase().includes(busca);
      const catOk = categoria === '' || c.categoria === categoria;
      return nomeOk && catOk;
    });

    exibirContatos(filtrados);
  });

  carregarContatos();
</script>

</body>
</html>
