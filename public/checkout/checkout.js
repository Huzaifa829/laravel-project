$(document).ready(function () {
    $('#proceedshipping').click( function () {
        alert("HERE");
        var firstname = document.getElementById('billinginfo-firstName').value;
        var lastname = document.getElementById('billinginfo-lastName').value;
        var email = document.getElementById('billinginfo-email').value;
        var phone = document.getElementById('billinginfo-phone').value;
        var address = document.getElementById('billinginfo-address').value;
        var country = document.getElementById('billing-country').value;
        var state = document.getElementById('billing-state').value;
        var zipcode = document.getElementById('billing-zipcode').value;
        var city = document.getElementById('billing-city').value;

        if (firstname == "") {
            document.getElementById("billinginfo-firstName").style.border="1px solid red";
        }
    });
});
