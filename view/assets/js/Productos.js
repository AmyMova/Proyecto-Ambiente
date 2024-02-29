
function Eliminar(id)
{

  var opcion = confirm("¿Desea eliminar este producto?");
  if (opcion == true) {

      $.ajax({
        type: 'POST',
        url: '/Controller/ProductoController.php',
        data:{
          "Funcion" : "Eliminar",
          "id" : id
        },
        success: function(data){
          location.reload();
        },
        error: function(){
          alert('Error');
        }
      });

  }

}
