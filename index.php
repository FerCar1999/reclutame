<?php
session_start();
if (isset($_SESSION['codi_usua']) && isset($_SESSION['codi_tipo_usua'])) {
    if ($_SESSION['codi_tipo_usua'] == 1) {
        header('Location: private/index');
    } else {
        header('Location: public/index');
    }
} else {
    header('Location: public/index');
}