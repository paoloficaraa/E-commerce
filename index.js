$(document).ready(function() {

    const shoppingCart = new Array();

    $(".btn.btn-primary.form-control").click(function() {
        // var productId = $("id").val();
        // var name = $("#name").val();
        // var desc = $("#desc").val();
        // var price = $("#price").val();
        // var quantity = $("#quantity").val();
        // var thumbnail = $("#thumbnail").val();

        var s = $(this).attr("id");
        const array = s.split(',');
        var productId = array[0];
        var name = array[1];
        var desc = array[2];
        var price = array[3];
        var quantity = array[4];
        var thumbnail = array[5];
        var selectedQuantity = $("#selectedQuantity").val();

        if (checkThereAlreadyIs(productId)) {
            for (var i = 0; i < shoppingCart.length; i++) {
                if (shoppingCart[i].get("productId") == productId) {
                    if (selectedQuantity != undefined) {
                        shoppingCart[i].set("selectedQuantity", eval(shoppingCart[i].get("selectedQuantity")) + eval(selectedQuantity));
                    } else {
                        shoppingCart[i].set("selectedQuantity", eval(shoppingCart[i].get("selectedQuantity")) + 1);
                    }
                    set_cookie('item[' + productId + ']', productId + " " + shoppingCart[i].get("selectedQuantity"), 24 * 365 * 10);
                }
            }
        } else {
            if (selectedQuantity != undefined) {
                shoppingCart.push(new Map([
                    ["productId", productId],
                    ["name", name],
                    ["description", desc],
                    ["price", price],
                    ["quantity", quantity],
                    ["thumbnail", thumbnail],
                    ["selectedQuantity", selectedQuantity]
                ]));
                set_cookie('item[' + productId + ']', productId + " " + selectedQuantity, 24 * 365 * 10);
            } else {
                shoppingCart.push(new Map([
                    ["productId", productId],
                    ["name", name],
                    ["description", desc],
                    ["price", price],
                    ["quantity", quantity],
                    ["thumbnail", thumbnail],
                    ["selectedQuantity", 1]
                ]));
                //console.log(productId + " " + 1);
                set_cookie('item[' + productId + ']', productId + " " + 1, 24 * 365 * 10);
            }
        }
        console.log("added");
        console.log(shoppingCart[shoppingCart.length - 1].get("productId") + " " + shoppingCart[shoppingCart.length - 1].get("selectedQuantity") + "\n");

    });

    function checkThereAlreadyIs(productId) {
        for (var i = 0; i < shoppingCart.length; i++) {
            if (shoppingCart[i].get("productId") == productId) {
                return true;
            }
        }
        return false;
    }

    // $("divCart").ready(function() {
    //     var div = "";
    //     if (shoppingCart.length > 0) {
    //         shoppingCart.forEach((item) => {
    //             div += "<div class='row border-top py-3 mt-3'><div class='col-sm-2'><img src='" + item.get("thumbnail") + "' alt='' style='height: 120px;' class='img-fluid'></div><div class='col-sm-8'><h5 class='font-baloo font-size-20'>" + item.get("name") + "</h5><small>Jean Monnet</small><div class='qty d-flex pt-2'><div class='d-flex font-rale w-50'><select name='quantity' class='w-50 form-select'>";
    //             if (eval(item.get("quantity")) > 0) {
    //                 div += "<option selected value='" + item.get("selectedQuantity") + "'>Q.ty " + item.get("selectedQuantity") + "</option>";
    //                 if (eval(item.get("selectedQuantity")) > 0) {
    //                     for (var i = 0; i < eval(item.get("quantity")); i++) {
    //                         div += "<option value='" + i + "'>Q.ty " + i + "</option>";
    //                     }
    //                 }
    //             }
    //             div += "</select></div><form action='' method='post'><input type='hidden' name='productId' value='" + item.get("id") + "'><button type='submit' name='btnDelete' class='btn font-baloo text-danger px-3 border-right'>Delete</button></form><button type='submit' class='btn font-baloo text-primary'>Wish list</button></div></div><div class='col-sm-2 text-right'><div class='font-size-20 text-dark font-baloo'><span class='product_price'>" + item.get("price") + " ple</span></div></div></div>";
    //             console.log("siamo dentro");
    //         });
    //     } else {
    //         console.log("niente");
    //     }
    //     $("divCart").html(div);
    // });

    function set_cookie(cookiename, cookievalue, hours) {
        var date = new Date();
        date.setTime(date.getTime() + Number(hours) * 3600 * 1000);
        document.cookie = cookiename + "=" + cookievalue + "; path=/;expires = " + date.toGMTString();
    }
});