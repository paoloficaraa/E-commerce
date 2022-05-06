$(document).ready(function() {
    const shoppingCart = new Array();

    $(".btn.btn-primary.form-control").click(function() {

        var s = $(this).attr("id");
        const array = s.split(",");
        var productId = array[0];
        var name = array[1];
        var desc = array[2];
        var price = array[3];
        var quantity = array[4];
        var thumbnail = array[5];
        var selectedQuantity = $("#selectedQuantity").val();

        if (checkThereAlreadyIs(productId)) {
            shoppingCart.forEach((item) => {
                if (item.get("productId") == productId) {
                    if (selectedQuantity != undefined) {
                        item.set(
                            "selectedQuantity",
                            eval(item.get("selectedQuantity")) + eval(selectedQuantity)
                        );
                    } else {
                        item.set(
                            "selectedQuantity",
                            eval(item.get("selectedQuantity")) + 1
                        );
                    }
                    set_cookie(
                        "item[" + productId + "]",
                        productId + " " + item.get("selectedQuantity"),
                        24 * 365 * 10
                    );
                }
            });
            shoppingCart.forEach((item) => {
                if (item.get("productId") == productId) {
                    if (selectedQuantity != undefined) {
                        item.set(
                            "selectedQuantity",
                            eval(item.get("selectedQuantity")) + eval(selectedQuantity)
                        );
                    } else {
                        item.set(
                            "selectedQuantity",
                            eval(item.get("selectedQuantity")) + 1
                        );
                    }
                    set_cookie(
                        "item[" + productId + "]",
                        productId + " " + item.get("selectedQuantity"),
                        24 * 365 * 10
                    );
                }
            });
        } else {
            if (selectedQuantity != undefined) {
                shoppingCart.push(
                    new Map([
                        ["productId", productId],
                        ["name", name],
                        ["description", desc],
                        ["price", price],
                        ["quantity", quantity],
                        ["thumbnail", thumbnail],
                        ["selectedQuantity", selectedQuantity],
                    ])
                );
                set_cookie(
                    "item[" + productId + "]",
                    productId + " " + selectedQuantity,
                    24 * 365 * 10
                );
            } else {
                shoppingCart.push(
                    new Map([
                        ["productId", productId],
                        ["name", name],
                        ["description", desc],
                        ["price", price],
                        ["quantity", quantity],
                        ["thumbnail", thumbnail],
                        ["selectedQuantity", 1],
                    ])
                );
                //console.log(productId + " " + 1);
                set_cookie(
                    "item[" + productId + "]",
                    productId + " " + 1,
                    24 * 365 * 10
                );
            }
        }
        console.log("added");
        console.log(
            shoppingCart[shoppingCart.length - 1].get("productId") +
            " " +
            shoppingCart[shoppingCart.length - 1].get("selectedQuantity") +
            "\n"
        );
    });

    function checkThereAlreadyIs(productId) {
        shoppingCart.forEach((item) => {
            if (item.get("productId") == productId) {
                return true;
            }
        });
        return false;
    }

    function set_cookie(cookiename, cookievalue, hours) {
        var date = new Date();
        date.setTime(date.getTime() + Number(hours) * 3600 * 1000);
        document.cookie =
            cookiename +
            "=" +
            cookievalue +
            "; path=/;expires = " +
            date.toGMTString();
    }

    $(".w-50.form-select").change(function() {
        let priceText = $(".product_price[data-id='" + $(this).data("id") + "']");
        let that=this;
        $.post(
            "ajax.php", { itemid: $(this).data("id") },
            function(product) {
                let json = $.parseJSON(product);
                let price = json.Price;
                var value = $(that).val();
                priceText.text(parseInt(price * value).toFixed(2));
            });
    });
});
