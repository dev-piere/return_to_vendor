<script>
    var qtyStdPerPack = ""
	var verifiedLocation = ""
	var verifiedStock = ""
    
    var state = 0;
</script>

<script>
    var session = <?= json_encode(employee()) ?>

    function createRequest() {
        var docNumber = document.getElementsByName("docNumber")[0].value;
        var reqItem = document.getElementsByName("reqItem")[0].value;
        var reqDate = document.getElementsByName("reqDate")[0].value;
        var qty = document.getElementsByName("reqQty")[0].value;
        var remarks = document.getElementsByName("remarks")[0].value;
        var stockQty = verifiedStock
        var oriLoc = verifiedLocation
        var reqUser = session.id_karyawan
        
        if (!qty > stockQty) {
            alert("Stock tidak cukup dengan jumlah request")
            return
        }

        $.ajax({
            url: "http://localhost/return_to_vendor/welcome/clientCreateRequest",
            dataType: 'json',
            data: {
                docNumber: docNumber,
                docDate: reqDate,
                stockQty: stockQty,
                oriLoc: oriLoc,
                trnLoc: "QC",
                qtyPerPack: qtyStdPerPack,
                itemID: reqItem,
                qty: qty,
                remarks: remarks,
                fileName: "-",
                reqUser: reqUser
            },
            method: 'GET'
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

            if (statusCode == 200) {

                console.log(document.getElementById("docNumber"));

                if (state == 0) {
                    state = 1;
                } else {
                    state = 0;
                }
                
                document.getElementsByName("docNumber")[0].value = "";
                document.getElementsByName("reqItem")[0].value = "";
                document.getElementsByName("reqDate")[0].value = "";
                document.getElementsByName("reqQty")[0].value = "";
                document.getElementsByName("remarks")[0].value = "";

                $("#modalStockLocation").toggleClass("hidden");
                $("#stockVerified").addClass("hidden")
                
                $("#stockLocation").html(
                    `<label class="flex justify-center pt-3 items-center">
                        <span class="text-[#575757]"> Request sudah berhasil dibuat </span> 
                    </label>`
                )
            }
        })
    }

$("#CTA").on("click", function() {
    createRequest();
})    
</script>

<script>
function select2_ini(target) {
    $(target).select2(
      {
        ajax: {
          url: "http://localhost/return_to_vendor/welcome/getClientItemMaster",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            console.log(params);
            return {
              q: params.term, // search term
              page: params.page
            };
          },
          processResults: function (data, params) {
            // parse the results into the format expected by Select2
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data, except to indicate that infinite
            // scrolling can be used
            params.page = params.page || 1;
            
            data = data.data
    
            return {
              results: data.record,
              pagination: {
                more: (params.page * 5) < data.total_count
              }
            };
          },
          cache: true
        },
        // placeholder: 'Ketik nama item disini',
        minimumInputLength: 0,
        templateResult: formatData,
        templateSelection: formatDataSelection
      }
    );
    $('.select2-selection__arrow[role="presentation"]').html('<span class="material-symbols-rounded text-[#929292]" id="expand">expand_more</span>')
}

function formatData (Data) {

  if (Data.loading) {
      return "Sedang mencari data....";
  }

  var $container = $(
      '<div>' +
          '<span class="flow-root font-bold">' + Data.ItemID + ' </span>' +
          '<span class="flow-root text-sm"> Part Number : ' + Data.PartNo  + ' </span>' +
          '<span class="flow-root text-sm"> Part Name : ' + Data.ItemDesc1  + ' </span>' +
      '</div>'
  );

  return $container;
}

function formatDataSelection (Data) {
  $("#uom").text(Data.ItemUom)
  qtyStdPerPack = Data.QtyStdPerPack

  $("#stockVerified").addClass("hidden")
  verifiedLocation = ""
  verifiedStock = ""
  return Data.ItemID || Data.text;
}

$(document).on('select2:open', function (e) {
    $('#expand').text("expand_less")
    document.querySelector(".select2-search__field").focus()
});

$(document).on('select2:close', function (e) {
    $('#expand').text("expand_more")
});

// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    select2_ini(".selectpicker")
});


function getStockLocation() {
    var itemID = document.getElementsByName("reqItem")[0].value;

    var visible = false;

    $("#stockLocation").html(
        `<label class="flex justify-center pt-3 items-center">
            <span class="text-[#575757]"> Sedang mengambil data.... </span> 
        </label>`
    )

    $.ajax({
        url: "http://localhost/return_to_vendor/welcome/getClientStock",
        dataType: 'json',
        data: {
            itemID: itemID,
        },
    })
    .done(function(data) {
        var statusCode = data.status;
        var message = data.message;
        var data = data.data;

        if (statusCode == 400) {
            $("#stockVerified").addClass("hidden")

            verifiedLocation = ""
            verifiedStock = ""

            $("#stockLocation").html(
                '<label class="flex justify-center pt-3 items-center">'+
                    '<span class="text-[#575757]">' + message + '</span> '+
                '</label>'
            )
        }

        if (statusCode == 401) {
            alert(message + ' ' + statusCode)
        }

        if (statusCode == 500) {
            alert(message + ' ' + statusCode)
        }

        if (statusCode == 200) {
            if (state == 0) {
                state = 1;
            } else {
                state = 0;
            }
                $("#modalStockLocation").toggleClass("hidden")
                $("#stockVerified").removeClass("hidden")

                verifiedLocation = data[0].TrnLoc
                verifiedStock = data[0].Stock
                
                console.log(verifiedLocation)
                console.log(verifiedStock)
                console.log(document.getElementsByName("reqQty")[0].value > verifiedStock)

                $("#verifyText").text(data[0].TrnLoc)
                $("#verifyStock").text(data[0].Stock)
                $("#verifyQtyPerPack").text(qtyStdPerPack + " Per Pack")
        }
    })
}

function openModal() {
    if (state == 0) {
        $("#modalStockLocation").toggleClass("hidden")
        getStockLocation()
        state = 1;
    } else {
        $("#modalStockLocation").toggleClass("hidden")
        state = 0;
    }
}

$("#checkStock, #backdrop").on("click", function(){
    openModal();
})
</script>