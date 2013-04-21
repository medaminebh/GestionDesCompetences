<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="login-bg">
	<center style="padding-top:25px;"><strong> LOGIN </strong></center>
	<!-- Start: login-holder -->

	<div id="login-holder">

		<!-- start logo -->
		<div id="logo-login">

		</div>
		<!-- end logo -->

		<div class="clear"></div>

		<!--  start loginbox  -->
			<div id="loginbox">

				<!--  start login-inner -->

				<div id="login-inner">
					<form method="post" action="">
						<table border="0" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                            <tr>
                                                                    <th>Username :</th>
                                                                    <td><input type="text"  name="username" class="login-inp" placeholder="Username"  required="required"/></td>
                                                            </tr>
                                                            <tr>
                                                                    <th>Password :</th>
                                                                    <td><input type="password" name="password" onfocus="this.value=''"  class="login-inp" placeholder="********" required="required"/></td>
                                                            </tr>
                                                            <tr>
                                                                    <th></th>
                                                                    <td align="center"><input type="submit" class="submit-login"  name="login"/></td>
                                                            </tr>
                                                    </tbody>
						</table>
					</form>
				</div>
				<!--  end login-inner -->
                                
                                <!-- start recover -->
                                <a href="" class="forgot-pwd">MOT DE PASSE OUBLIE ?</a>
                                <!-- end recover -->
                        </div>
        </div>
	<div class="clear"></div>
 </div>