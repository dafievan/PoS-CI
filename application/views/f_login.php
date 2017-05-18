<?php 
echo form_open('autho/login');
 ?>
 <input type="text" name="username" placeholder="Username">
 <input type="password" name="password" placeholder="Password">
 <button type="submit" name="submit">Login</button>
<?php 
echo form_close();
 ?>