<?php
$email = test_input($_GET["email"]);
$sexo = test_input($_GET["sexo"]);
$data  = test_input($_GET["nascimento"]); // YYYY/MM/DD
$nome = test_input($_GET["nome"]);
$logradouro = test_input($_GET["logradouro"]);
$bairro = test_input($_GET["bairro"]);
$enviar = test_input($_GET["bt_enviar"]);

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function ValidaEmail($email)
{
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<p class = \"error\">Formato de E-mail Inválido</p>";
  } else {
    return true;
  }
}

function ValidaSexo($sexo)
{
  if (empty($sexo)) {
    echo "<p class = \"error\">Preencha o Campo Sexo</p>";
    //melhorar esse codigo
  } else if ($sexo == "masculino") {
    return true;
  } else if ($sexo == "feminino") {
    return true;
  } else {
    echo "<p class = \"error\">Sexo inválido</p>";
  }
}

//OK
function ValidaData($dat)
{
  $today = getdate();
  $date = explode("/", "$dat");
  $d = $date[0];
  $m = $date[1];
  $y = $date[2];

  if ($y > $today["year"]) {
    echo "<p class = \"error\">Data Inválida, verifique o Ano</p>";
  } else if (checkdate($m, $d, $y)) {
    return true;
  } else {
    echo "<p class = \"error\">Data Inválida</p>";
  }
}









function ValidateAll($email, $data, $sexo)
{
  if (
    ValidaEmail($email) &&
    ValidaData($data) &&
    ValidaSexo($sexo)
  ) {
    echo "<p>Cadastro Efetuado com Sucesso</p>";
  } else {
    //Esta repetindo a primeira funcao quando falsa, nao sei porque, escondi com css
    ValidaEmail($email);
    ValidaData($data);
    ValidaSexo($sexo);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Erro</title>
  <link rel="stylesheet" media="all" href="style.css" type="text/css" />
</head>

<body>
  <div class="container bg-img">
    <?php
        ValidateAll($email, $data, $sexo);
        ?>
    <a href="index.html">Voltar</a>
  </div>
</body>

</ht ml>