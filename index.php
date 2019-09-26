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

    //select no banco s=setor p=pergunta
    $query = 'select id_set as s, id_perg as p from perguntas_setores order by id_set, id_perg';
    $result = mysqli_query($con, $query);

    //array que armazenará as perguntas por setor. exemplo $pesquisa[idsetor] = array(idperguntas)
    $pesquisa = array();

    while($row = mysqli_fetch_assoc($result)){
      //armazena em um array as perguntas de um determinado setor
      if(!key_exists($row['s'], $pesquisa)){
        $pesquisa[$row['s']] = array($row['p']);
      }
      else{
        array_push($pesquisa[$row['s']], $row['p']);
      }
    }

    foreach($pesquisa as $setor => $perguntas){
      //select setor
      $querySetor = 'select * from setores where id = ' . $setor;
      $resultSetor = mysqli_query($con, $querySetor);
      while($rowSetor = mysqli_fetch_assoc($resultSetor)){
        echo '<h1>'.$rowSetor['nome'].'</h1>';

        foreach($perguntas as $pergunta){
            $queryPergunta = 'select * from perguntas where id = ' . $pergunta;
            $resultPergunta = mysqli_query($con, $queryPergunta);
            while($rowPergunta = mysqli_fetch_assoc($resultPergunta)){
              echo '<h2>'.$rowPergunta['pergunta'].'</h2>';

              //stars
              ?>

              <div class="cont">
                <div class="stars">
                  <form action="index.php" method="post">
                    <?php
                      for($i = 5; $i >= 1; $i--){
                    ?>
                        <input class="star star-<?= $i ?>" id="<?= 'p-', $rowSetor['id'], 's-', $rowPergunta['id'] ?>-star-<?= $i ?>" type="radio" name="star" value="<?= $i ?>"/>
                        <label class="star star-<?= $i ?>" for="<?= 'p-', $rowSetor['id'], 's-', $rowPergunta['id'] ?>-star-<?= $i ?>"></label>
                    <?php
                      }
                    ?>
                  </form>
                </div>
              </div>

              <?php
            }

        }
      }
    }
    ?>

</body>

</html>
