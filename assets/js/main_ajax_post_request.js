function createRequest() {
    var docNumber = document.getElementsByName("docNumber")[0].value;
    var reqItem = document.getElementsByName("reqItem")[0].value;
    var reqDate = document.getElementsByName("reqDate")[0].value;
    var qty = document.getElementsByName("reqQty")[0].value;
    var remarks = document.getElementsByName("remarks")[0].value;
    var stockQty = verifiedStock
    var oriLoc = verifiedLocation
    
    if (qty > stockQty) {
        alert("Stock tidak cukup dengan jumlah request")
        return
    }

    // trnLoc
    // reqUser
    // fileName

    $.ajax({
        url: 'http://192.168.20.251/apiSefong/v2/local/ReturnToVendor/createRequest',
        dataType: 'json',
        data: {
            secretKey: '9u8231dsk29u9',
            docNumber: docNumber,
            docDate: reqDate,
            stockQty: stockQty,
            oriLoc: oriLoc,
            trnLoc: "QC",
            qtyPerPack: qtyStdPerPack,
            itemID: reqItem,
            qty: qty,
            remarks: remarks,
            fileName: "-"
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

$("#CTA").on("click", function() {
    createRequest();
})    