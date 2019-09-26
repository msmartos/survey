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
    if(!empty($_POST['pergunta'])){
      echo 'Pergunta ' . $_POST['pergunta'] . ' cadastrada nas categorias selecionadas';

      //insere a pergunta
      $queryInsert = "insert into perguntas values(null, '".$_POST['pergunta']."')";
      mysqli_query($con, $queryInsert);
      $idPergunta = mysqli_insert_id($con);

      //insere na tabela perguntas setores
      if(!empty($_POST['setores'])){
        foreach($_POST['setores'] as $idSetor){
          mysqli_query($con, 'insert into perguntas_setores values(null, '.$idPergunta.', '.$idSetor.')');
        }
      }
    }
  ?>

  <form action="cadastrar-pergunta.php" method="post">
    <input type="text" name="pergunta" id="pergunta">
    <?php
      //setores que a pergunta fará parte
      $querySetores = "select * from setores";
      $result = mysqli_query($con, $querySetores);
      while($row = mysqli_fetch_assoc($result)){
        echo '<input id="checkbox-'.$row['id'].'" type="checkbox" name="setores[]" value="'.$row['id'].'">
              <label for="checkbox-'.$row['id'].'">'.$row['nome'].'</label> ';
      }
    ?>
    <button type="submit">Cadastrar</button>
  </form>
</body>

</html>
