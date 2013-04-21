<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    

if(empty($_SESSION['logged']))
{
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location: index.php');
}

switch($_SESSION['c_user']->privilege) {
    case 0:
        include ADMIN_PATH.'/index.php';
        break;
    case 1:
        include MANAGER_PATH.'/index.php';
        break;
    case 2:
        include COLLAB_PATH.'/index.php';
        break;
    default :
        include 'logout.php';
        break;
}
?>
