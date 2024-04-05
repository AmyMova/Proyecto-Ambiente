$(document).ready(function () {
    $.ajax({
        url: './../../Controller/EtiquetaController.php?op=ListarTarjetaEtiqueta',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            // Iterar sobre los datos y crear tarjetas de categoría
            data.forEach(function (etiqueta) {
                for (var i = 0; i < etiqueta.XS; i++) {
                    var tarjetaHTML =
                        '<div class="card my-1"style:height:246px; width:113px;>' +
                        '<div class="card-body">' +
                        '<p  style="font-size:12px;"class="bg-transparent card-text">Rosa y Añil</br>Tel:2252-7036</p>' +
                        '<pre style="font-size:10px;" class="bg-transparent card-text">Descr:' + etiqueta.Descripcion.substr(0, 8) + '<br>' +
                        'Marca:' + etiqueta.Marca.substr(0, 8) + '<br>' +
                        'Categ:' + etiqueta.Categoria.substr(0, 8) + '<br>' +
                        'Tamaño: XS' + '<br>' +
                        'Precio:' + etiqueta.PrecioVenta.substr(0, 8) + '<br>' +
                        ' XX:' + etiqueta.PrecioCredito.substr(0, 8) + 'XX' + '<br>' +
                        '--------------------------' + '<br>' +
                        'Descr:' + etiqueta.Descripcion.substr(0, 8) + '<br>' +
                        'Marca:' + etiqueta.Marca.substr(0, 8) + '<br>' +
                        'Categ:' + etiqueta.Categoria.substr(0, 8) + '<br>' +
                        'Tamaño: XS' + '<br>' +
                        'Precio:' + etiqueta.PrecioVenta.substr(0, 8) + '<br>' +
                        ' XX:' + etiqueta.PrecioCredito.substr(0, 8) + 'XX' + '<br>' +
                        'Tarjeta()Efectivo()Simpe()' +
                        '</pre>' +
                        '</div>' +
                        '</div>';
                    $('#contenedor-tarjetas-Etiqueta').append(tarjetaHTML);
                }

                for (var i = 0; i < etiqueta.S; i++) {
                    var tarjetaHTML =
                        '<div class="card my-1"style:height:246px; width:113px;>' +
                        '<div class="card-body">' +
                        '<p  style="font-size:12px;"class="bg-transparent card-text">Rosa y Añil</br>Tel:2252-7036</p>' +
                        '<pre style="font-size:10px;" class="bg-transparent card-text">Descr:' + etiqueta.Descripcion.substr(0, 8) + '<br>' +
                        'Marca:' + etiqueta.Marca.substr(0, 8) + '<br>' +
                        'Categ:' + etiqueta.Categoria.substr(0, 8) + '<br>' +
                        'Tamaño: S' + '<br>' +
                        'Precio:' + etiqueta.PrecioVenta.substr(0, 8) + '<br>' +
                        ' XX:' + etiqueta.PrecioCredito.substr(0, 8) + 'XX' + '<br>' +
                        '--------------------------' + '<br>' +
                        'Descr:' + etiqueta.Descripcion.substr(0, 8) + '<br>' +
                        'Marca:' + etiqueta.Marca.substr(0, 8) + '<br>' +
                        'Categ:' + etiqueta.Categoria.substr(0, 8) + '<br>' +
                        'Tamaño: S' + '<br>' +
                        'Precio:' + etiqueta.PrecioVenta.substr(0, 8) + '<br>' +
                        ' XX:' + etiqueta.PrecioCredito.substr(0, 8) + 'XX' + '<br>' +
                        'Tarjeta()Efectivo()Simpe()' +
                        '</pre>' +
                        '</div>' +
                        '</div>';
                    $('#contenedor-tarjetas-Etiqueta').append(tarjetaHTML);
                }

                for (var i = 0; i < etiqueta.M; i++) {
                    var tarjetaHTML =
                        '<div class="card my-1"style:height:246px; width:113px;>' +
                        '<div class="card-body">' +
                        '<p  style="font-size:12px;"class="bg-transparent card-text">Rosa y Añil</br>Tel:2252-7036</p>' +
                        '<pre style="font-size:10px;" class="bg-transparent card-text">Descr:' + etiqueta.Descripcion.substr(0, 8) + '<br>' +
                        'Marca:' + etiqueta.Marca.substr(0, 8) + '<br>' +
                        'Categ:' + etiqueta.Categoria.substr(0, 8) + '<br>' +
                        'Tamaño: M' + '<br>' +
                        'Precio:' + etiqueta.PrecioVenta.substr(0, 8) + '<br>' +
                        ' XX:' + etiqueta.PrecioCredito.substr(0, 8) + 'XX' + '<br>' +
                        '--------------------------' + '<br>' +
                        'Descr:' + etiqueta.Descripcion.substr(0, 8) + '<br>' +
                        'Marca:' + etiqueta.Marca.substr(0, 8) + '<br>' +
                        'Categ:' + etiqueta.Categoria.substr(0, 8) + '<br>' +
                        'Tamaño: M' + '<br>' +
                        'Precio:' + etiqueta.PrecioVenta.substr(0, 8) + '<br>' +
                        ' XX:' + etiqueta.PrecioCredito.substr(0, 8) + 'XX' + '<br>' +
                        'Tarjeta()Efectivo()Simpe()' +
                        '</pre>' +
                        '</div>' +
                        '</div>';
                    $('#contenedor-tarjetas-Etiqueta').append(tarjetaHTML);
                }

                for (var i = 0; i < etiqueta.L; i++) {
                    var tarjetaHTML =
                        '<div class="card my-1"style:height:246px; width:113px;>' +
                        '<div class="card-body">' +
                        '<p  style="font-size:12px;"class="bg-transparent card-text">Rosa y Añil</br>Tel:2252-7036</p>' +
                        '<pre style="font-size:10px;" class="bg-transparent card-text">Descr:' + etiqueta.Descripcion.substr(0, 8) + '<br>' +
                        'Marca:' + etiqueta.Marca.substr(0, 8) + '<br>' +
                        'Categ:' + etiqueta.Categoria.substr(0, 8) + '<br>' +
                        'Tamaño: L' + '<br>' +
                        'Precio:' + etiqueta.PrecioVenta.substr(0, 8) + '<br>' +
                        ' XX:' + etiqueta.PrecioCredito.substr(0, 8) + 'XX' + '<br>' +
                        '--------------------------' + '<br>' +
                        'Descr:' + etiqueta.Descripcion.substr(0, 8) + '<br>' +
                        'Marca:' + etiqueta.Marca.substr(0, 8) + '<br>' +
                        'Categ:' + etiqueta.Categoria.substr(0, 8) + '<br>' +
                        'Tamaño: L' + '<br>' +
                        'Precio:' + etiqueta.PrecioVenta.substr(0, 8) + '<br>' +
                        ' XX:' + etiqueta.PrecioCredito.substr(0, 8) + 'XX' + '<br>' +
                        'Tarjeta()Efectivo()Simpe()' +
                        '</pre>' +
                        '</div>' +
                        '</div>';
                    $('#contenedor-tarjetas-Etiqueta').append(tarjetaHTML);
                }

                for (var i = 0; i < etiqueta.XL; i++) {
                    var tarjetaHTML =
                        '<div class="card my-1"style:height:246px; width:113px;>' +
                        '<div class="card-body">' +
                        '<p  style="font-size:12px;"class="bg-transparent card-text">Rosa y Añil</br>Tel:2252-7036</p>' +
                        '<pre style="font-size:10px;" class="bg-transparent card-text">Descr:' + etiqueta.Descripcion.substr(0, 8) + '<br>' +
                        'Marca:' + etiqueta.Marca.substr(0, 8) + '<br>' +
                        'Categ:' + etiqueta.Categoria.substr(0, 8) + '<br>' +
                        'Tamaño: XL' + '<br>' +
                        'Precio:' + etiqueta.PrecioVenta.substr(0, 8) + '<br>' +
                        ' XX:' + etiqueta.PrecioCredito.substr(0, 8) + 'XX' + '<br>' +
                        '--------------------------' + '<br>' +
                        'Descr:' + etiqueta.Descripcion.substr(0, 8) + '<br>' +
                        'Marca:' + etiqueta.Marca.substr(0, 8) + '<br>' +
                        'Categ:' + etiqueta.Categoria.substr(0, 8) + '<br>' +
                        'Tamaño: XL' + '<br>' +
                        'Precio:' + etiqueta.PrecioVenta.substr(0, 8) + '<br>' +
                        ' XX:' + etiqueta.PrecioCredito.substr(0, 8) + 'XX' + '<br>' +
                        'Tarjeta()Efectivo()Simpe()' +
                        '</pre>' +
                        '</div>' +
                        '</div>';
                    $('#contenedor-tarjetas-Etiqueta').append(tarjetaHTML);
                }

                for (var i = 0; i < etiqueta.XXL; i++) {
                    var tarjetaHTML =
                        '<div class="card my-1"style:height:246px; width:113px;>' +
                        '<div class="card-body">' +
                        '<p  style="font-size:12px;"class="bg-transparent card-text">Rosa y Añil</br>Tel:2252-7036</p>' +
                        '<pre style="font-size:10px;" class="bg-transparent card-text">Descr:' + etiqueta.Descripcion.substr(0, 8) + '<br>' +
                        'Marca:' + etiqueta.Marca.substr(0, 8) + '<br>' +
                        'Categ:' + etiqueta.Categoria.substr(0, 8) + '<br>' +
                        'Tamaño: XXL' + '<br>' +
                        'Precio:' + etiqueta.PrecioVenta.substr(0, 8) + '<br>' +
                        ' XX:' + etiqueta.PrecioCredito.substr(0, 8) + 'XX' + '<br>' +
                        '--------------------------' + '<br>' +
                        'Descr:' + etiqueta.Descripcion.substr(0, 8) + '<br>' +
                        'Marca:' + etiqueta.Marca.substr(0, 8) + '<br>' +
                        'Categ:' + etiqueta.Categoria.substr(0, 8) + '<br>' +
                        'Tamaño: XXL' + '<br>' +
                        'Precio:' + etiqueta.PrecioVenta.substr(0, 8) + '<br>' +
                        ' XX:' + etiqueta.PrecioCredito.substr(0, 8) + 'XX' + '<br>' +
                        'Tarjeta()Efectivo()Simpe()' +
                        '</pre>' +
                        '</div>' +
                        '</div>';
                    $('#contenedor-tarjetas-Etiqueta').append(tarjetaHTML);
                }


            });
            print();
            location.href="../../view/Admin/Etiqueta.php"
        },
        error: function (e) {
            console.log(e.responseText);
        }
    });
});
