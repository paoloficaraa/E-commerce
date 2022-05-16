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

        if (checkAlreadyIn(productId)) {
            console.log("dentro");
            shoppingCart.forEach((item) => {
                if (item.get("productId") == productId) {
                    if (selectedQuantity != undefined) {
                        item.set(
                            "selectedQuantity",
                            parseInt(item.get("selectedQuantity")) + parseInt(selectedQuantity)
                        );
                    } else {
                        item.set(
                            "selectedQuantity",
                            (parseInt(item.get("selectedQuantity")) + 1))
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
    });

    function checkAlreadyIn(id) {
        shoppingCart.forEach(item => {
            if (item.get("productId") == id) {
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

    function getCookie(cName) {
        const name = cName + "=";
        const cDecoded = decodeURIComponent(document.cookie); //to be careful
        const cArr = cDecoded.split('; ');
        let res;
        cArr.forEach(val => {
            if (val.indexOf(name) === 0) res = val.substring(name.length);
        })
        return res;
    }

    $(".w-50.form-select").change(function() {
        set_cookie("quantity" + $(this).data("id") + "", $(this).val(), 24 * 365 * 10);
        console.log(getCookie("quantity" + $(this).data("id") + ""));

        let priceText = $(".product_price[data-id='" + $(this).data("id") + "']");
        let that = this;
        $.post(
            "ajax.php", { itemid: $(this).data("id") },
            function(product) {
                let json = $.parseJSON(product);
                let price = json.Price;
                var value = $(that).val();
                priceText.text(parseInt(price * value) + " ple");
                let subtotal = 0;
                const array = $(".product_price");
                Array.prototype.forEach.call(array, price => {
                    // Write your code here
                    const s = $(price).text().split(' ');
                    subtotal += parseInt(s[0]);
                });
                $("#cartPrice").text(subtotal + " ple");
            });
    });

    $("#updateQuantity").change(function() {
        let quantity = $(this).val()
        let productId = $(this).data("id")
        $.post("updateQuantityItem.php", { itemid: productId, quantity: quantity },
            function(result) {
                let json = $.parseJSON(result)
                let status = json.status
                if (status == "error") {
                    alert("error during the update")
                }
            }
        );
    })

});