$(document).ready(function() {
    const shoppingCart = new Array();

    //Cookies.set("shoppingCart", JSON.stringify(shoppingCart));

    $(".btn.btn-primary.form-control").click(function() {
        var productId = $(this).attr("id");
        var quantity = $("#quantity").val();
        if (checkThereAlreadyIs(productId)) {
            for (var i = 0; i < shoppingCart.length; i++) {
                if (shoppingCart[i].get("productId") == productId) {
                    if (quantity != undefined)
                        shoppingCart[i].get("quantity") = eval(shoppingCart[i].get("quantity")) + eval(quantity);
                    else shoppingCart[i].get("quantity") += 1;
                }
            }
        } else {
            if (quantity != undefined)
                shoppingCart.push(new Map([
                    ["productId", productId],
                    ["quantity", quantity]
                ]));
            else
                shoppingCart.push(new Map([
                    ["productId", productId],
                    ["quantity", 1]
                ]));
        }
        // console.log(
        //     shoppingCart[shoppingCart.length - 1].get("productId") +
        //     " " +
        //     shoppingCart[shoppingCart.length - 1].get("quantity") +
        //     "\n");
        // Cookies.set("shoppingCart", JSON.stringify(shoppingCart));
    });

    function checkThereAlreadyIs(productId) {
        for (var i = 0; i < shoppingCart.length; i++) {
            if (shoppingCart[i].get("productId") == productId) {
                return true;
            }
        }
        return false;
    }

    function createItemsCart(){
        
    }
});