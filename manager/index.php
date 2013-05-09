<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<header id="header">
    <hgroup>
        <h1 class="site_title"><center>Manager</center> </h1>
        <h2 class="section_title">Manager Nov@tris</h2>
        <div class="btn_view_site"><a id="logout" href="logout.php">Logout</a></div>
    </hgroup>
</header> <!-- end of header bar -->

<section id="secondary_bar">
    <div class="user">
        <p><b>Welcome <span style="color:<?php echo ($_SESSION['c_user']->privilege == 0) ? 'red' : (($_SESSION['c_user']->privilege == 1) ? 'green' : 'blue'); ?>;"><?php echo $_SESSION['c_user']->login; ?></span></b></p>
    </div>
    <div class="breadcrumbs_container">
        <article class="breadcrumbs">
        <?php if(!empty($_SESSION['logged']) && !empty($_SESSION['c_user'])){
            switch($_SESSION['c_user']->privilege) {
                case 0:
                    if(!isset($_GET['module']) && !isset($_GET['option'])){
                        echo '<a href="javascript:void(0);" class="current"';
                    } else {
                        echo '<a href="index.php"';
                    }
                    echo '>Dashboard</a>';
                    if(isset($_GET['module'])){
                        switch($_GET['module']){
                            case "collab":
                                if(isset($_GET['option'])){
                                    switch ($_GET['option']){
                                        case "add":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">Add Collaborateur</a>';
                                            break;
                                        case "list":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">List Collaborateurs</a>';
                                            break;
                                        case "edit":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">Edit Collaborateur</a>';
                                            break;
                                        case "delete":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">Delete Collaborateur</a>';
                                            break;
                                        default :
                                            break;
                                    }
                                }
                                break;
                            case "manager":
                                if(isset($_GET['option'])){
                                    switch ($_GET['option']){
                                        case "add":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">Add Manager</a>';
                                            break;
                                        case "list":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">List Managers</a>';
                                            break;
                                        case "edit":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">Edit Manager</a>';
                                            break;
                                        default :
                                            break;
                                    }
                                }
                                break;
                            case "competence":
                                if(isset($_GET['option'])){
                                    switch ($_GET['option']){
                                        case "add":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">Add Competence</a>';
                                            break;
                                        case "list":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">List Competences</a>';
                                            break;
                                        case "edit":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">Edit Competence</a>';
                                            break;
                                        case "add_cat":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">Add Categories Competences</a>';
                                            break;
                                        case "list_cat":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">List Categories Competences</a>';
                                            break;
                                        case "edit_cat":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">Edit Categorie Competence</a>';
                                            break;
                                        default :
                                            break;
                                    }
                                }
                                break;
                            case "service":
                                if(isset($_GET['option'])){
                                    switch ($_GET['option']){
                                        case "add":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">Ajouter Service</a>';
                                            break;
                                        case "list":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">Liste Service</a>';
                                            break;
                                        case "edit":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">Editer Service</a>';
                                            break;
                                        default :
                                            break;
                                    }
                                }
                                break;
                            default :
                                break;
                        }
                        break;
                    }
                case 1:
                    echo "<title>Manager Pannel</title>";
                    break;
                case 2:
                    echo "<title>Collab Pannel</title>";
                    break;
                default :
                    include 'logout.php';
                    echo "<title>Authentification</title>";
                    break;
            }
        }
        ?>
        </article>
    </div>
</section><!-- end of secondary bar -->

<?php include 'sidebare.php'; ?>

