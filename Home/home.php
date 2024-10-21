<!-- Coding by CodingLab | www.codinglabweb.com -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="HomeStyle.css">

    <!-- Enlace a los iconos de Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title>Dashboard Sidebar Menu</title>
</head>

<body>
    <!-- Barra lateral de navegación -->
    <nav class="sidebar close mb-3">
        <header>
            <!-- Encabezado con logo y nombre -->
            <div class="image-text">
                <span class="image">
                    <img src="logo-red-salud.png" alt="Logo RedSalud">
                </span>

                <div class="text logo-text">
                    <span class="name">RedSalud</span>
                </div>
            </div>

            <!-- Icono de toggle para abrir/cerrar la barra lateral -->
            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <!-- Menú de la barra lateral -->
        <div class="menu-bar">
            <div class="menu">
                <!-- Campo de búsqueda -->
                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Buscar paciente">
                </li>

                <!-- Enlaces del menú -->
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="/Profile/Profile.html">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">Perfil</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Home/home.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Inicio</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Dashboard/dashboard.html">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">Estadistica de <br> atencion</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../Notificaciones/notificaciones.php">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Notificaciones</span>
                        </a>
                    </li>

                    <!-- 
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">Analytics</span>
                        </a>
                    </li>-->

                </ul>
            </div>

            <!-- Contenido inferior de la barra lateral -->
            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Salir</span>
                    </a>
                </li>

                <!-- Modo oscuro -->
                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Modo Oscuro</span>

                    <!-- Interruptor de modo -->
                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>

            </div>
        </div>
    </nav>

    <!-- Sección principal -->
    <section class="home mb'6">
        <!-- Mensaje de bienvenida -->
        <div class="text">Bienvenido</div>

        <!-- Botón para ir al formulario -->
        <button onclick="location.href='../formulario/form.php'" class="form-button">Ir al Formulario</button>

        <!-- Título de la sección de inicio -->
        <div class="text">Inicio</div>

        <!-- PHP para mostrar datos de la agenda -->
        <?php
        include "../controles/Agenda.php";
        $agenda = new Agenda();
        $datos = $agenda->obtenerDatos();
        
        ?>
        <!-- Tabla para mostrar los datos de la agenda -->
         <table class="table table-bordered">
            <thead>
                <tr>
                    <th>IDagenda</th>
                    <th>Fecha</th>
                    <th>Paciente</th>
                    <th>RUT</th>
                    <th>Número</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $dato): ?>
                <tr>
                    <form action="../controles/actualizar.php" method="post">
                        <td><?php echo $dato['IDagenda']; ?><input type="hidden" name="IDagenda"
                                value="<?php echo $dato['IDagenda']; ?>"></td>
                        <td><input type="date" name="fecha" value="<?php echo $dato['fecha']; ?>"></td>
                        <td><input type="text" name="paciente" value="<?php echo $dato['paciente']; ?>"></td>
                        <td><input type="number" name="rut" value="<?php echo $dato['rut']; ?>"></td>
                        <td><input type="number" name="numero" value="<?php echo $dato['numero']; ?>"></td>
                        <td><input type="text" name="estado" value="<?php echo $dato['Estado']; ?>"></td>
                        <td><input type="submit" value="Actualizar"></td>
                    </form>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        

    </section>

    <!-- Archivo JavaScript -->
    <script src="script.js"></script>

</body>

</html>