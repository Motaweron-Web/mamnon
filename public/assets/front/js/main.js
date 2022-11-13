$(document).ready(function () {
  //mySwiper banner
  var swiper = new Swiper(".mySwiper", {
    autoplay: true,
    speed: 1500,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      dynamicBullets: true,
    },
  });
  // 
  $("#filterPagesAll").click(function () {
    $(".filterPage").addClass("active")
  })
  $(".deleteAll").click(function () {
    $(".filterPage").removeClass("active")
  })
  // 
  $(".filtersss").click(function () {
    $(".filterPage").addClass("active")
  })
  $(".deleteAll").click(function () {
    $(".filterPage").removeClass("active")
  })
  $('.filterProductsMax ul  li').click(function () {
    $(this).addClass("active").siblings().removeClass('active')


        $("." + $(this).data("filter2")).fadeIn(500).siblings().hide()

  })
  //   HWF

  $('.HWF h3').click(function () {
    $(this).addClass("active").siblings().removeClass('active')
    // if ($('.HWF .stor').hasClass("active")) {

    //     $(".filter").addClass("activeR")
    //         $(".filter").removeClass("activeL")
    //     } else {
    //         $(".filter").addClass("activeL")
    //         $(".filter").removeClass("activeR")
    //     }
        $("." + $(this).data("filter")).fadeIn(500).siblings().hide()

  })
  // button
  // $('.allButton button').click(function () {
  //     $(this).addClass("active").siblings().removeClass("active")
  //     if ($(this).data("show") == "filterAll") {
  //         $(".filterAll").show()
  //       } else {
  //         $(".filterAll").not("." + $(this).data("show")).hide()
  //         $(".filterAll").filter("." + $(this).data("show")).show()
  //       }
  // })
  // 
  // dropify profile
  $(".dropify").dropify({
    messages: {
      default: '',
      replace: '',
      remove: 'حذف',
      error: ''

    }
  });
  // Big Add stor
  $(".dropify1").dropify({
    messages: {
      default: 'اضف صورة غلاف',
      replace: '',
      remove: 'حذف',
      error: ''
    }
  });
  // checked box 
  $('#flexSwitchCheckDefault').change(function () {
    if ((this.checked)) {
      $(".checkedAll2").fadeIn()
    } else {
      $(".checkedAll2").fadeOut()
    }
  });
  // 
  $('#driver').change(function () {
    if ((this.checked)) {
      $(".mainCityAll").fadeIn()
    } else {
      $(".mainCityAll").fadeOut()
    }
  });
  // checked box 
  $('#checkedAll1').change(function () {
    if ((this.checked)) {
      $(".checkedAll2").fadeIn()
    } else {
      $(".checkedAll2").fadeOut()
    }
  });
  // 
  $('#checkedAll2').change(function () {
    if ((this.checked)) {
      $(".mainCityAll").fadeIn()
    } else {
      $(".mainCityAll").fadeOut()
    }
  });
   // checked box 
   $('#flexSwitchCheckDefault').change(function () {
    if ((this.checked)) {
      $(".checkedAll2").fadeIn()
    } else {
      $(".checkedAll2").fadeOut()
    }
  });
  // 
  $('#driver').change(function () {
    if ((this.checked)) {
      $(".mainCityAll").fadeIn()
    } else {
      $(".mainCityAll").fadeOut()
    }
  });
  // 
  $('.orderFilter li h3').click(function () {
    $(this).addClass("active").parent ().siblings().find('h3').removeClass('active')
    // if ($('.HWF .stor').hasClass("active")) {

    //     $(".filter").addClass("activeR")
    //         $(".filter").removeClass("activeL")
    //     } else {
    //         $(".filter").addClass("activeL")
    //         $(".filter").removeClass("activeR")
    //     }
        $("#" + $(this).data("orders")).fadeIn(500).siblings().hide()

  })
});
var input = document.querySelector(".phone2");
window.intlTelInput(input, {
  allowDropdown: true,
  autoHideDialCode: true,
  autoPlaceholder: "off",
  dropdownContainer: document.body,
  //   excludeCountries: ["IRQ"],
  //   formatOnDisplay: false,
  geoIpLookup: function (callback) {
    $.get("http://ipinfo.io", function () { }, "jsonp").always(function (resp) {
      var countryCode = (resp && resp.country) ? resp.country : "";
      callback(countryCode);
    });
  },
  // hiddenInput: "full_number",
  //   initialCountry: "auto",
  localizedCountries: { 'de': 'Deutschland' },
  // nationalMode: false,
  //   onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
  placeholderNumberType: "MOBILE",
  preferredCountries: ['IQ'],
  separateDialCode: true,
  utilsScript: "./build/js/utils.js",
});