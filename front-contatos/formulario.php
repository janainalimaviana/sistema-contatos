<?php
$id = $_GET['id'] ?? null;
$contato = null;

if ($id) {
  $res = file_get_contents("http://localhost/api-contatos/api.php?id=$id");
  $contato = json_decode($res, true);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Novo contato</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container py-5">
    <h2 class="mb-4"><?= $id ? "✏️ Editar contato" : "➕ Novo contato" ?></h2>

    <form id="formContato">
      <div class="mb-3">
        <label class="form-label">Nome:</label>
        <input type="text" name="nome" class="form-control" required value="<?= $contato['nome'] ?? '' ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Telefone:</label>
        <input type="text" name="telefone" class="form-control" required value="<?= $contato['telefone'] ?? '' ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">E-mail:</label>
        <input type="email" name="email" class="form-control" value="<?= $contato['email'] ?? '' ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Aniversário:</label>
        <input type="date" name="aniversario" class="form-control" value="<?= $contato['aniversario'] ?? '' ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Categoria:</label>
        <select name="categoria" class="form-select">
          <option value="principal" <?= ($contato['categoria'] ?? '') === 'principal' ? 'selected' : '' ?>>Principal</option>
          <option value="favorito" <?= ($contato['categoria'] ?? '') === 'favorito' ? 'selected' : '' ?>>Favorito</option>
          <option value="outro" <?= ($contato['categoria'] ?? '') === 'outro' ? 'selected' : '' ?>>Outro</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Observação:</label>
        <textarea name="observacao" class="form-control"><?= $contato['observacao'] ?? '' ?></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>

  <script>
    const form = document.getElementById('formContato');
    form.addEventListener('submit', function (e) {
      e.preventDefault();

      const dados = Object.fromEntries(new FormData(form));
      const metodo = <?= $id ? "'PUT'" : "'POST'" ?>;
      const url = 'http://localhost/api-contatos/api.php<?= $id ? "?id=$id" : "" ?>';

      fetch(url, {
        method: metodo,
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(dados)
      })
      .then(res => res.json())
      .then(msg => {
        alert(msg.mensagem || 'Salvo com sucesso');
        window.location.href = 'index.php';
      })
      .catch(err => {
        alert('Erro ao salvar');
        console.error(err);
      });
    });
  </script>

</body>
</html>
