$(document).ready(function() {

     $("#sesion_tallerista").click(function(){
         location.href='/Tallerista/index';
     });

     $("#buscar_tallerista").click(function(e){
          var id_tallerista=$('input[name=id_tallerista]').val(); 
          //var status;
          var cadena;

          $.get('/Tallerista/buscar/'+id_tallerista,function(data){
               $('#tabla_tallerista tbody').empty();

               status="Sin asignar";
               cadena="<button type='button' class='btn btn-sm btn-success lista'><i class='fa fa-plus'></i></button>";

               /*if(data.lista_asignada == 0){
                    status="Sin asignar";
                    cadena="<button type='button' class='btn btn-sm btn-success lista'><i class='fa fa-plus'></i></button>";
               }else{
                    status="Asignado";
                    cadena="<button type='button' class='btn btn-sm btn-success lista' title='El tallerista ya se encuentra en una lista' disabled ><i class='fa fa-plus'></i></button>";
                    swal({
                         icon: 'warning',
                         title: 'El tallerista ya se encuentra en una lista',
                         showConfirmButton: false,
                         timer: 1500
                         })
               }*/

               $('#tabla_tallerista').append("<tr id='fila' name='" + data.id + "'>" +
                        "<th >" + data.id_empleado + "</th>" +
                        "<th >" + data.nombre_completo + "</th>" +
                        "<th >" + data.ubicacion + "</th>" +
                        "<th >" + data.departamento +"</th>" +
                        "<th >" + cadena +"</th>" +
                    "</tr>");
                
          });
        
     }); 

     $("#guardar_respuesta").click(function(){
          var valor_respuesta1="",valor_respuesta2="",valor_respuesta3="";
          var respuesta1=$('input:radio[name=pregunta1]:checked').val();
          var respuesta2=$('input:radio[name=pregunta2]:checked').val();
          var respuesta3=$('input:radio[name=pregunta3]:checked').val();
          var respuesta4=$('input:text[name=pregunta_abierta]').val();
          var id_tallerista=$('input:text[name=id_tallerista]').val();   
          var id_lista=$('input:text[name=id_lista]').val();

          if(respuesta1=='1'){
               valor_respuesta1="Totalmente de acuerdo";
          }else if(respuesta1=='2'){
               valor_respuesta1="De acuerdo";
          }else if(respuesta1=='3'){
               valor_respuesta1="Indeciso";
          }else if(respuesta1=='4'){
               valor_respuesta1="En desacuerdo";
          }else if(respuesta1=='5'){
               valor_respuesta1="Totalmente en desacuerdo";
          }

          if(respuesta2=='1'){
               valor_respuesta2="Muy importante";
          }else if(respuesta2=='2'){
               valor_respuesta2="Importante";
          }else if(respuesta2=='3'){
               valor_respuesta2=" Moderadamente importante";
          }else if(respuesta2=='4'){
               valor_respuesta2="De poca importancia";
          }else if(respuesta2=='5'){
               valor_respuesta2="Sin importancia";
          }

          if(respuesta3=='1'){
               valor_respuesta3="Totalmente de acuerdo";
          }else if(respuesta3=='2'){
               valor_respuesta3="De acuerdo";
          }else if(respuesta3=='3'){
               valor_respuesta3="Indeciso";
          }else if(respuesta3=='4'){
               valor_respuesta3="En desacuerdo";
          }else if(respuesta3=='5'){
               valor_respuesta3="Totalmente en desacuerdo";
          }

          if(valor_respuesta1==""||valor_respuesta2==""||valor_respuesta3==""||respuesta4==""){
               swal({
                    icon: 'warning',
                    title: 'Es necesario responder todas las preguntas',
                    showConfirmButton: true
               })
          }else{
               $.ajax({
                    type: 'POST',
                    url: '/Tallerista/insertar_respuesta',
                    data: {
                         '_token': $('input[name=_token]').val(),
                         'id_tallerista': id_tallerista,
                         'id_lista': id_lista,
                         'id_pregunta': '1',
                         'id_respuesta': respuesta1,

                    },
                    dataType:'json',
                    success: function(data) {
                    
                    },
               });
               $.ajax({
                    type: 'POST',
                    url: '/Tallerista/insertar_respuesta',
                    data: {
                         '_token': $('input[name=_token]').val(),
                         'id_tallerista': id_tallerista,
                         'id_lista': id_lista,
                         'id_pregunta': '2',
                         'id_respuesta': respuesta2,
                    },
                    dataType:'json',
                    success: function(data) {
                    
                    },
               });
               $.ajax({
                    type: 'POST',
                    url: '/Tallerista/insertar_respuesta',
                    data: {
                         '_token': $('input[name=_token]').val(),
                         'id_tallerista': id_tallerista,
                         'id_lista': id_lista,
                         'id_pregunta': '3',
                         'id_respuesta': respuesta3,

                    },
                    dataType:'json',
                    success: function(data) {
                    
                    },
               });

               $.get('/Tallerista/obtener_ultima_respuesta/',function(data){
                    $.ajax({
                         type: 'POST',
                         url: '/Tallerista/insertar_respuesta',
                         data: {
                              '_token': $('input[name=_token]').val(),
                              'id_tallerista': id_tallerista,
                              'id_lista': id_lista,
                              'id_pregunta': '4',
                              'id_respuesta': data,
                              'valor_respuesta': respuesta4,
     
                         },
                         dataType:'json',
                         success: function(data) {
                         swal({
                              icon: 'success',
                              title: 'Encuesta guardada correctamente',
                              showConfirmButton: false,
                              timer: 2000
                         })
     
                                   location.reload();
                         },
                    });
               });
               
          }
         
     });

     $("#modal_preguntas").on("hidden.bs.modal", function(){
          $(this).find('form').trigger('reset');
      });

     $("#guardar_lista").click(function(){
          
          var id_usuario_creado=document.getElementById('id_usuario_creado').value;
          console.log(id_usuario_creado);
          $.ajax({
               type: 'POST',
               url: '/Tallerista/insertar_lista',
               data: {
                    '_token': $('input[name=_token]').val(),
                    'id_usuario_creado': id_usuario_creado,

               },
               dataType:'json',
               success: function(data) {
                    swal({
                         icon: 'success',
                         title: 'Lista guardada correctamente',
                         showConfirmButton: false,
                         timer: 20000
                         })
                    
                    setTimeout(()=>{
                         location.reload();
                    }, 2500);
               },
          });

     });

     $(document).on('click','.responder_preguntas',function(){
          $('#modal_preguntas').modal('show');
          var id_tallerista=$(this).data('id-tallerista');
          var id_lista=$(this).data('id-lista');
          $('#id_tallerista').val(id_tallerista);
          $('#id_lista').val(id_lista);

     });

     $(document).on('click','.ver_imagen',function(){
          $('#modal_imagen').modal('show');
          var nombre_imagen=$(this).data('imagen');
          document.getElementById("lista_imagen").src="/img/"+nombre_imagen;
     });



     $(document).on('click','.lista',function(){

          var id_tallerista=document.getElementById('fila').cells[0].innerText;
          $('#tabla_tallerista tbody').empty();

          $.get('/Tallerista/buscar/'+id_tallerista,function(data){
              
               $('#tabla_lista').append("<tr id='fila_lista'>" +
                        "<th >" + data.id_empleado + "</th>" +
                        "<th >" + data.nombre_completo + "</th>" +
                        "<th >" + data.ubicacion + "</th>" +
                        "<th >" + "Asignado" + "</th>" +
                    "</tr>");
          });

          $.get('/Tallerista/obtener_ultimo/',function(data){
               $.ajax({
                    type: 'POST',
                    url: '/Tallerista/insertar_lista_tallerista',
                    data: {
                         '_token': $('input[name=_token]').val(),
                        'id_lista': data,
                        'id_tallerista': id_tallerista,
                        
                    },
                    dataType:'json',
                    success: function(data) {
                        console.log(data);
                    },
               });
          });

     });

});

function toDashboard(){
     location.href='/dashboard';
}

function toMaestro(){
     location.href='/maestro';
}