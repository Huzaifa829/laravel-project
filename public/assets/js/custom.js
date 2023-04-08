// sticky header

jQuery(window).scroll(function () {
  if (jQuery(this).scrollTop() > 42) {
    jQuery("header.header-wraper").addClass("fixed");
  } else {
    jQuery("header.header-wraper").removeClass("fixed");
  }
});

// product slider
jQuery(".slider-for").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: ".slider-nav",
  pauseOnHover: true,
});
jQuery(".slider-nav").slick({
  slidesToShow: 8,
  slidesToScroll: 1,
  asNavFor: ".slider-for",
  dots: false,
  vertical: true,
  focusOnSelect: true,
  pauseOnHover: true,
});

// jQuery('.slider-for-modal').slick({
//     slidesToShow: 1,
//     slidesToScroll: 1,
//     arrows: false,
//     fade: true,
//     asNavFor: '.slider-nav-modal',
//     pauseOnHover: true,
// });
// jQuery('.slider-nav-modal').slick({
//     slidesToShow: 8,
//     slidesToScroll: 1,
//     asNavFor: '.slider-for-modal',
//     dots: false,
//     vertical: true,
//     focusOnSelect: true
// });

let qtyPopupToggler = document.getElementById("qty-popup-open");
let qtyPopupClose = document.getElementById("qty-popup-close");
let qtyPopup = document.getElementById("qty-popup");
let body = document.getElementById("qty-popup-overlay");

qtyPopupToggler.onclick = function () {
  if (qtyPopup.classList.contains("show")) {
    qtyPopupToggler.classList.remove("active");
    body.classList.remove("active");
    qtyPopup.classList.remove("show");
  } else {
    qtyPopupToggler.classList.add("active");
    body.classList.add("active");
    qtyPopup.classList.add("show");
  }
};
qtyPopupClose.onclick = function () {
  if (qtyPopup.classList.contains("show")) {
    qtyPopupToggler.classList.remove("active");
    body.classList.remove("active");
    qtyPopup.classList.remove("show");
  } else {
    qtyPopupToggler.classList.add("active");
    body.classList.add("active");
    qtyPopup.classList.add("show");
  }
};

const acc_button = document.getElementById("acc_button");
const acc_content = document.getElementById("acc_content");

function handleTabOpen(button) {
    var tabTarget = button.getAttribute("data-target");
    var tabContent = button.getAttribute("data-tab");

  button.classList.add("active")
  // current button active class action
  if(!$(this).hasClass('active')){
    // tab content show hide
    $('#acc_content-'+tabContent).find('.active').removeClass('active');
    $("#"+tabTarget).addClass('active');
  }

};

var div_top = $('.tab-nav').offset().top;
$(window).scroll(function() {
    var window_top = $(window).scrollTop() + 30  + $("header.header-wraper").height();
    if (window_top > div_top) {
        if (!$('.tab-nav').is('.sticky')) {
            $('.tab-nav').addClass('sticky');
            $('.tab-content').addClass('sticky');
        }
    } else {
        $('.tab-nav').removeClass('sticky');
        $('.tab-content').removeClass('sticky');
    }
});


 $('body').on('click', ".image-open-class", function() {
    var image = $(this).attr('data-id');
    $(".mySlides").css("display", "none");
    $("#" + image).css("display", "block");
    $('#myModal').modal('show');
});

$('#myModal').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus')
})

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("demo");
    let captionText = document.getElementById("caption");
    if (n > slides.length) {
        slideIndex = 1
    }

    if (n < 1) {
        slideIndex = slides.length
    }

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }

    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    // captionText.innerHTML = dots[slideIndex - 1].alt;
}

function calculateship(){
    var length = $("#length").val();
    var width = $("#width").val();
    var height = $("#height").val();
    var weight = $("#weight").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type:'GET',
        url:'/getSingleShipment',
        data: {
            'length' : length,
            'width' : width,
            'height' : height,
            'weight' : weight
        },
        success: function (response) {
            $.each(response.products, function(index, value){
                $('#productnameshipping').text(value.productName);
                $.each(value.totalPrice, function (index, valueprice) {
                    if (valueprice.priceCurrency == "AED") {
                        $('#shippingprice').text('AED '+valueprice.price)
                    }
                });
            });



$("#exampleModalCenter").modal('show');
        }
    });
}

