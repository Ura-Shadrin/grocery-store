<?php
session_start();
    if ($_SESSION['vhod'] == 1) {
    	$_SESSION = array();
    	session_destroy();
    	header ("Location: http://grocery-store");
    }