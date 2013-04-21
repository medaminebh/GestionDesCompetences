<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$date = date("Y-m-d H:i:s");
echo $date."<br />";
$timestamp = strtotime($date);
echo $timestamp."<br />";
echo time();
?>
