<?php
session_start();

unset($_SESSION['user']);

header('Location: /controllers/home-controller.php');
die;