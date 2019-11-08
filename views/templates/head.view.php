<?php
ob_start();
session_start();
ini_set("date.timezone", "America/El_Salvador");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?? '' ?></title>
    <link rel="stylesheet" href="<?= WEB_PATH ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= WEB_PATH ?>css/style.css">
    <link rel="stylesheet" href="<?= WEB_PATH ?>css/all.css">
    <script src="<?= WEB_PATH ?>js/jquery.js"></script>
    <script src="<?= WEB_PATH ?>js/bootstrap.min.js"></script>
    <script src="<?= WEB_PATH ?>js/popper.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/gijgo@1.9.13/js/messages/messages.es-es.js" type="text/javascript"></script>
    <script src="<?= WEB_PATH ?>js/sweetalert2.js"></script>
    <script src="<?= WEB_PATH ?>js/initialize.js"></script>
</head>

<body>