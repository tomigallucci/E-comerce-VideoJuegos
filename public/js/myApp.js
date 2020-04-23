addNumToFav()
$(document).on('click', '.addToFav', function() {
    var id = $(this).attr('idProduct');
    let data = new FormData();
    data.append('id', id)
    $.ajax({
        url: "api/Products",
        method: "POST",
        data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(answer) {

            addToFav(answer);
            addNumToFav()
        }
    })
})

$(document).on('click', '.merch-btn', function() {

    var id = $(this).attr('idProduct');

    let data = new FormData();
    data.append('id', id);
    data.append('getMerchandise', 'ok');
    $.ajax({
        url: "http://localhost:8000/api/Merchandises",
        method: "POST",
        data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: async function(answer) {
            console.log(await answer)
            await addToKart(answer);
            await addNumToKart()

        }
    })
    Swal.queue([{
        title: 'Añadiendo producto al carrito2',
        showCancelButton: true,
        showCloseButton: true,
        cancelButtonText: 'Seguir comprando',
        confirmButtonText: 'Ir al carrito',
        showLoaderOnConfirm: true,
        preConfirm: async() => {

            window.location = "cart"

        }
    }])

});

$(document).on('click', '.addToKart', function() {

    var id = $(this).attr('idProduct');

    let data = new FormData();
    data.append('id', id);

    $.ajax({
        url: "http://localhost:8000/api/Products",
        method: "POST",
        data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: async function(answer) {

            await addToKart(answer);
            await addNumToKart()

        }
    })
    Swal.queue([{
        title: 'Añadiendo producto al carrito1',
        showCancelButton: true,
        showCloseButton: true,
        cancelButtonText: 'Seguir comprando',
        confirmButtonText: 'Ir al carrito',
        showLoaderOnConfirm: true,
        preConfirm: async() => {

            window.location = "cart"

        }
    }])

});

function DeleteItemKart() {

    // // Obtenemos el producto ID que hay en el boton pulsado
    // let id = this.getAttribute('item');
    // // Borramos todos los productos
    // carrito = carrito.filter(function (carritoId) {
    //     return carritoId !== id;
    // });
    // // volvemos a renderizar
    // renderizarCarrito();
    // // Calculamos de nuevo el precio
    // calcularTotal();
}
var listProduct = [];


if (localStorage.getItem('cartList') != "") {
    listProduct = JSON.parse(localStorage.getItem('cartList'));
    addNumToKart()

} else {
    listProduct = [];
}

function addToKart(a) {
    console.log(a);
    var storage = localStorage;

    listProduct.push({ "id": a.id, "game": a.title, "image": a.image, "stockI": a.stock, "stockF": (a.stock - 1), "price": a.sale_price })

    storage.setItem('cartList', JSON.stringify(listProduct));

    // calculateTotal(JSON.stringify(listProduct));

}

function calculateTotal(a) {
    // Limpiamos precio anterior
    total = 0;
    JSON.parse(a).forEach(element => {
        if (element.price) {

            total += element.price;

        }
    });
}
var listFav = [];

if (localStorage.getItem('favList') != "") {
    listFav = JSON.parse(localStorage.getItem('favList'));
} else {
    listFav = [];
}
$(".cartList").ready(cartReady)

function addToFav(a) {

    var storage = localStorage;

    listFav.push({ "id": a.id, "game": a.title, "desc": a.description, "image": a.image, "price": a.sale_price })

    storage.setItem('favList', JSON.stringify(listFav));

}

async function addNumToFav() {
    if (localStorage.getItem('favList')) {
        cart = JSON.parse(localStorage.getItem('favList'));
        num = (cart.length);
        $("#cantFav").children().remove();
        $("#cantFav").html(num);
    }

}
async function addNumToKart() {
    if (localStorage.getItem('cartList')) {
        cart = JSON.parse(localStorage.getItem('cartList'));
        num = (cart.length);
        $("#cantProd").children().remove();
        $("#cantProd").html(num);
    }
}
var sum = [];
favReady()

