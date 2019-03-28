<?php

$email = test_input($_GET["email"]);
$sexo = test_input($_GET["sexo"]);
$data  = test_input($_GET["nascimento"]);

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
    $emailErr = "Formato de E-mail Invalido";
    echo "<p>$emailErr</p>";
  } else {
    echo "<p>E-mail Valido</p>";
  }
}


function ValidaSexo($sexo)
{
  if (empty($sexo)) {
    $sexoErr = "sexo is required";
    echo "<p>$sexoErr</p>";
    //melhorar esse codigo
  } else if ($sexo !== "masculino" || "feminino") {
    echo "<p>Informe um valor valido para sexo</p>";
    echo var_dump($sexo);
  } else {
    echo "<p>Sexo Valido</p>";
    echo var_dump($sexo);
  }
}



function ValidaData($dat)
{
  $data = explode("-", "$dat");
  $y = $data[0];
  $d = $data[1];
  $m = $data[2];

  $res = checkdate($m, $d, $y);
  if ($res == 1) {
    echo "<p>Data Valida</p>";
  } else {
    echo "<p>data inválida!</p>";
  }
}



ValidaEmail($email);
ValidaData($data);
ValidaSexo($sexo);
 