function odeslatRecenziu() {
    var formData = {
        nazovProduktu: $('#nazovProduktu').val(),
        hodnotenie: $('#hodnotenie').val(),
        recenzia: $('#recenzia').val()
    };

    $.ajax({
        type: 'POST',
        url: '/?c=recenzie&a=naplnenie',
        data: formData,
        dataType: 'json',
        encode: true,
        success: function (response) {
            console.log(response);
            location.reload();
        },
        error: function (error) {
            console.error("Chyba pri komunikacii so serverom: " + JSON.stringify(error));
            alert("Chyba pri odosielani recenzie: " + error.responseJSON.message);
        }
    });
}
