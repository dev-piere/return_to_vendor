function select2_ini(target) {
    $(target).select2(
      {
        ajax: {
          url: "http://localhost/apiSefong/v2/local/ReturnToVendor/getItemMaster?secretKey=9u8231dsk29u9",
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
      return "Sedang mencari....";
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
  return Data.ItemID || Data.text;
}

$(document).on('select2:open', function (e) {
    $('#expand').text("expand_less")
});

$(document).on('select2:close', function (e) {
    $('#expand').text("expand_more")
});

// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    select2_ini(".selectpicker")
});