<section id="main" class="column">
    <?php if(!empty($_SESSION['logged']) && !empty($_SESSION['c_user'])){
            switch($_SESSION['c_user']->privilege) {
                case 0:
                    if(!isset($_GET['module']) && !isset($_GET['option'])){
                        //echo '<a href="javascript:void(0);" class="current"';
                    }
                    if(isset($_GET['module'])){
                        switch($_GET['module']){
                            case "collab":
                                if(isset($_GET['option'])){
                                    switch ($_GET['option']){
                                        case "add":
                                            include_once 'modules/collab/forms/addcollab.html';
                                            break;
                                        case "list":
                                            include_once 'modules/collab/forms/listcollab.html';
                                            break;
                                        case "edit":
                                            include_once 'modules/collab/forms/editcollab.html';
                                            break;
                                        case "delete":
                                            include_once 'modules/collab/forms/deletecollab.html';
                                            break;
                                        default :
                                            break;
                                    }
                                }
                                break;
                            case "manager":
                                if(isset($_GET['option'])){
                                    switch ($_GET['option']){
                                        case "add":
                                            include_once 'modules/manager/forms/addmanager.html';
                                            break;
                                        case "list":
                                             include_once 'modules/manager/forms/listmanager.html';
                                            break;
                                        case "edit":
                                            include_once 'modules/manager/forms/editmanager.html';
                                            break;
                                        case "delete":
                                            include_once 'modules/manager/forms/deletemanager.html';
                                            break;
                                        default :
                                            break;
                                    }
                                }
                                break;
                            case "competence":
                                if(isset($_GET['option'])){
                                    switch ($_GET['option']){
                                        case "add":
                                            include_once 'modules/competences/forms/addcompetence.html';
                                            break;
                                        case "list":
                                            include_once 'modules/competences/forms/listcompetence.html';
                                            break;
                                        case "edit":
                                            include_once 'modules/competences/forms/editcompetence.html';
                                            break;
                                        case "delete":
                                            include_once 'modules/competences/forms/deletecompetence.html';
                                            break;
                                        case "add_cat":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">Add Categories Competences</a>';
                                            break;
                                        case "list_cat":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">List Categories Competences</a>';
                                            break;
                                        case "edit_cat":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">Edit Categorie Competence</a>';
                                            break;
                                        default :
                                            break;
                                    }
                                }
                                break;
                            case "cat_competence":
                                if(isset($_GET['option'])){
                                    switch ($_GET['option']){
                                        case "add_cat":
                                            include_once 'modules/cat_competences/forms/add_cat_competence.html';
                                            break;
                                        case "list_cat":
                                            include_once 'modules/cat_competences/forms/list_cat_competence.html';
                                            break;
                                        case "edit_cat":
                                            include_once 'modules/cat_competences/forms/edit_cat_competence.html';
                                            break;
                                        case "delete_cat":
                                            include_once 'modules/cat_competences/forms/delete_cat_competence.html';
                                            break;
                                        default :
                                            break;
                                    }
                                }
                                break;
                            case "service":
                                if(isset($_GET['option'])){
                                    switch ($_GET['option']){
                                        case "add":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">Ajouter Service</a>';
                                            break;
                                        case "list":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">Liste Service</a>';
                                            break;
                                        case "edit":
                                            echo '<div class="breadcrumb_divider"></div> <a href="javascript:void(0);" class="current">Editer Service</a>';
                                            break;
                                        default :
                                            break;
                                    }
                                }
                                break;
                            default :
                                break;
                        }
                        break;
                    }
                case 1:
                    if(!isset($_GET['module']) && !isset($_GET['option'])){
                        //echo '<a href="javascript:void(0);" class="current"';
                    }
                    if(isset($_GET['module'])){
                        switch($_GET['module']){
                            case "project":
                                if(isset($_GET['option'])){
                                    switch ($_GET['option']){
                                        case "add":
                                            include_once 'modules/projet/forms/addproject.html';
                                            break;
                                        case "list":
                                            include_once 'modules/projet/forms/listproject.html';
                                            break;
                                        case "edit":
                                            include_once 'modules/projet/forms/editproject.html';
                                            break;
                                        case "delete":
                                            include_once 'modules/projet/forms/deleteproject.html';
                                            break;
                                        default :
                                            break;
                                    }
                                }
                                break;
                            
                                    }
                           
                    }
                case 2:
                    echo "<title>Collab Pannel</title>";
                    break;
                default :
                    include 'logout.php';
                    echo "<title>Authentification</title>";
                    break;
            }
        }
        ?>
</section>

