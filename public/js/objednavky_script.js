$(document).ready(function () {
    $('.toggleFullText').on('click', function (e) {
        e.preventDefault();
        var cardBody = $(this).closest('.card-body');
        cardBody.toggleClass('expanded');
        cardBody.find('.card-text').toggle();
        cardBody.find('.card-text-full').toggle();

        var buttonText = cardBody.hasClass('expanded') ? 'Skryť' : 'Zobraziť viac';
        $(this).text(buttonText);
    });

    $('.addToCart').on('click', function () {
        var idProduktu = $(this).data('id');
        var nazovProduktu = $(this).data('nazov');
        var cenaProduktu = $(this).data('cena');

        pridatDoKosika(idProduktu, nazovProduktu, cenaProduktu);
    });

    function pridatDoKosika(idProduktu, nazovProduktu, cenaProduktu) {
        var produktInfo = {
            id: idProduktu,
            nazov: nazovProduktu,
            cena: cenaProduktu
        };

        $.ajax({
            type: "POST",
            url: "?c=kosik&a=vytvorObjednavku",
            data: produktInfo,
            dataType: "json",
            success: function (response) {
                console.log(response);
            },
            error: function (error) {
                console.error("Chyba pri komunikácii so serverom: " + JSON.stringify(error));
            }
        });
    }
});
