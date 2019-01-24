$(document).ready(function () {
    //closes shopping cart at start of the page
    $(".shopping-cart").fadeToggle("fast");

    $(".badge").html(0);

    //On click to get a character
    $(".btn").on("click", ".btn_add_js", function () {
        var gameId = $(this).attr("value");
        addToCart(gameId);
    });

    cart();
});

function addToCart(gameId) {
    console.log(gameId);
    $.ajax({
        type: 'POST',
        url: "inc/add_to_cart.php",
        data: {
            gameID: gameId,
        },
        success: function (data) {
            data = JSON.parse(data);
            console.log(data);
            var count = data.cart.length;
            var price = data.cartPrice;
            var name = data.cartName;
            var img = data.cartImg;
            var id = data.id;


            var temp_array = [];
            for(var i = 0; i < data.cart.length; i++){
                temp_array.push({id: data.cart[i], image: data.cartImg[i], name: data.cartName[i], price: data.cartPrice[i]});
            }
            console.log(temp_array);
            //
            $('.badge').html(count);

            var template = $("#template").html();

            var renderTemplate = Mustache.render(template, temp_array);

            $(".shopping-cart-items").html(renderTemplate);

            for (i = 1; i < data.cart.length; i++) {



            }
        }
    })
}

function cart() {

    $("#cart").on("click", function () {
        $(".shopping-cart").fadeToggle("fast");
    });

}