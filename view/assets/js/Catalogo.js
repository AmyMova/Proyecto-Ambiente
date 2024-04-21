/*Funcion para limpieza de los formularios*/
function limpiarForms() {
    $("#modulos_ver_informacion").trigger("reset");
}

/*Funcion para cancelacion del uso de formulario de modificación*/
function cancelarForm() {
    limpiarForms();
    $("#formulario_update").hide();
}
var datosJSON;

function DatosAJSON() {
    $.ajax({
        url: './../../Controller/CatalogoController.php?op=Catalogo',
        dataType: 'json',
        success: function (data) {
            // Asigna los datos y luego llama a la función
            datosJSON = data;
            displayProductsData(datosJSON);
        }
    });
}

window.addEventListener("DOMContentLoaded", () => {
    DatosAJSON();
    displaycategoryData();
    displayBrandsData();
});


const productContainer = document.querySelector(".products_wrapper");
const BrandContainer = document.querySelector(".Brand_wrapper");
const CategoryContainer = document.querySelector(".Category_wrapper");
const inputElem = document.querySelector(".form-control");

function displayProductsData(datosJSON) {

    let displayData = datosJSON.map(function (producto) {
        return `<div class="product">
                <div class="image">
                <img class="imagen" src="../assets/img/${producto.Imagen}"alt="">
                </div>
                <div class="contenido">
                <h3 class="titulo">${producto.Descripcion}</h3>
                <p class="precio">
                Precio:${producto.PrecioV}
                </p>
                </div>
                <div class="row button-group justify-content-center">
                ${producto.Opcion}
                <p class="CantXS" hidden>
                ${producto.CantXS}
                </p>
                <p class="CantS" hidden>
                ${producto.CantS}
                </p>
                <p class="CantM" hidden>
                ${producto.CantM}
                </p>
                <p class="CantL" hidden>
                ${producto.CantL}
                </p>
                <p class="CantXL" hidden>
                ${producto.CantXL}
                </p>
                <p class="CantXXL" hidden>
                ${producto.CantXXL}
                </p>
                <p class="URLImagen" hidden>
                ${producto.Imagen}
                </p>
                <p class="Id" hidden>
                ${producto.IdProducto}
                </p>
                </div>
                </div> `;
    });
    displayData = displayData.join("");
    productContainer.innerHTML = displayData;


}

function displaycategoryData() {
    $.ajax({
        url: './../../Controller/CatalogoController.php?op=Categoria',
        dataType: 'json',
        success: function (data) {
            let displayData = data.map(function (categoria) {
                return `<li class="sidebar-item "><a href="#" data-id="${categoria.Categoria}"class="sidebar-link"><span class="hide-menu">
                ${categoria.Categoria}</span></a></li>`;
            });
            displayData = displayData.join("");
            CategoryContainer.innerHTML = displayData;

        }
    })
}

function displayBrandsData() {
    $.ajax({
        url: './../../Controller/CatalogoController.php?op=Marca',
        dataType: 'json',
        success: function (data) {
            let displayData = data.map(function (brand) {
                return `<li class="sidebar-item "><a href="#" data-id="${brand.Marca}"class="sidebar-link"><span class="hide-menu">
                ${brand.Marca}</span></a></li>`;
            });
            displayData = displayData.join("");
            BrandContainer.innerHTML = displayData;

            const Enlaces = document.querySelectorAll(".sidebar-link ");
            Enlaces.forEach((links) => {
                links.addEventListener("click", (e) => {
                    const category = e.target.dataset.id;
                    const productos = datosJSON.filter(function (data) {
                        if (data.Categoria === category) {
                            return data;
                        } if (data.Marca === category) {
                            return data;
                        }
                    });
                    if (category === "ALL") {
                        displayProductsData(datosJSON);
                    }
                    else {
                        displayProductsData(productos);
                    }
                })
            })
        }
    })
}


$(document).on("click", '#VerMas', function () {
    var card = $(this).closest('.product');//primero se encuentra la tarjeta 
    var titulo = card.find('.titulo').text();//este es el titulo
    var precio = card.find('.precio').text(); //este es el precio
    //Las cantidades de cada talla disponible
    var XS = card.find('.CantXS').text();
    var S = card.find('.CantS').text();
    var M = card.find('.CantM').text();
    var L = card.find('.CantL').text();
    var XL = card.find('.CantXL').text();
    var XXL = card.find('.CantXXL').text();
    var imagen = card.find('.URLImagen').text();
    var imagen = card.find('.Id').text();
    var textosinsalto = imagen.replace(/\n/g, "");
    $(".card-img-top").attr('src', '../assets/img/' + textosinsalto.trim());
    $(".card-title").html(titulo);//titulo de la tarjeta
    $(".modal-title").html(titulo);//titulo del modal

    $(".precioModal").html(precio);//precio del producto
    $(".XSModal").html('Cantidad disponible en talla XS : ' + XS);
    $(".SModal").html('Cantidad disponible en talla S : ' + S);
    $(".MModal").html('Cantidad disponible en talla M : ' + M);
    $(".LModal").html('Cantidad disponible en talla L : ' + L);
    $(".XLModal").html('Cantidad disponible en talla XL : ' + XL);
    $(".XXLModal").html('Cantidad disponible en talla XXL : ' + XXL);
    $(".XXLModal").html('Cantidad disponible en talla XXL : ' + XXL);



});

$(document).on("click", '#comprar', function () {
    var card = $(this).closest('.product');//primero se encuentra la tarjeta 
    var titulo = card.find('.titulo').text();//este es el titulo
    var precio = card.find('.precio').text(); //este es el precio
    //Las cantidades de cada talla disponible
    var XS = card.find('.CantXS').text();
    var S = card.find('.CantS').text();
    var M = card.find('.CantM').text();
    var L = card.find('.CantL').text();
    var XL = card.find('.CantXL').text();
    var XXL = card.find('.CantXXL').text();
    var imagen = card.find('.URLImagen').text();
    var id = card.find('.Id').text();
    var textosinsalto = imagen.replace(/\n/g, "");
    $(".card-img-top").attr('src', '../assets/img/' + textosinsalto.trim());
    $(".card-title").html(titulo);//titulo de la tarjeta
    $(".modal-title").html(titulo);//titulo del modal

    $(".precioModal").html(precio);//precio del producto
    $(".XSModal").html('Disponible: ' + XS);
    $(".SModal").html('Disponible: ' + S);
    $(".MModal").html('Disponible: ' + M);
    $(".LModal").html('Disponible: ' + L);
    $(".XLModal").html('Disponible: ' + XL);
    $(".XXLModal").html('Disponible: ' + XXL);
    $(".ID").val( id);



});



