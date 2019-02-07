
<div class="container" id="tabela">
<h2>Frota de Veiculos</h2>
<script type="text/javascript">
$(function() {                     
    $( "#searching" ).autocomplete({ //the recipient text field with id #username
        source: function( request, response ) {
            $.ajax({
                url: "http://localhost/mysite/index.php/my_controller/search_username",
                dataType: "json",
                data: request,
                success: function(data){
                    if(data.response == 'true') {
                       response(data.message);
                    }
                }
            });
        },
        minLength: 1,
        select: function( event, ui ) {
            //Do something extra on select... Perhaps add user id to hidden input    
        },

    });
}); 
</script>
<?php


echo form_open('search');
$search= array('name'=>'search','id'=>'searching','value'=>'','class'=>'form-control col-md-4', 'autocomplete'=>'off');
$input= array('name'=>'submit','value'=>'submit','type'=>'submit','class'=>'btn btn-outline-success my-2 my-sm-0');
echo form_input($search);
echo form_input($input);

echo form_close();
?>
<ul id="auto"> </ul>


<table id="frotabela">
<tr id="header"><td>Matricula</td><td>Marca</td><td>Modelo</td><td>Cor</td><td>Disponivel</td>
<td>Opções</td></tr>
<?php 
 foreach ($frota as $veiculo){

        if($veiculo['disponibilidade']==1){
                $dp='Disponivel';
        }else{
                $dp='Não disponivel';
        };

         echo '<tr><td>'.$veiculo['matricula'].'</td><td>'.$veiculo['fabricante'].
         '</td><td>'.$veiculo['modelo'].'</td>
         <td>'.$veiculo['cor'].'</td><td>'.$dp.'</td>
         <td><input type=hidden value="">
         <a type="button" href="editar/'.$veiculo['id'].'" class="btn btn-success" aria-label="Left Align">
         <i class="fas fa-edit"></i>Edit</a>
         <a type="button" href="remover/'.$veiculo['id'].'" class="btn btn-danger" aria-label="Left Align">
         <i class="fas fa-trash-alt"></i>Delete
                </button></a></td>
         </tr>';
}
?>
</table> 
<p><?php 
echo $links; ?></p>