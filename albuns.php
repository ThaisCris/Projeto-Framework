<?php
$json = file_get_contents('https://jsonplaceholder.typicode.com/albums');
$json2 = file_get_contents('https://jsonplaceholder.typicode.com/users');

$data = json_decode($json, true);
$usuarios = json_decode($json2, true);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <?php include 'inc/header.php'; ?>
  <title>Álbuns</title> 

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Albuns</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php include 'inc/navbar.php'; ?>

  <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <h1 class="display-5">Albuns Listados</h1>
    </header>

    <table id="tabela" class="display">
      <thead>
      <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Usuário</th>
      </tr>
      </thead>
      <tbody>
      <?php    

      foreach ($data as $key => $value) {
      $resultado = $usuarios[array_search($value['userId'], array_column($usuarios, 'id'))];
      echo '  
      <tr>
        <td>' . $value["id"] . '</td>
        <td>' . $value["title"] . '</td>
        <td>' . $resultado['name'] . '</td>
      </tr>
      ';
    }
    ?>
    </tbody>
    </table>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  
  <?php include 'inc/js.php' ?>

</body>
<script>
  $(document).ready(function() {
    $('#tabela').DataTable();
} );
</script>

</html>