<!doctype html>
<html>
    <head>
        
        <title> login page</title>
        <script type="text/javascript">
        function validate() {
            var usrnm = document.getElementById("username");
            var paswd = document.getElementById("password");
            if (usrnm.value == null || usrnm.value == "") {
                alert("Please enter Username.");
                usrnm.focus();
                return false;
            }else  if (paswd.value == null || paswd.value == "") {
                alert("Please enter Password.");
                paswd.focus();
                return false;
            }       

            else {

                return true;
            }
        }
    </script> 
    </head> 
    <body>
<div class="container">
	<div class="row">
	<br/>
		<div class="span4 offset4 well">
		
			<legend>Login</legend>
                       
                        <?php echo form_open('login/login_user') ?>
			
                       
			
			<!-- Login Box Starts Here -->
			<input type="text" id="username" class="span4" name="username" placeholder="Username"><br/><br/>
			<input type="password" id="password" class="span4" name="password" placeholder="Password"><br/><br/>
                        <button type="submit" name="submit" class="btn btn-info btn-block" onclick="return validate()">Sign in</button>
			<?php echo form_close(); ?>
                        <h1><?php echo $this->session->flashdata('message_name'); ?></h1>
                </div>
	</div>
</div>
    </body>
</html>