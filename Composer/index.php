<?php
require_once("vendor/vlucas/valitron/src/valitron/Validator.php");

$v = new Valitron\Validator($_POST);
$v->rule('required', ['name', 'email', 'telephone', 'age', 'password', 'confirm', 'date']);
$v->rule('email', 'email');
$v->rule('lengthBetween', 'name', 3, 15);
$v->rule('regex', '\'/^\+373[0-9]{8,8}$/\'');

$v->rules([
    'min' => [['age', 1]],
    'max' => [['age', 100]],
    'integer' => [['age', true]]
]);
$v->rule('dateFormat', 'dn', 'Y-m-d');
$v->rule('required', ['name', 'email', 'password', 'confirm']);
$v->rules([
  'equals' => [['password', 'confirm']],
  'lengthBetween' => [['password', 10, 20]]
]);

if($v->validate()) {
  echo "Yay! We're all good!";
} else {
  // Errors
  print_r($v->errors());
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Teeeeeeeeeeeeeeesst</title>
    <meta charset="utf-8">
  </head>
  <body>
  <form action="" method="post">
    Name <input type="text" name="name" ><br>
    Email <input type="email" name="email" ><br>
    Telephone <input type="tel" name="telephone" ><br>
    Age <input type="number" name="age" ><br>
    Passord <input type="password" name="password" ><br>
    Comfirm Passord <input type="password" name="confirm" ><br>
    Brth. Date  <input type="date" name="date" ><br>
    <input type="submit">
  </form>
  </body>
</html>