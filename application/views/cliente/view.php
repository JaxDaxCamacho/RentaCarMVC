



<div class="container" id="tabela">

<h2>Frota de Veiculos</h2>
<?php


echo form_open('search');
$search= array('name'=>'search','id'=>'search’','value'=>'','class'=>'form-control col-md-4');
$input= array('name'=>'submit','value'=>'submit','type'=>'submit','class'=>'btn btn-outline-success my-2 my-sm-0');
echo form_input($search);
echo form_input($input);
echo form_close();
?>


<table id="frotabela">
<tr id="header"><td>Matricula</td><td>Marca</td><td>Modelo</td><td>Cor</td><td>Disponivel</td>
</tr>
<?php 
 foreach ($frota_item as $veiculo){

        if($veiculo['disponibilidade']==1){
                $dp='Disponivel';
        }else{
                $dp='Não disponivel';
        };

         echo '<tr><td>'.$veiculo['matricula'].'</td><td>'.$veiculo['fabricante'].
         '</td><td>'.$veiculo['modelo'].'</td>
         <td>'.$veiculo['cor'].'</td><td>'.$dp.'</td>
         </tr>';
}
?>
</table>
<p><?php 
echo $links; ?></p>