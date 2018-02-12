<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/estilos.css">
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <link rel="stylesheet" href="../public/datatables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../public/datatables/buttons.dataTables.min.css">
    <link rel="stylesheet" href="../public/datatables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="../public/css/bootstrap-select.css">
    <title>Bloodify</title>
</head>
<body>
    <div class="container-fluid">
        <nav id="navbar" class="navbar navbar-inverse bg-light">
            <h2>Bloodify</h2>
            <ul class="nav nav-tabs">
                <li><a class="nav-link active" data-toggle="tab" href="#pacientes">Pacientes</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#campañas" onclick="listarCp()">Campañas</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#centrosMedicos" onclick="listarCM()">Centros Médicos</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#usuarios" onclick="listarDon()">Usuarios</a></li>
                <li><a class="btn btn-danger btn-block" href="login.html" role="button">Cerrar Sesión</a></li>
            </ul>
        </nav>
