$(document).ready(function () {

    $('#buyme').on('click', function (e) {
        e.preventDefault();
        let id_good = $(this).attr("data-id").substr(5);
        $.ajax({
            url: "/order/add/",
            type: "post",
            data: {
                id_good: id_good,
                quantity: 1
            },
            error: function () {
                alert("Что-то пошло не так...");
            },
            success: function (answer) {
                alert("Товар добавлен в корзину!");
            },
            dataType: "json"
        })
    });

    $('#del_basket_element').on('click', function (e) {
        e.preventDefault();
        let id_basket = $(this).attr("data-id");
        $.ajax({
            url: "/basket/delete/",
            type: "get",
            data: {
                id_basket: id_basket,
                quantity: 1
            },
            error: function () {
                alert("Что-то пошло не так...");
            },
            success: function (card_id) {
                alert("Товар удален из корзины!");
                console.log(`#card_id`);
                $(`#card_id`).css('visibility', 'hidden');
            },
            dataType: "json"
        })
    });

});
