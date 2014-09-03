<!doctype html>
<html>
    <head>
        
         <title>
            add new user
        </title>
    </head> 
    <body>
               <div class="container">
                               <div class="header">
                    <h1> Add new user</h1>
                </div> 
                 <?php echo form_open('login/add_user')?>
                <div class="labelcontrol">
                    username <input type="text" name="username" id="username">
                </div>
                    <div class="labelcontrol">
                    password:<input type="password" name="password" id="password">
                </div>   
                <div class="labelcontrol"> company: <select name="companyname" id="companyname" class="form-control"></div>
                       <option> </option>
                <?php 
                 foreach($groups as $rowd)
                       { 
                       echo '<option value="'.$rowd->company_name.'">'.$rowd->company_name.'</option>';
                      }
                ?>
                 </select>
                </div>
         <div class="labelcontrol">
                   <input type="submit" name="submit" value="submit">  
                   <?php echo form_close(); ?>
                    
        </div>
         <?php echo $this->session->flashdata('message_name'); ?>
    </body>
</html>