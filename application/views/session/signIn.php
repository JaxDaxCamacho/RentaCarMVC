

<div class="container" id="login">
<h2>Log in</h2>
<?php

if(isset($error)){
echo $error;}

echo form_open('Login');
echo '<label>Username:</label>';
$username= array('name'=>'user','id'=>'search’','value'=>"",'class'=>'form-control col-md-4');
$password= array('name'=>'pass','id'=>'search’','value'=>"",'class'=>'form-control col-md-4','type'=>'password');
$submit= array('name'=>'submit','value'=>'Log In','type'=>'submit','class'=>'btn btn-outline-success my-2 my-sm-0');
echo form_input($username);
echo '<label>Password:</label>';
echo form_input($password).'<br>'.form_input($submit);
echo form_close();
?>

</div>