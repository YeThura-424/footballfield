$(document).ready(function() {
    $(".dropdown").on("show.bs.dropdown", function() {
        $(this)
            .find(".dropdown-menu")
            .first()
            .stop(true, true)
            .slideDown();
    });

    // Add slideUp animation to Bootstrap dropdown when collapsing.
    $(".dropdown").on("hide.bs.dropdown", function() {
        $(this)
            .find(".dropdown-menu")
            .first()
            .stop(true, true)
            .slideUp();
    });

    $(".owl-carousel").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        items: 4,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 4,
                nav: true
            }
        },
        navText: [
            '<i class="icofont-rounded-left">',
            '<i class="icofont-rounded-right">'
        ]
    });

    // $(window).scroll(function() {
    //     $("nav").toggleClass("fixed-top", $(this).scrollTop() > 100);
    // });
    $("nav").toggleClass("fixed-top");
    $("#pickdate").dateDropper({
        theme: "leaf",
        largeOnly: true,
        format: "Y/m/d"
    });

    // $('#picktimestart, #picktimeend').timepicker({
    //     interval: 60,

    // })

    $("#picktime1,#picktime2").on("click", function() {
        var starttime = $("#picktime1").val();
        var endtime = $("#picktime2").val();
        var starttimeonly = starttime.split(":");
        var endtimeonly = endtime.split(":");
        var starthour = starttimeonly[0];
        var endhour = endtimeonly[0];
        var startprice = $("#1start").val();
        var endprice = $("#1end").val();
        var startpriceonly = startprice.split(":");
        var endpriceonly = endprice.split(":");
        var starthourprice = parseInt(startpriceonly[0]);
        var endhourprice = parseInt(endpriceonly[0]);
        // console.log(starthourprice);
        // alert(starthourprice);

        var price1 = $("#1price").val();
        var price2 = $("#2price").val();
        // alert(price1);
        var totalhour = endhour - starthour;
        if (totalhour < 0) {
            totalhour = 12 + totalhour;
        }

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        //     }
        // });
        // $.getJSON('/price/{id}', function(response) {

        //     console.log(response)
        // })

        if (starthour >= starthourprice && endhour >= endhourprice) {
            var prices = price1;
        } else {
            var prices = price2;
        }

        var totalprice = prices * totalhour;

        $("#totalhour").val(totalhour + "-Hour");
        $("#totalprice").val(totalprice + "-MMK");
    });
});