var el_up = document.getElementById("GFG_UP");
var el_down = document.getElementById("GFG_DOWN");
var mob_qty = document.getElementById("mob_quen");
// el_up.innerHTML = "Click on button to get ID";
function GFG_click(clicked) {
    el_down.innerHTML = +clicked;
    $('#mob_quen').val(el_down.innerHTML);
    let qtyPopupClose = document.getElementById("qty-popup-close");
    let qtyPopup = document.getElementById("qty-popup");
    let body = document.getElementById("qty-popup-overlay");
    if (clicked == 1) {
        document.getElementById("checkvisible").style.display = "block";
        document.getElementById("checkvisible2").style.display = "none";
        document.getElementById("checkvisible3").style.display = "none";
        document.getElementById("checkvisible4").style.display = "none";
        document.getElementById("checkvisible5").style.display = "none";
        document.getElementById("checkvisible6").style.display = "none";
        document.getElementById("checkvisible7").style.display = "none";
        document.getElementById("checkvisible8").style.display = "none";
        document.getElementById("checkvisible9").style.display = "none";
        document.getElementById("checkvisible10").style.display = "none";
        document.getElementById('1').style.backgroundColor = "#32323233";
        document.getElementById('2').style.backgroundColor = "#F7F7F7";
        document.getElementById('3').style.backgroundColor = "#F7F7F7";
        document.getElementById('4').style.backgroundColor = "#F7F7F7";
        document.getElementById('5').style.backgroundColor = "#F7F7F7";
        document.getElementById('6').style.backgroundColor = "#F7F7F7";
        document.getElementById('7').style.backgroundColor = "#F7F7F7";
        document.getElementById('8').style.backgroundColor = "#F7F7F7";
        document.getElementById('9').style.backgroundColor = "#F7F7F7";
        document.getElementById('10').style.backgroundColor = "#F7F7F7";
        qtyPopupToggler.classList.remove("active");
        body.classList.remove("active");
        qtyPopup.classList.remove("show");
    } else if (clicked == 2) {
        document.getElementById("checkvisible2").style.display = "block";
        document.getElementById("checkvisible").style.display = "none";
        document.getElementById("checkvisible3").style.display = "none";
        document.getElementById("checkvisible4").style.display = "none";
        document.getElementById("checkvisible5").style.display = "none";
        document.getElementById("checkvisible6").style.display = "none";
        document.getElementById("checkvisible7").style.display = "none";
        document.getElementById("checkvisible8").style.display = "none";
        document.getElementById("checkvisible9").style.display = "none";
        document.getElementById("checkvisible10").style.display = "none";
        document.getElementById('2').style.backgroundColor = "#32323233";
        document.getElementById('1').style.backgroundColor = "#F7F7F7";
        document.getElementById('3').style.backgroundColor = "#F7F7F7";
        document.getElementById('4').style.backgroundColor = "#F7F7F7";
        document.getElementById('5').style.backgroundColor = "#F7F7F7";
        document.getElementById('6').style.backgroundColor = "#F7F7F7";
        document.getElementById('7').style.backgroundColor = "#F7F7F7";
        document.getElementById('8').style.backgroundColor = "#F7F7F7";
        document.getElementById('9').style.backgroundColor = "#F7F7F7";
        document.getElementById('10').style.backgroundColor = "#F7F7F7";
        qtyPopupToggler.classList.remove("active");
        body.classList.remove("active");
        qtyPopup.classList.remove("show");
    } else if (clicked == 3) {
        document.getElementById("checkvisible3").style.display = "block";
        document.getElementById("checkvisible2").style.display = "none";
                document.getElementById("checkvisible").style.display = "none";
                document.getElementById("checkvisible4").style.display = "none";
                document.getElementById("checkvisible5").style.display = "none";
                document.getElementById("checkvisible6").style.display = "none";
                document.getElementById("checkvisible7").style.display = "none";
                document.getElementById("checkvisible8").style.display = "none";
                document.getElementById("checkvisible9").style.display = "none";
                document.getElementById("checkvisible10").style.display = "none";
                document.getElementById('3').style.backgroundColor = "#32323233";
                document.getElementById('1').style.backgroundColor = "#F7F7F7";
                document.getElementById('2').style.backgroundColor = "#F7F7F7";
                document.getElementById('4').style.backgroundColor = "#F7F7F7";
                document.getElementById('5').style.backgroundColor = "#F7F7F7";
                document.getElementById('6').style.backgroundColor = "#F7F7F7";
                document.getElementById('7').style.backgroundColor = "#F7F7F7";
                document.getElementById('8').style.backgroundColor = "#F7F7F7";
                document.getElementById('9').style.backgroundColor = "#F7F7F7";
                document.getElementById('10').style.backgroundColor = "#F7F7F7";
                qtyPopupToggler.classList.remove("active");
                body.classList.remove("active");
                qtyPopup.classList.remove("show");
            } else if (clicked == 4) {
                document.getElementById("checkvisible4").style.display = "block";
                document.getElementById("checkvisible2").style.display = "none";
                document.getElementById("checkvisible3").style.display = "none";
                document.getElementById("checkvisible").style.display = "none";
                document.getElementById("checkvisible5").style.display = "none";
                document.getElementById("checkvisible6").style.display = "none";
                document.getElementById("checkvisible7").style.display = "none";
                document.getElementById("checkvisible8").style.display = "none";
                document.getElementById("checkvisible9").style.display = "none";
                document.getElementById("checkvisible10").style.display = "none";
                document.getElementById('4').style.backgroundColor = "#32323233";
                document.getElementById('1').style.backgroundColor = "#F7F7F7";
                document.getElementById('2').style.backgroundColor = "#F7F7F7";
                document.getElementById('3').style.backgroundColor = "#F7F7F7";
                document.getElementById('5').style.backgroundColor = "#F7F7F7";
                document.getElementById('6').style.backgroundColor = "#F7F7F7";
                document.getElementById('7').style.backgroundColor = "#F7F7F7";
                document.getElementById('8').style.backgroundColor = "#F7F7F7";
                document.getElementById('9').style.backgroundColor = "#F7F7F7";
                document.getElementById('10').style.backgroundColor = "#F7F7F7";
                qtyPopupToggler.classList.remove("active");
                body.classList.remove("active");
                qtyPopup.classList.remove("show");
            } else if (clicked == 5) {
                document.getElementById("checkvisible5").style.display = "block";
                document.getElementById("checkvisible2").style.display = "none";
                document.getElementById("checkvisible3").style.display = "none";
                document.getElementById("checkvisible4").style.display = "none";
                document.getElementById("checkvisible").style.display = "none";
                document.getElementById("checkvisible6").style.display = "none";
                document.getElementById("checkvisible7").style.display = "none";
                document.getElementById("checkvisible8").style.display = "none";
                document.getElementById("checkvisible9").style.display = "none";
                document.getElementById("checkvisible10").style.display = "none";
                document.getElementById('5').style.backgroundColor = "#32323233";
                document.getElementById('1').style.backgroundColor = "#F7F7F7";
                document.getElementById('2').style.backgroundColor = "#F7F7F7";
                document.getElementById('3').style.backgroundColor = "#F7F7F7";
                document.getElementById('4').style.backgroundColor = "#F7F7F7";
                document.getElementById('6').style.backgroundColor = "#F7F7F7";
                document.getElementById('7').style.backgroundColor = "#F7F7F7";
                document.getElementById('8').style.backgroundColor = "#F7F7F7";
                document.getElementById('9').style.backgroundColor = "#F7F7F7";
                document.getElementById('10').style.backgroundColor = "#F7F7F7";
                qtyPopupToggler.classList.remove("active");
                body.classList.remove("active");
                qtyPopup.classList.remove("show");
            } else if (clicked == 6) {
                document.getElementById("checkvisible6").style.display = "block";
                document.getElementById("checkvisible2").style.display = "none";
                document.getElementById("checkvisible3").style.display = "none";
                document.getElementById("checkvisible4").style.display = "none";
                document.getElementById("checkvisible").style.display = "none";
                document.getElementById("checkvisible5").style.display = "none";
                document.getElementById("checkvisible7").style.display = "none";
                document.getElementById("checkvisible8").style.display = "none";
                document.getElementById("checkvisible9").style.display = "none";
                document.getElementById("checkvisible10").style.display = "none";
                document.getElementById('6').style.backgroundColor = "#32323233";
                document.getElementById('1').style.backgroundColor = "#F7F7F7";
                document.getElementById('2').style.backgroundColor = "#F7F7F7";
                document.getElementById('3').style.backgroundColor = "#F7F7F7";
                document.getElementById('4').style.backgroundColor = "#F7F7F7";
                document.getElementById('5').style.backgroundColor = "#F7F7F7";
                document.getElementById('7').style.backgroundColor = "#F7F7F7";
                document.getElementById('8').style.backgroundColor = "#F7F7F7";
                document.getElementById('9').style.backgroundColor = "#F7F7F7";
                document.getElementById('10').style.backgroundColor = "#F7F7F7";
                qtyPopupToggler.classList.remove("active");
                body.classList.remove("active");
                qtyPopup.classList.remove("show");
            } else if (clicked == 7) {
                document.getElementById("checkvisible7").style.display = "block";
                document.getElementById("checkvisible2").style.display = "none";
                document.getElementById("checkvisible3").style.display = "none";
                document.getElementById("checkvisible4").style.display = "none";
                document.getElementById("checkvisible").style.display = "none";
                document.getElementById("checkvisible5").style.display = "none";
                document.getElementById("checkvisible6").style.display = "none";
                document.getElementById("checkvisible8").style.display = "none";
                document.getElementById("checkvisible9").style.display = "none";
                document.getElementById("checkvisible10").style.display = "none";
                document.getElementById('7').style.backgroundColor = "#32323233";
                document.getElementById('1').style.backgroundColor = "#F7F7F7";
                document.getElementById('2').style.backgroundColor = "#F7F7F7";
                document.getElementById('3').style.backgroundColor = "#F7F7F7";
                document.getElementById('4').style.backgroundColor = "#F7F7F7";
                document.getElementById('5').style.backgroundColor = "#F7F7F7";
                document.getElementById('6').style.backgroundColor = "#F7F7F7";
                document.getElementById('8').style.backgroundColor = "#F7F7F7";
                document.getElementById('9').style.backgroundColor = "#F7F7F7";
                document.getElementById('10').style.backgroundColor = "#F7F7F7";
                qtyPopupToggler.classList.remove("active");
                body.classList.remove("active");
                qtyPopup.classList.remove("show");
            } else if (clicked == 8) {
                document.getElementById("checkvisible8").style.display = "block";
                document.getElementById("checkvisible2").style.display = "none";
                document.getElementById("checkvisible3").style.display = "none";
                document.getElementById("checkvisible4").style.display = "none";
                document.getElementById("checkvisible").style.display = "none";
                document.getElementById("checkvisible5").style.display = "none";
                document.getElementById("checkvisible6").style.display = "none";
                document.getElementById("checkvisible7").style.display = "none";
                document.getElementById("checkvisible9").style.display = "none";
                document.getElementById("checkvisible10").style.display = "none";
                document.getElementById('8').style.backgroundColor = "#32323233";
                document.getElementById('1').style.backgroundColor = "#F7F7F7";
                document.getElementById('2').style.backgroundColor = "#F7F7F7";
                document.getElementById('3').style.backgroundColor = "#F7F7F7";
                document.getElementById('4').style.backgroundColor = "#F7F7F7";
                document.getElementById('5').style.backgroundColor = "#F7F7F7";
                document.getElementById('6').style.backgroundColor = "#F7F7F7";
                document.getElementById('7').style.backgroundColor = "#F7F7F7";
                document.getElementById('9').style.backgroundColor = "#F7F7F7";
                document.getElementById('10').style.backgroundColor = "#F7F7F7";
                qtyPopupToggler.classList.remove("active");
                body.classList.remove("active");
                qtyPopup.classList.remove("show");
            } else if (clicked == 9) {
                document.getElementById("checkvisible9").style.display = "block";
                document.getElementById("checkvisible2").style.display = "none";
                document.getElementById("checkvisible3").style.display = "none";
                document.getElementById("checkvisible4").style.display = "none";
                document.getElementById("checkvisible").style.display = "none";
                document.getElementById("checkvisible5").style.display = "none";
                document.getElementById("checkvisible6").style.display = "none";
                document.getElementById("checkvisible7").style.display = "none";
                document.getElementById("checkvisible8").style.display = "none";
                document.getElementById("checkvisible10").style.display = "none";
                document.getElementById('9').style.backgroundColor = "#32323233";
                document.getElementById('1').style.backgroundColor = "#F7F7F7";
                document.getElementById('2').style.backgroundColor = "#F7F7F7";
                document.getElementById('3').style.backgroundColor = "#F7F7F7";
                document.getElementById('4').style.backgroundColor = "#F7F7F7";
                document.getElementById('5').style.backgroundColor = "#F7F7F7";
                document.getElementById('6').style.backgroundColor = "#F7F7F7";
                document.getElementById('7').style.backgroundColor = "#F7F7F7";
                document.getElementById('8').style.backgroundColor = "#F7F7F7";
                document.getElementById('10').style.backgroundColor = "#F7F7F7";
                qtyPopupToggler.classList.remove("active");
                body.classList.remove("active");
                qtyPopup.classList.remove("show");
            } else if (clicked == 10) {
                document.getElementById("checkvisible10").style.display = "block";
                document.getElementById("checkvisible2").style.display = "none";
                document.getElementById("checkvisible3").style.display = "none";
                document.getElementById("checkvisible4").style.display = "none";
                document.getElementById("checkvisible").style.display = "none";
                document.getElementById("checkvisible5").style.display = "none";
                document.getElementById("checkvisible6").style.display = "none";
                document.getElementById("checkvisible7").style.display = "none";
                document.getElementById("checkvisible8").style.display = "none";
                document.getElementById("checkvisible9").style.display = "none";
                document.getElementById('10').style.backgroundColor = "#32323233";
                document.getElementById('1').style.backgroundColor = "#F7F7F7";
                document.getElementById('2').style.backgroundColor = "#F7F7F7";
                document.getElementById('3').style.backgroundColor = "#F7F7F7";
                document.getElementById('4').style.backgroundColor = "#F7F7F7";
                document.getElementById('5').style.backgroundColor = "#F7F7F7";
                document.getElementById('6').style.backgroundColor = "#F7F7F7";
                document.getElementById('7').style.backgroundColor = "#F7F7F7";
                document.getElementById('8').style.backgroundColor = "#F7F7F7";
                document.getElementById('9').style.backgroundColor = "#F7F7F7";
                qtyPopupToggler.classList.remove("active");
                body.classList.remove("active");
                qtyPopup.classList.remove("show");
            } else {
                document.getElementById("checkvisible").style.display = "none";
                document.getElementById("checkvisible2").style.display = "none";
                document.getElementById("checkvisible3").style.display = "none";
                document.getElementById("checkvisible4").style.display = "none";
                document.getElementById("checkvisible5").style.display = "none";
                document.getElementById("checkvisible6").style.display = "none";
                document.getElementById("checkvisible7").style.display = "none";
                document.getElementById("checkvisible8").style.display = "none";
                document.getElementById("checkvisible9").style.display = "none";
                document.getElementById("checkvisible10").style.display = "none";
            }
        }
