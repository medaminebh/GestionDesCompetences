<?php
session_start();

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

session_destroy();
unset($_SESSION);
header('Location: index.php');
?>
