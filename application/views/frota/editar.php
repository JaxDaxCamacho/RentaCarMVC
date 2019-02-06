<?php 
echo'
<form action="editado/'.$ID.'" method="POST">
<div id="editarcarro">
<h2>Editar o carro '.$ID.'</h2>';

echo form_open('editado/'.$ID);
$matricula= array('name'=>'matricula','id'=>'matricula','value'=> $carro[0]['matricula']);
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
echo form_dropdown('modelo',$opcoesmodelos,$carro[0]['modelo.id']);
echo '&nbsp&nbsp<label>Cor do carro:</label>';
echo form_dropdown('cor',$opcoescores,$carro[0]['cor.id']);
echo '<br><label>Disponibilidade:</label>';
echo form_dropdown('disponibilidade',$opcoesdisp);
echo '&nbsp&nbsp<label>Matricula do Carro:</label>';
echo form_input($matricula);
echo form_input($submit);
echo form_close();

var_dump($carro);
?>


