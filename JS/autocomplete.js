// $(function(){

//     function log(message){
//         $("#tabela").text(message).prependTo("#sugestion");
//         $("#sugestion").scrollTop(0);
//     }

//     $("#search").autocomplete({
//         source:function(request,response){
//             $.ajax({
//                 type:'GET',
//                 data:{},
//                 url:"modelos&cores.txt",
//                 dataType:"json",
//                 success: function(data){
//                     processData(data);
//                 }
//             });
//         }
//     })
// });