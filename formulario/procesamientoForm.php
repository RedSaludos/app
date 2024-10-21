<?php
// Include your database connection file
require_once 'db_conn.php';

// Get form data    
$fechaActual = $_POST['fechaActual'];
$nombreDoc = $_POST['NombreDoc'];
$tipoCita = $_POST['Uni-select'];
$especialidad = $_POST['Especialidad'];
$razonCancelacion = $_POST['razon'];
$horasBloqueadas = $_POST['horasBloq'];
$mes = date('m', strtotime($fechaActual));
$fecha_transformada = date('d-m-Y', strtotime($fechaActual));

// Prepare SQL statement
$sql = "INSERT INTO historial_bloqueos(fecha_bloqueo, mes_bloqueo, unidad, especialidad, horas_bloqueadas, motivo, nombre_doctor) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

// Prepare statement
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("ssssdss", $fechaActual, $mes, $tipoCita, $especialidad, $horasBloqueadas, $razonCancelacion, $nombreDoc);

// Execute statement
if ($stmt->execute()) {
    echo "<script>
            alert('Registro completado');
            if (confirm('¿Desea ir a la página de inicio?')) {
                window.location.href = '../Home/home.php';
            }
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>