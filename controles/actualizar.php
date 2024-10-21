<?php
include "Agenda.php";
include "../conexion/conexion.php";

// Datos del resumen
$connect = new Conexion();
$queryResumen = "SELECT
(SELECT COUNT(*) FROM Datos WHERE fechaBloqueo = CURDATE()) AS atendidosHoy,
(SELECT COUNT(*) FROM Datos WHERE Estado = 'En espera') AS enEspera,
(SELECT COUNT(*) FROM Datos WHERE Estado = 'Anulado') AS anuladas,
(SELECT COUNT(*) FROM Datos) AS totalAtendidos;";

$resultResumen = $connect-> ejecutarConsulta($queryResumen);
$resumen = $resultResumen->fetch_assoc();

// Citas próximas
$queryCitasProximas = "SELECT fecha, paciente FROM Agenda WHERE fecha >= CURDATE() AND Estado = 'Programada'";
$resultCitasProximas = $connect->ejecutarConsulta($queryCitasProximas);
$citasProximas = [];
while ($row = $resultCitasProximas->fetch_assoc()) {
    $citasProximas[] = $row;
}

// Citas anuladas
$queryCitasAnuladas = "SELECT fecha, paciente FROM Agenda WHERE Estado = 'Anulada' ORDER BY fecha DESC LIMIT 10";
$resultCitasAnuladas = $connect->ejecutarConsulta($queryCitasAnuladas);
$citasAnuladas = [];
while ($row = $resultCitasAnuladas->fetch_assoc()) {
    $citasAnuladas[] = $row;
}

// Agenda del médico
$queryAgenda = "SELECT fecha, descripcion FROM Agenda WHERE RutMedico = 'medico_rut' ORDER BY fecha";
$resultAgenda = $connect->ejecutarConsulta($queryAgenda);
$agenda = [];
while ($row = $resultAgenda->fetch_assoc()) {
    $agenda[] = $row;
}

// Devolver los datos en formato JSON
$response = [
    'atendidosHoy' => $resumen['atendidosHoy'],
    'enEspera' => $resumen['enEspera'],
    'anuladas' => $resumen['anuladas'],
    'totalAtendidos' => $resumen['totalAtendidos'],
    'citasProximas' => $citasProximas,
    'citasAnuladas' => $citasAnuladas,
    'agenda' => $agenda
];

echo json_encode($response);
?>
