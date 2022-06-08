<?php
include __DIR__."/global.php";
session_start();
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");

$aluno = new Aluno();
$aluno = $aluno->listar();
foreach($aluno as $user_key => $user_data) {
    foreach($user_data as $user_data_key => $user_data_value) {
        if(is_int($user_data_key)) {
            unset($aluno[$user_key][$user_data_key]);
        }
    }
}
echo json_encode($aluno);