function favReady() {
    let fav = localStorage.getItem('favList');

    if (localStorage.getItem('favList') == "" || localStorage.getItem('favList') == null) {
        $(".favList").append(`<div class="item">
        NO HAY PRODUCTO AGREGADOS A FAVORITO
    </div>`)
    } else {
        fav = JSON.parse(fav);
        const reducer = (accumulator, currentValue) => accumulator + currentValue;
        $("#fav").html(fav.length + " Favorites items");
        for (let i = 0; i < fav.length; i++) {
            const element = fav[i];

            $(".favList").append(`<div class="item shadow-lg" style="padding-top: 20px">
                                  <div class="row">
                                      <div class="col-md-3" style="margin-left: 40px">
                                          <img src="${element.image}" class="img-thumbnail" alt="Default"> 
                                      </div>
                                      <div class="col-md-8">
                                          <div class="title" style="font-size: 2em;">${element.game} <a style="color: red">&times;</a></div>                                          
                                          <div class="desc"style="padding-top: 20px">Price ${element.desc}<div>
                                          <div class="price"style="padding-top: 20px">Price ${element.price}<div>
                                      </div>
                                  </div>
                              </div>`)
        }
    }
}

function cartReady() {
    let cart = localStorage.getItem('cartList');

    if (localStorage.getItem('cartList') == "" || localStorage.getItem('cartList') == null) {
        $(".cartList").append(`<div class="item">
        NO HAY PRODUCTO AGREGADOS AL CARRITO
    </div>`)
    } else {
        cart = JSON.parse(cart);
        const reducer = (accumulator, currentValue) => accumulator + currentValue;
        $("#item").html(cart.length + " Items");
        for (let i = 0; i < cart.length; i++) {
            const element = cart[i];
            let cant = Math.round(Number(element.stockI) - Number(element.stockF));
            let total = Math.round(Number(element.price) * Number(cant));
            sum.push(Number(element.price) * Number(cant));
            $(".cartList").append(`<div class="item" style="padding-top: 20px">
                                  <div class="row">
                                      <div class="col-md-3" style="margin-left: 40px">
                                          <img src="${element.image}" class="img-thumbnail" alt="Default"> 
                                      </div>
                                      <div class="col-md-8">
                                          <div class="title" style="font-size: 2em;">${element.game} <a style="color: red">&times;</a></div>                                          
                                          <div class="cant" style="padding-top: 20px">Quantity ${cant}</div>
                                          <div class="precio"style="padding-top: 20px">Price ${total}<div>
                                      </div>
                                  </div>
                              </div>`)
        }
        $("#cantMerch").html(cart.length);
        $("#estMerch").html(Math.round(sum.reduce(reducer), 2));
        $("#taxMerch").html(Math.round((sum.reduce(reducer) * 21 / 100), 2));

        $("#totalMerch").html(Math.round(sum.reduce(reducer) + (sum.reduce(reducer) * 21 / 100), 2));
    }
}

$("#couponDescount").change(function() {
    val = $(this).val();
    if (val === "FREECOUPON") {

        $(".col-md-5 .box .box-body").children('.form-group.t.c').after(`
        <div class="form-group t">
            <p> Coupon: </p><p id="cantMerch">- 1500</p>
        </div>
     `)
        $("#totalMerch").html(Math.round(Number($("#totalMerch").html()) - 1500, 2))
    }
});

$('.btnAdmin').on('click', function() {
        window.location = "/admin"
    })
    /* globals Chart:false, feather:false */
    // ad()

// function ad() {
//     'use strict'

//     feather.replace()

//     // Graphs
//     var ctx = document.getElementById('myChart')
//         // eslint-disable-next-line no-unused-vars
//     var myChart = new Chart(ctx, {
//         type: 'line',
//         data: {
//             labels: [
//                 'Sunday',
//                 'Monday',
//                 'Tuesday',
//                 'Wednesday',
//                 'Thursday',
//                 'Friday',
//                 'Saturday'
//             ],
//             datasets: [{
//                 data: [
//                     15339,
//                     21345,
//                     18483,
//                     24003,
//                     23489,
//                     24092,
//                     12034
//                 ],
//                 lineTension: 0,
//                 backgroundColor: 'transparent',
//                 borderColor: '#007bff',
//                 borderWidth: 4,
//                 pointBackgroundColor: '#007bff'
//             }]
//         },
//         options: {
//             scales: {
//                 yAxes: [{
//                     ticks: {
//                         beginAtZero: false
//                     }
//                 }]
//             },
//             legend: {
//                 display: false
//             }
//         }
//     })
// }

