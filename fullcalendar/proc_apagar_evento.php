<?php

session_start();

include_once './conexao.php';

$id = filter_input(INPUT_GET, 'id');

if (!empty($id)) {
    $query_event = "DELETE FROM tb_evento WHERE evt_id=:evt_id";
    $delete_event = $conn->prepare($query_event);
    
    $delete_event->bindParam("evt_id", $id);
    
    if($delete_event->execute()){
        $_SESSION['msg'] = '<div class="alert alert-success" role="alert">O evento foi apagado com sucesso!</div>';
        header("Location: teste.php");
    }else{
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Erro: O evento não foi apagado com sucesso!</div>';
        header("Location: teste.php");
    }
} else {
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Erro: O evento não foi apagado com sucesso!</div>';
    header("Location: teste.php");
}
