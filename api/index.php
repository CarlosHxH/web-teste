<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $data = new stdClass();
    $data->id=1;
    $data->name="Admin";
    $data->date = Date('d/m/Y');
    echo json_encode($data);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = new stdClass();

    if(!(isset($_POST['username']) && isset($_POST['password']))) $data->error="credenciais ausente!";
    if(!($_POST['username'] === "01234567890") || !($_POST['password'] ==="12345678")){
        $data->error=["message"=>"Credenciais invalidas.","code"=>"00x2"];
    } else {
        $data->id=1;
        $data->nome="Administrador del system";
        $data->cpf="01234567890";
        $data->emissao="07/07/2023";
        $data->validade="06/07/2025";
        $data->foto="./assets/export.png";
        $data->situacao="ativo";
        $data->cidade="Varzea Grande";
        $data->estado="MT";
        $data->cid="10-M797";
        $data->status=["message"=>"Sucesso","code"=>200];
    }
    echo json_encode($data);
}