$(document).ready(function() {
    console.log('Admin panel load');
    // adminPanel('api/Users',null, 'GET');
    datatableDynamic('.tableUser', 'http://localhost:8000/api/Users');
    datatableDynamic('.tableProducts', 'http://localhost:8000/api/Products');
    datatableDynamic('.tableCategories', 'http://localhost:8000/api/Categories')
    datatableDynamic('.tableTrademarks', 'http://localhost:8000/api/Trademarks')
    datatableDynamic('.tableLanguages', 'http://localhost:8000/api/Languages')
    datatableDynamic('.tableMerchandise', 'http://localhost:8000/api/Merchandises')
    datatableDynamic('.tableOfferdays', 'http://localhost:8000/api/Offerdays')
        // countdown(new Date('2020-03-18'), 'clock', 'gil');

    // function getRemainingTime(deadline) {
    //     var now = new Date(),
    //         remainTime = (new Date(deadline) - now + 1000) / 1000,
    //         remainSeconds = ('0' + Math.floor(remainTime % 60)).slice(-2),
    //         remainMinutes = ('0' + Math.floor(remainTime / 60 % 60)).slice(-2),
    //         remainHours = ('0' + Math.floor(remainTime / 3600 % 24)).slice(-2),
    //         remainDays = Math.floor(remainTime / (3600 * 24));
    //     return {
    //         remainSeconds,
    //         remainMinutes,
    //         remainHours,
    //         remainDays,
    //         remainTime
    //     }
    // };

    // function countdown(deadline, elem, finalMessage) {

    //     const el = $("#" + elem);

    //     const timerUpdate = setInterval(function() {
    //         var t = getRemainingTime(deadline);
    //         if (el) {
    //             el.append('<div class="box-footer"><div class="alert alert-danger">' + `${t.remainDays}d:${t.remainHours}h:${t.remainMinutes}m:${t.remainSeconds}s` + '</div></div>');
    //         }
    //         if (t.remainTime <= 1) {
    //             clearInterval(timerUpdate);

    //             el.html(finalMessage);
    //         }
    //     }, 1000)
    // };
    // countdown(new Date('2020-03-18'), 'clock', 'gil');
    // $('.btn-warning').number(true, 2);
    var fiveSeconds = new Date().getTime() + 5000;
    $('#clock').countdown(fiveSeconds, { elapse: true })
        .on('update.countdown', function(event) {
            var $this = $(this);
            if (event.elapsed) {
                $this.html(event.strftime('After end: <span>%H:%M:%S</span>'));
            } else {
                $this.html(event.strftime('To end: <span>%H:%M:%S</span>'));
            }
        });
});
// user
$(".newPhoto").change(function() {

    var image = this.files[0];

    if (image["type"] != "image/jpeg" && image["type"] != "image/png") {

        $(".newPhoto").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else if (image["size"] > 5000000) {

        $(".newPhoto").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 5MB!",
            icon: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else {
        var dataImage = new FileReader;
        dataImage.readAsDataURL(image);
        $(dataImage).on("load", function(event) {
            var routeImage = event.target.result;

            $(".preview").attr("src", routeImage);

        })
    }
});
$("#newEmail").change(async function() {

    $(".alert").remove();

    var user = $(this).val();
    var data = { "email": user };
    var answer = await adminPanel('http://localhost:8000/api/Users', data, 'POST');
    if (answer) {

        $("#newEmail").parent().after('<div class="alert alert-warning">Este email ya existe en la base de datos</div>');

        $("#newEmail").val("");

    }
})

$(".tableUser").on("click", ".btnEditUser", async function() {
    var idUser = $(this).attr("idUser");
    var data = { "id": idUser, "getUser": 1 };
    var answer = await adminPanel('http://localhost:8000/api/Users', data, 'POST');
    if (answer) {

        $("#name").val(answer.name);
        $("#lastname").val(answer.lastname);
        $("#email").val(answer.email);
        $("#birthday").val(answer.birthday);
        $("#oldPhoto").val(answer.image);
        $("#oldPassword").val(answer.password);
        console.log(answer.image);
        if (answer.image != null) {
            $(".preview").attr("src", "http://localhost:8000/" + answer.image);
        }
    }
})
$(".tableUser").on("click", ".btnActive", async function() {

    swal.fire({
        title: 'El usuario ha sido actualizado',
        icon: 'success',
        confirmButtonText: '¡Cerrar!'
    }).then(function(result) {
        if (result.value) {

            window.location = '/admin/users';

        }
    })

    var idUser = $(this).attr("idUser");
    var statusUser = $(this).attr("statusUser");
    console.log(idUser, statusUser);
    var data = { "id": idUser, "activateOrDesactivateUser": statusUser };
    await adminPanel('http://localhost:8000/api/Users', data, 'POST');

    // $.ajax({

    //   url:"ajax/users.ajax.php",
    //   method: "POST",
    //   data: data,
    //   cache: false,
    //   contentType: false,
    //   processData: false,
    //   success: function(respuesta){

    //       	if(window.matchMedia("(max-width:767px)").matches){

    //       		 swal({
    // 		      title: "El usuario ha sido actualizado",
    // 		      type: "success",
    // 		      confirmButtonText: "¡Cerrar!"
    // 		    }).then(function(result) {
    // 		        if (result.value) {

    // 		        	window.location = "users";

    // 		        }


    // 			});

    //       	}

    // 	}

    // })

    // if(statusUser == 0){

    // 	$(this).removeClass('btn-success');
    // 	$(this).addClass('btn-danger');
    // 	$(this).html('Desactivado');
    // 	$(this).attr('statusUser',1);

    // }else{

    // 	$(this).addClass('btn-success');
    // 	$(this).removeClass('btn-danger');
    // 	$(this).html('Activado');
    // 	$(this).attr('statusUser',0);

    // }

})
$(".tableUser").on("click", ".btnDeleteUser", function() {

    var idUser = $(this).attr("idUser");
    var photo = $(this).attr("image");

    swal.fire({
        title: '¿Está seguro de borrar el usuario?',
        text: "¡Si no lo está puede cancelar la accíón!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar usuario!'
    }).then(function(result) {
        if (result.value) {
            window.location = "admin/users/" + idUser + "/" + photo;
        }
    })

})
$("#newPurchasePrice, #editPurchasePrice").change(function() {
    var a = document.getElementsByClassName('alert-warning');
    $(a).remove();
    var valPercentage = $(this).val();
    var newPercentage = $('.newPercentage').val();


    if ($(".percentage").prop("checked")) {



        if ($(".dolar").prop("checked")) {

            var valDollar = $(".newDollar").val();
            var dolar = Number((valPercentage * valDollar));
            var percentage = Number((dolar * newPercentage / 100) + dolar);
            var editPercentage = Number((dolar * newPercentage / 100)) + dolar;

        } else {

            var percentage = Number((valPercentage * newPercentage / 100)) + Number($("#newPurchasePrice").val());
            var editPercentage = Number(($("#editPurchasePrice").val() * newPercentage / 100)) + Number($("#editPurchasePrice").val());

        }

        $("#newSalePrice").val(percentage);
        $("#newSalePrice").prop("readonly", true);
        $("#editSalePrice").val(editPercentage);
        $("#editSalePrice").prop("readonly", true);

    } else {

        if ($(".dolar").prop("checked")) {
            var valDolar = $(".newDollar").val();
            var dolar = Number((valPercentage * valDolar));
            var percentage = dolar;
            var editPercentage = dolar;
        }

        $("#newSalePrice").val(percentage);
        $("#newSalePrice").prop("readonly", true);

        $("#editSalePrice").val(editPercentage);
        $("#editSalePrice").prop("readonly", true);
    }
})
$(".newPercentage").change(function() {
    var a = $('.newPercentage').val();
    var b = $('.newDollar').val();
    if ($(".percentage").prop("checked")) {
        if ($(".dolar").prop("checked")) {
            var dolar = Number(($("#newPurchasePrice").val() * b));
            var percentage = Number((dolar * a / 100)) + dolar;
            var editPercentage = Number((dolar * a / 100)) + dolar;
        } else {
            var percentage = Number(($("#newPurchasePrice").val() * a / 100)) + Number($("#newPurchasePrice").val());
            var editPercentage = Number(($("#editPurchasePrice").val() * a / 100)) + Number($("#editPurchasePrice").val());
        }
        $("#newSalePrice").val(percentage);
        $("#newSalePrice").prop("readonly", true);
        $("#editSalePrice").val(editPercentage);
        $("#editSalePrice").prop("readonly", true);
    }
})
$(".newDollar").change(function() {
    var a = $('.newPercentage').val();
    var b = $('.newDollar').val();
    if ($(".percentage").prop("checked")) {
        if ($(".dolar").prop("checked")) {
            var valPercentage = $(this).val();
            var dolar = Number(($("#newPurchasePrice").val() * b));
            var percentage = Number((dolar * a / 100)) + dolar;
            var editPercentage = Number((dolar * a / 100)) + dolar;

        } else {
            var valPercentage = $(this).val();
            var percentage = Number(($("#newPurchasePrice").val() * a / 100)) + Number($("#newPurchasePrice").val());
            var editPercentage = Number(($("#editPurchasePrice").val() * a / 100)) + Number($("#editPurchasePrice").val());
        }
        $("#newSalePrice").val(percentage);
        $("#newSalePrice").prop("readonly", true);
        $("#editSalePrice").val(editPercentage);
        $("#editSalePrice").prop("readonly", true);
    }
})
$(".percentage").on("ifUnchecked", function() {
    $("#newSalePrice").prop("readonly", false);
    $("#editSalePrice").prop("readonly", false);
})
$(".percentage").on("ifChecked", function() {
    $("#newSalePrice").prop("readonly", true);
    $("#editSalePrice").prop("readonly", true);
})
$(".tableMerchandise").on("click", "button.btnEditMerchandise", async function() {

    var idMerchandise = $(this).attr("idMerchandise");

    var data = { "id": idMerchandise, "getMerchandise": "ok" };
    const answer = await adminPanel('http://localhost:8000/api/Merchandises', data, 'POST');
    console.log(answer);
    $("#editCode").val(answer.code);

    $("#editTitle").val(answer.title);
    $("#editStock").val(answer.stock);
    $("#editPurchase_price").val(answer.purchase_price);

    $("#editSale_price").val(answer.sale_price);

    if (answer.image != "") {

        $("#editPhoto").val(answer.image);
        $("#actualPhoto").val(answer.image);


        $(".preview").attr("src", "http://localhost:8000/" + answer.image);

    }

})
$(".tableMerchandise").on("click", "button.btnDeleteMerchandise", function() {
    var idMerchandise = $(this).attr("idMerchandise");
    var code = $(this).attr("code");
    swal.fire({
        title: '¿Está seguro de borrar el producto?',
        text: "¡Si no lo está puede cancelar la accíón!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar producto!'
    }).then(function(result) {
        if (result.value) {
            window.location = "merchandises/" + idMerchandise + "/" + code;
        }
    })
})
$(".tableProducts").on("click", "button.btnEditProduct", async function() {

    var idProduct = $(this).attr("idProduct");

    var data = { "id": idProduct, "getProduct": "ok" };
    const answer = await adminPanel('http://localhost:8000/api/Products', data, 'POST');
    console.log(answer);
    if (answer.categories) {
        var category = await JSON.parse(answer.categories);
        getCategories(category);
    }
    if (answer.languages) {
        var languages = await JSON.parse(answer.languages);
        getLanguages(languages);

    }
    if (answer.trademarks) {
        var trademark = await JSON.parse(answer.trademarks);
        getTrademarks(trademark);
    }

    $("#editCode").val(answer.code);

    $("#editTitle").val(answer.title);

    $("#editDescription").val(answer.description);

    $("#editStock").val(answer.stock);
    $("#editReleaseDate").val(answer.release_date);
    if (answer.isDlc == 1) {
        $("#isDlc1").prop('checked', true);
    } else {
        $("#isDlc2").prop('checked', true);
    }
    $("#editPurchase_price").val(answer.purchase_price);

    $("#editSale_price").val(answer.sale_price);

    if (answer.image != "") {

        $("#editPhoto").val(answer.image);
        $("#actualPhoto").val(answer.image);


        $(".preview").attr("src", "http://localhost:8000/" + answer.image);

    }

})
$(".tableProducts").on("click", "button.btnDeleteProduct", function() {
    var idProduct = $(this).attr("idProduct");
    var code = $(this).attr("code");
    swal.fire({
        title: '¿Está seguro de borrar el producto?',
        text: "¡Si no lo está puede cancelar la accíón!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar producto!'
    }).then(function(result) {
        if (result.value) {
            window.location = "products/" + idProduct + "/" + code;
        }
    })
})
$("#newCategories").change(async function() {
    idCategory = $(this).val();
    var data = { "id": idCategory };
    const answer = await adminPanel('http://localhost:8000/api/Categories', data, 'POST')
    if (answer) {
        await $(".categories").append('<a class="btn btn-xs btn-success" style="margin-top: 5px; margin-left: 3px">' + answer.name + '<i class="fa fa-ban text-red"></i><input type="hidden" class="category" categories="' + answer.name + '" /></a>');
        await $("#newCategories").val('');
    }
    listCategories()
})
$("#editCategories").change(async function() {
    idCategory = $(this).val();
    console.log(idCategory);
    var data = { "id": idCategory };
    const answer = await adminPanel('http://localhost:8000/api/Categories', data, 'POST');
    if (answer) {
        $(".categories1").append('<a class="btn btn-xs btn-success" style="margin-top: 5px; margin-left: 3px">' + answer.name + '<i class="fa fa-ban text-red"></i><input type="hidden" class="category1" categories="' + answer.name + '" /></a>');
    }
    listCategories1();
})

$("#newLanguage").change(function() {
    var language = $('#newLanguage').val();
    $('.languages').append(`<a class="btn btn-primary btn-xs" role="button" style="padding: 3px">${language} <i class="fa fa-times remove" style="color: red;"></i><input type="hidden" class="language" language="${language}" /></a>`);
    $("#newLanguage").val('');
    listLanguage()
})
$("#editLanguages").change(function() {
    var language = $('#editLanguages').val();
    $('.languages1').append(`<a class="btn btn-primary btn-xs" role="button" style="padding: 3px">${language} <i class="fa fa-times remove" style="color: red;"></i><input type="hidden" class="language1" language="${language}" /></a>`);
    $("#editLanguages").val('');
    listLanguage1()
})
$(".tableLanguages").on("click", ".btnEditlanguage", async function() {
    var idLanguage = $(this).attr("idLanguage");

    var data = { "id": idLanguage };
    const answer = await adminPanel('http://localhost:8000/api/Languages', data, 'POST');
    console.log(answer);
    if (answer) {
        $("#editLanguage").val(answer.name);
        $("#idLanguage").val(answer.id);
    }
})
$(".tableLanguages").on("click", ".btnDeleteLanguage", function() {
    var idLanguage = $(this).attr("idLanguage");
    swal.fire({
        title: '¿Está seguro de borrar el idioma?',
        text: "¡Si no lo está puede cancelar la acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar categoría!'
    }).then(function(result) {
        if (result.value) {
            window.location = "languages/" + idLanguage;
        }
    })
})
$(".tableCategories").on("click", ".btnEditCategory", async function() {
    var idCategory = $(this).attr("idCategory");

    var data = { "id": idCategory };
    const answer = await adminPanel('http://localhost:8000/api/Categories', data, 'POST');
    if (answer) {
        $("#editCategory").val(answer.name);
        $("#idCategory").val(answer.id);
    }
})
$(".tableCategories").on("click", ".btnDeleteCategory", function() {
    var idCategories = $(this).attr("idCategory");
    swal.fire({
        title: '¿Está seguro de borrar la categoría?',
        text: "¡Si no lo está puede cancelar la acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar categoría!'
    }).then(function(result) {
        if (result.value) {
            window.location = "categories/" + idCategories;
        }
    })
})
$(".tableTrademarks").on("click", ".btnEditTrademark", async function() {
    var idTrademark = $(this).attr("idTrademark");
    var data = { "id": idTrademark };
    const answer = await adminPanel('http://localhost:8000/api/Trademarks', data, 'POST');
    if (answer) {
        $("#editTrademark").val(answer.name);
        $("#idTrademark").val(answer.id);
    }
})
$(".tableTrademarks").on("click", ".btnDeleteTrademark", function() {
    var idTrademark = $(this).attr("idTrademark");
    swal.fire({
        title: '¿Está seguro de borrar la categoría?',
        text: "¡Si no lo está puede cancelar la acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar categoría!'
    }).then(function(result) {
        if (result.value) {
            window.location = "admin/trademarks/" + idTrademark;
        }
    })
})
$(document).on("click", ".fa-ban", function() {
    $(this).parent().remove();
    listLanguage()
    listCategories()
    listLanguage1()
    listCategories1()
})
$(document).on('click', '.remove', function() {
    $(this).parent().remove();
    listLanguage()
    listCategories()
    listLanguage1()
    listCategories1()
})
var list = [];
async function getCategories(array) {
    for (i = 0; i < array.length; i++) {
        var data = { "id": array[i].id }
        const answer = await adminPanel('http://localhost:8000/api/Categories', data, 'POST');
        if (answer) {
            $(".categories1")
                .append('<a class="btn btn-xs btn-success" style="margin-top: 5px; margin-left: 3px">' + answer.name + '<i class="fa fa-ban text-red">  </i><input type="hidden" categories="' + answer.name + '" /></a>');
            list.push({ "id": answer.id, "category": answer.name });
            $("#listCategory1").val(JSON.stringify(list));
        }
    }
}
var listLg = [];
async function getLanguages(array) {
    array.forEach(async(element) => {
        var data = { "id": element.id }
        const answer = await adminPanel('http://localhost:8000/api/Languages', data, 'POST');
        if (answer) {
            $(".languages1")
                .append('<a class="btn btn-xs btn-primary" style="margin-top: 5px; margin-left: 3px">' + answer.name + '<i class="fa fa-times" style="color: red"></i><input type="hidden" categories="' + answer.name + '" /></a>');
            listLg.push({ "id": answer.id, "language": answer.name });
            $("#listLanguages1").val(JSON.stringify(listLg));
        }
    });
}

async function getTrademarks(array) {
    var data = { "id": array };
    const answer = await adminPanel('http://localhost:8000/api/Trademarks', data, 'POST');
    if (answer) {
        $("#editTrademark").val(answer.name);
        $("#editTrademarkId").val(answer.id);
    }
}
async function listLanguage() {
    var listLg = [];
    var languages = $(".language");
    for (var i = 0; i < languages.length; i++) {
        let name = $(languages[i]).attr('language');
        var data = { "name": name }
        const answer = await adminPanel('http://localhost:8000/api/Languages', data, 'POST');
        if (answer) {
            listLg.push({ "id": answer[0].id, "language": answer[0].name });
            $("#listLanguages").val(JSON.stringify(listLg));
        }
    }
}
async function listLanguage1() {
    //var list = [];
    var languages = $(".language1");
    for (var i = 0; i < languages.length; i++) {
        let name = $(languages[i]).attr('language');
        var data = { "name": name }
        const answer = await adminPanel('http://localhost:8000/api/Languages', data, 'POST');
        if (answer) {
            listLg.push({ "id": answer[0].id, "language": answer[0].name });
            $("#listLanguages1").val(JSON.stringify(listLg));
        }
    }
}
$(".btnDelete").on("click", function() {
    $(".languages1").children().remove();
    $(".languages").children().remove();
    $(".categories1").children().remove();
    $(".categories").children().remove();
    listLg = [];
    list = [];
});

async function listCategories() {
    var list = [];
    var categories = $(".category");
    for (var i = 0; i < categories.length; i++) {
        let name = $(categories[i]).attr('categories');
        var data = { "name": name };
        const answer = await adminPanel('http://localhost:8000/api/Categories', data, 'POST');
        if (answer) {
            list.push({ "id": answer[0].id, "category": answer[0].name });
            $("#listCategory").val(JSON.stringify(list));
        }
    }
}
async function listCategories1() {
    //var list = [];
    var categories = $(".category1");
    for (var i = 0; i < categories.length; i++) {
        let name = $(categories[i]).attr('categories');
        var data = { "name": name };
        const answer = await adminPanel('http://localhost:8000/api/Categories', data, 'POST');
        if (answer) {
            list.push({ "id": answer[0].id, "category": answer[0].name });
            $("#listCategory1").val(JSON.stringify(list));
        }
    }
}

function adminPanel(url, data, method) {
    var url = url;
    var data;
    if (!data) {
        return fetch(url, {
                method: method
            }).then(function(response) {
                return response.json();
            })
            .then(function(myJson) {
                return (myJson);
            });
        A

    } else {
        let result;
        return fetch(url, {
                method: method, // or 'PUT'
                body: JSON.stringify(data), // data can be `string` or {object}!
                headers: {
                    'Content-Type': 'application/json'
                }

            })
            .then(function(response) {
                return response.json();
            })
            .then(function(myJson) {
                return (myJson);
            });
    }
}

function datatableDynamic(table, url) {

    $(table).DataTable({
        "ajax": url,
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        // "language": {
        //     "sProcessing": "Procesando...",
        //     "sLengthMenu": "Mostrar _MENU_ registros",
        //     "sZeroRecords": "No se encontraron resultados",
        //     "sEmptyTable": "Ningún dato disponible en esta tabla",
        //     "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        //     "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        //     "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        //     "sInfoPostFix": "",
        //     "sSearch": "Buscar:",
        //     "sUrl": "",
        //     "sInfoThousands": ",",
        //     "sLoadingRecords": "Cargando...",
        //     "oPaginate": {
        //         "sFirst": "Primero",
        //         "sLast": "Último",
        //         "sNext": "Siguiente",
        //         "sPrevious": "Anterior"
        //     },
        //     "oAria": {
        //         "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        //         "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        //     }
        // }
    });
}

$(document).on('click', '.inpCheck', function() {
    cantInp = $('.inpCheck').length;

    pos = this;
});

function offerOff(a, b) {
    $('#' + b).countdown(a)
        .on('update.countdown', function(event) {
            var format = '%Dd:%Hh:%Mm:%Ss';

            $(this).html(`<div class="box-footer">
                            <div class="alert alert-danger">
                            ${event.strftime(format)}
                            </div>
                        </div>`);
        })
        .on('finish.countdown', function(event) {
            $(this).html(`<div class="btn btn-danger">
                            This offer has expired!
                        </div>`)
                .parent()
                .addClass('disabled');
        });

}
clock()
async function clock() {
    var data = { "offerOn": "1" };
    var discount = await adminPanel('http://localhost:8000/api/Offerdays', data, 'POST');
    var data1 = { "id": discount[0].product_id, "getProduct": "ok" };
    var product = await adminPanel('http://localhost:8000/api/Products', data1, 'POST');
    console.log(await discount[0].product_id);
    console.log(product);
    console.log(discount);
    // 
    if (discount && discount[0].offerOn == 1) {
        if (product) {
            $("#clock").before(`<div class="box text-center">
                                    <div class="box-header">
                                        <div class="btn btn-success">
                                            ${product.title}
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div>
                                            <img src="${product.image}" style="width: 100%">
                                            <div class="btn-warning">
                                                ${discount[0].discount}%  $${discount[0].price_discount}
                                            </div>
                                        </div>
                                    </div>
                            </div>`);
            await offerOff(discount[0].date_limit, 'clock');
        }
    }
}