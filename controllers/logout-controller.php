<?php
session_start();

unset($_SESSION['user']);
unset($_SESSION['userCar']);

header('Location: /');
die;