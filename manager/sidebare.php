<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<aside id="sidebar" class="column" style="min-height: 651px">
    <form class="quick_search">
        <input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
    </form>
    <hr/>

    <h3>Projets</h3>
    <ul class="toggle">
        <li class="icn_add_user"><a href="index.php?module=project&option=add">Cr&eacute;er Nouveau Projet</a></li>
        <li class="icn_view_users"><a href="index.php?module=project&option=list">Voir Projet</a></li>
    </ul>

    <h3>Collaborateurs</h3>
    <ul class="toggle">
        <li class="icn_add_user"><a href="index.php?module=collaborateur&option=add">Affecter Collaborateur</a></li>
        <li class="icn_view_users"><a href="index.php?module=collaborateur&option=list">Liste des Collaborateurs</a></li>
    </ul>
</aside>
<!-- end of sidebar -->
