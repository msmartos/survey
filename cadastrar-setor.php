<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Martos Survey</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <link href="css/style.css" rel="stylesheet">

</head>

<body>

  <?php
    include('conectar.php');

    if(!empty($_POST['setor'])){
      //verifica se já existe
      $queryVerifica = "select * from setores where nome = '". $_POST['setor']."'";
      $result = mysqli_query($con, $queryVerifica);

      //se já existe printa erro
      if($result->num_rows > 0){
        echo 'Já existe um setor ' . $_POST['setor'] . ' cadastrado';
      }
      //se não, cadastra
      else{
        echo 'Setor ' . $_POST['setor'] . ' cadastrado';
        $queryInsert = "insert into setores values(null, '".$_POST['setor']."')";
        mysqli_query($con, $queryInsert);
      }
    }
  ?>

  <form action="cadastrar-setor.php" method="post">
    <input type="text" name="setor" id="setor">
    <button type="submit">Cadastrar</button>
  </form>
</body>

</html>
