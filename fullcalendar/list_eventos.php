<?php
/**
 * @author Cesar Szpak - Celke - cesar@celke.com.br
 * @pagina desenvolvida usando FullCalendar e Bootstrap 4,
 * o código é aberto e o uso é free,
 * porém lembre-se de conceder os créditos ao desenvolvedor.
 */
include 'conexao.php';

$query_events = "SELECT evt_id, evt_titulo, evt_color, evt_comeco, evt_fim FROM tb_evento";
$resultado_events = $conn->prepare($query_events);
$resultado_events->execute();

$eventos = [];

while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
    $id = $row_events['evt_id'];
    $title = $row_events['evt_titulo'];
    $color = $row_events['evt_color'];
    $start = $row_events['evt_comeco'];
    $end = $row_events['evt_fim'];
    
    $eventos[] = [
        'id' => $id, 
        'title' => $title, 
        'color' => $color, 
        'start' => $start, 
        'end' => $end, 
        ];
}

echo json_encode($eventos);