
    function pridatDoKosika(idProduktu, nazovProduktu, cenaProduktu) {
    var produktInfo = {
    id: idProduktu,
    nazov: nazovProduktu,
    cena: cenaProduktu
};
    $.ajax({
    type: "POST",
    url: "/pridat-do-kosika.php",
    data: produktInfo,
    success: function(response) {
    console.log(response);
},
    error: function(error) {
    console.error("Chyba pri komunikácii so serverom: " + error);
}
});
}
