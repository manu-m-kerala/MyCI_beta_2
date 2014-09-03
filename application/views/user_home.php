<!doctype html>
<html>
    <head>
        <link href="style.css" rel='stylesheet'>
        <title>
        user page
        </title>
    </head>
    <body>
        <div class="user_container">
        <div class="contents_user">   <h1> "Welcome <?php print_r($this->session->userdata['username']);  ?> TO <?php print_r($this->session->userdata['company_name']);  ?></h1> 
        <div class="user_out">
         <a href="<?php echo base_url(); ?>login/sign_out">signout</a> </div>
         </div>
        </div>
        </div>
    </body>
</html>