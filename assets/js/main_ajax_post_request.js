function createRequest() {
    var docNumber = document.getElementsByName("docNumber")[0].value;
    var reqItem = document.getElementsByName("reqItem")[0].value;
    var reqDate = document.getElementsByName("reqDate")[0].value;
    var qty = document.getElementsByName("reqQty")[0].value;
    var remarks = document.getElementsByName("remarks")[0].value;
    
    // stockQty
    // qtyPerPack
    // oriLoc
    // trnLoc
    // reqUser
    // fileName

    $.ajax({
        url: 'http://localhost/apiSefong/v2/local/ReturnToVendor/createRequest',
        dataType: 'json',
        data: {
            secretKey: '9u8231dsk29u9',
            docNumber: docNumber,
            docDate: reqDate,
            itemID: reqItem,
            qty: qty,
            remarks: remarks
        },
        method: 'POST'
    })
    .done(function(data) {
        var statusCode = data.status;
        var message = data.message;
        var data = data.data;

        if (statusCode == 400) {
            alert(message + ' ' + data + ' ' + statusCode)
        }

        if (statusCode == 401) {
            alert(message + ' ' + statusCode)
        }

        if (statusCode == 500) {
            alert(message + ' ' + statusCode)
        }
    })
}

$(document).ready(function () {
    $("#CTA").on("click", function() {
        createRequest();
    })    
})