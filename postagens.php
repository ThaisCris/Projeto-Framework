<?php
$json = file_get_contents('https://jsonplaceholder.typicode.com/photos');
$data = json_decode($json, true);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <?php include 'inc/header.php'; ?>
  <title>Postagens</title> 

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Postagens</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php include 'inc/navbar.php'; ?>

  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <h1 class="display-5">Postagens Listadas</h1>
    </header>

    <table id="tabela" class="display">
      <thead>
      <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Imagem</th>
      </tr>
      </thead>
      <tbody>
      <?php    

      foreach ($data as $key => $value) {
      echo '  
      <tr>
        <td>' . $value["id"] . '</td>
        <td>' . $value["title"] . '</td>
        <td><img src=' . $value["thumbnailUrl"] . '></td>
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