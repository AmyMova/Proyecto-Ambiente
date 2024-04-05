function EliminarLetras() {/*Elimina las letras en los campos que se pongan*/
    var inputPC = document.getElementById("Precio_Credito");
    var inputPV = document.getElementById("Precio_Venta");
    var inputNPC = document.getElementById("Nuevo_Precio_Credito");
    var inputNPV = document.getElementById("Nuevo_Precio_Venta");
  
    inputPC.value = inputPC.value.replace(/\D/g, "");
    inputPV.value = inputPV.value.replace(/\D/g, "");
    inputNPC.value = inputNPC.value.replace(/\D/g, "");
    inputNPV.value = inputNPV.value.replace(/\D/g, "");
  
  }
  function EliminarNumeros() {/*Elimina los numeros en los campos que se pongan*/
    var descr = document.getElementById("descripcionP");
    var ndescr = document.getElementById("Nueva_Descripcion");
    var nMarca = document.getElementById("Nombre_Marca");
    var NnMarca = document.getElementById("Nuevo_Nombre_Marca");
    
    descr.value = descr.value.replace(/[0-9]/g, '');
    ndescr.value = ndescr.value.replace(/[0-9]/g, '');
    nMarca.value = nMarca.value.replace(/[0-9]/g, '');
    NnMarca.value = NnMarca.value.replace(/[0-9]/g, '');
  
  }