<?php
session_start();
$type = $_GET['type'];
unset($_SESSION[$type]);