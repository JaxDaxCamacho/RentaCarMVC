<div id="Title">
  <div class="container">
    <h1 class="display-3">Contacte conosco sobre os carros</h1>
    <p>Pode enviar um email directamente por aqui ou venha ter à nossa loja
    física.
    </p>  
    
  </div>
</div>

<div id="emailform">
<?php
  if(isset($error)){
    echo $error;
  }

    echo form_open('mail');
    $title= array('name'=>'title','id'=>'title','value'=>"Title of Message");
    $email= array('name'=>'email','id'=>'email','value'=>"Your email");
    $text= array('name'=>'text','id'=>'text','value'=>"body of the message");
    $submit= array('name'=>'submit','value'=>'Enviar','type'=>'submit','class'=>'btn btn-outline-success my-2 my-sm-0');

    
    echo '<label>Title:</label>';
    echo form_input($title);
    echo '<br><label>E-Mail:</label>';
    echo form_input($email);
    echo '<br><label>Text:</label><br>';
    echo form_textarea($text);
    echo form_input($submit);
    echo form_close();

?>
</div>