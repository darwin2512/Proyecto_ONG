<?php

session_start();
$conn = mysqli_connect(
    'localhost',
    'usuarioDW',
    '1616.fjfj',
    'pescadores'
);

if(!$conn){
    echo 'Fallo al conectarse';
}
?>

<!--  -->