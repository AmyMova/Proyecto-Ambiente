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


