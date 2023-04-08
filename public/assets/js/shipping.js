function checkmultishipping(){
    var city = $("#checkout-city").val();
    var countrycode = "AE";
    var productcode = "N"
    var postalcode = $("#checkout-postcode").val();
    var length = $("#length").val();

    console.log(length);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type:'POST',
        url:'/getMultiShipmentRates',
        data: {
            'city' : city,
            'postalcode' : postalcode,
            'countrycode' : countrycode,
            'productcode' : productcode
        },
        success: function (response) {
            console.log(response);
        }
    });
}
