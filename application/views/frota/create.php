
<div id="formcreate">
<h2>Criar um novo carro para a Frota</h2>

<?php echo validation_errors(); 

echo form_open('adicionar');
$matricula= array('name'=>'matricula','id'=>'matricula','value'=>"XXX-YYY-ZZZ");
$submit= array('name'=>'submit','value'=>'Registar','type'=>'submit','class'=>'btn btn-outline-success my-2 my-sm-0');

$opcoesmodelos=array("");
foreach($modelos as $modelo){
    array_push($opcoesmodelos,$modelo['nome']);
};

$opcoescores=array("");
foreach($cores as $cor){
    array_push($opcoescores,$cor['nome']);
    
};



$opcoesdisp=array(1=>'disponivel',0=>'nao disponivel');

echo '&nbsp<label>Modelo do Carro:</label>';
echo form_dropdown('modelo',$opcoesmodelos);
echo '&nbsp&nbsp<label>Cor do carro:</label>';
echo form_dropdown('cor',$opcoescores);
echo '<br><label>Disponibilidade:</label>';
echo form_dropdown('disponibilidade',$opcoesdisp);
echo '&nbsp&nbsp<label>Matricula do Carro:</label>';
echo form_input($matricula);
echo form_input($submit);
echo form_close();


?>
</div>
