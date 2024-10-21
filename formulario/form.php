<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Incluye el CSS de Bootstrap desde CDN para estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Incluye el JS de Bootstrap desde CDN para funcionalidad -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Enlaza tu archivo de estilos local -->
    <link href="style.css" rel="stylesheet">
    <!-- Flatpicker style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anulación de hora</title>
</head>

<body>
    <!-- Encabezado del formulario -->
    <div class="text-center">
        <h2>Formulario para cancelar la hora</h2>
    </div>
    <!-- Contenedor principal con clases de Bootstrap -->
    <div class="container mb-6">
        <form action="procesamientoForm.php" method="post">
            <!-- Campo para obtención de la fecha -->
            <div class="mb-3">
                <label for="fechaActual">Seleccionar fecha</label>
                <input class="form-control" type="date-local" name="fechaActual" id="fechaActual">
            </div>
            
            <!-- Campo para ingresar el nombre del doctor -->
            <div class="mb-3">
                <label for="NombreDoc" class="form-label">Nombre doctor</label>
                <input type="NombreDoc" class="form-control form-control-lg" id="NombreDoc"
                    placeholder="Nombre y Apellido" name="NombreDoc">
            </div>
            <!-- Selección del tipo de cita médica -->
            <div class="mb-3">
                <label for="Uni-select">Unidad</label>
                <select id="Uni-select" class="form-select form-select-lg mb-3" name="Uni-select">
                    <option value="Consulta Médica">Consulta médica</option>
                    <option value="Procedimiento">Procedimiento</option>
                </select>
            </div>
            <!-- Ingreso de la especialidad médica -->
            <label for="Especialidad">Especialidad</label>
            <div class="form-floating mb-3">
                <input class="form-control" id="Especialidad" name="Especialidad" placeholder="Gastroenterología Adulto">
            </div>
            <!-- Selección de la razón de cancelación -->
            <div class="mb-3">
                <label class="form-label" for="razon">Razón Cancelación</label>
                <select class="form-select form-select-lg mb-3" aria-label="rzn-select" id="razon" name="razon">
                    <option value="Familiar">Familiar</option>
                    <option value="Vacaciones">Vacaciones</option>
                    <option value="Congreso">Congreso</option>
                    <option value="Enfermedad">Enfermedad</option>
                    <option value="Cx">Cx</option>
                    <option value="Cx Externa">Cx Externa</option>
                    <option value="Turno">Turno</option>
                    <option value="Reunión">Reunión</option>
                    <option value="Falla Sistema">Falla Sistema</option>
                    <option value="Sin Pctes">Sin Pctes</option>
                    <option value="X">X</option>
                    <option value="Mantención de equipo">Mantención de equipo</option>
                </select>
            </div>
            <!-- Ingreso de la cantidad de horas a bloquear -->
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="horasbloq" placeholder="1.5" step="0.1" name="horasBloq">
                <label for="horasbloq">Indique la cantidad de horas que serán bloqueadas</label>
            </div>
            <!-- Botón de envío del formulario -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Incluye Popper.js para Bootstrap (necesario para algunos componentes) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <!-- Incluye el JS de Bootstrap para funcionalidad adicional -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("input[type=date-local]", {dateFormat:"Y-m-d"});
    </script>
</body>

</html>