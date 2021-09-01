$(document).ready(function() {
    //Admin card setting
    $(".card-setting-admin").hide();

    $("#menu-setting").click(function() {
         $(".card-setting-admin").slideToggle();
     });
    $(".card-setting-admin").mouseleave(function() {
         $(this).slideUp();
     });

    // Button back to top
    $(window).scroll(function() {
        if($(this).scrollTop() > 40) {
            $(".back-to-top").fadeIn();
        }
        else
            $(".back-to-top").fadeOut();
    });


    // Selected check gender
    $("select.select-title").change(function(){
        var selectedGender = $(this).children("option:selected").val();
        if(selectedGender == "นาย" || selectedGender == "นาง" || selectedGender == "นางสาว")
            $("select.select-title").addClass("selected");
        else
            $("select.select-title").removeClass("selected");
    });
    // Selected check year
    //$("select.select-year").change(function(){
    //    var selectedYear = $(this).children("option:selected").val();
    //    if(selectedYear == "ปี 1" || selectedYear == "ปี 2" || selectedYear == "ปี 3" || selectedYear == "ปี 4")
    //        $("select.select-year").addClass("selected");
    //    else
    //        $("select.select-year").removeClass("selected");
    //});
    // Selected check full
    $("select.select-full").change(function(){
        var selectedDep = $(this).children("option:selected").val();
        if(selectedDep == "PnET(PE)-R" || selectedDep == "PnET(PE)-2R" || selectedDep == "PnET(C)-R" || selectedDep == "PNT-R" || selectedDep == "PNT-T")
            $("select.select-full").addClass("selected");
        else
            $("select.select-full").removeClass("selected");
    });
    


    // Hamberger Initialize
    $(".nbr-link").hide();

    // Link Responsive Initailize
    $("#link-sub-1").hide();
    $("#link-sub-2").hide();
    $("#link-sub-3").hide();
    $("#link-sub-4").hide();
    $("#link-sub-5").hide();
    $("#link-sub-6").hide();
    $("#link-sub-7").hide();
    $("#link-sub-8").hide();
    $("#link-sub-9").hide();
    $("#link-sub-10").hide();

        // Controller Hamberger
        $(".nav-btn").click(function() {
            $(".nbr-link").slideToggle();
        });

        // Controller link
        $("#link-1").click(function() {
            $("#link-sub-1").slideToggle();

            $("#link-sub-2").slideUp();
            $("#link-sub-3").slideUp();
            $("#link-sub-4").slideUp();
            $("#link-sub-5").slideUp();
            $("#link-sub-6").slideUp();
            $("#link-sub-7").slideUp();
            $("#link-sub-8").slideUp();
            $("#link-sub-9").slideUp();
            $("#link-sub-10").slideUp();
        });
        $("#link-2").click(function() {
            $("#link-sub-2").slideToggle();

            $("#link-sub-1").slideUp();
            $("#link-sub-3").slideUp();
            $("#link-sub-4").slideUp();
            $("#link-sub-5").slideUp();
            $("#link-sub-6").slideUp();
            $("#link-sub-7").slideUp();
            $("#link-sub-8").slideUp();
            $("#link-sub-9").slideUp();
            $("#link-sub-10").slideUp();
        });
        $("#link-3").click(function() {
            $("#link-sub-3").slideToggle();

            $("#link-sub-1").slideUp();
            $("#link-sub-2").slideUp();
            $("#link-sub-4").slideUp();
            $("#link-sub-5").slideUp();
            $("#link-sub-6").slideUp();
            $("#link-sub-7").slideUp();
            $("#link-sub-8").slideUp();
            $("#link-sub-9").slideUp();
            $("#link-sub-10").slideUp();
        });
        $("#link-4").click(function() {
            $("#link-sub-4").slideToggle();

            $("#link-sub-1").slideUp();
            $("#link-sub-2").slideUp();
            $("#link-sub-3").slideUp();
            $("#link-sub-5").slideUp();
            $("#link-sub-6").slideUp();
            $("#link-sub-7").slideUp();
            $("#link-sub-8").slideUp();
            $("#link-sub-9").slideUp();
            $("#link-sub-10").slideUp();
        });
        $("#link-5").click(function() {
            $("#link-sub-5").slideToggle();

            $("#link-sub-1").slideUp();
            $("#link-sub-2").slideUp();
            $("#link-sub-3").slideUp();
            $("#link-sub-4").slideUp();
            $("#link-sub-6").slideUp();
            $("#link-sub-7").slideUp();
            $("#link-sub-8").slideUp();
            $("#link-sub-9").slideUp();
            $("#link-sub-10").slideUp();
        });
        $("#link-6").click(function() {
            $("#link-sub-6").slideToggle();

            $("#link-sub-1").slideUp();
            $("#link-sub-2").slideUp();
            $("#link-sub-3").slideUp();
            $("#link-sub-4").slideUp();
            $("#link-sub-5").slideUp();
            $("#link-sub-7").slideUp();
            $("#link-sub-8").slideUp();
            $("#link-sub-9").slideUp();
            $("#link-sub-10").slideUp();
        });
        $("#link-7").click(function() {
            $("#link-sub-7").slideToggle();

            $("#link-sub-1").slideUp();
            $("#link-sub-2").slideUp();
            $("#link-sub-3").slideUp();
            $("#link-sub-4").slideUp();
            $("#link-sub-5").slideUp();
            $("#link-sub-6").slideUp();
            $("#link-sub-8").slideUp();
            $("#link-sub-9").slideUp();
            $("#link-sub-10").slideUp();
        });
        $("#link-8").click(function() {
            $("#link-sub-8").slideToggle();

            $("#link-sub-1").slideUp();
            $("#link-sub-3").slideUp();
            $("#link-sub-4").slideUp();
            $("#link-sub-5").slideUp();
            $("#link-sub-6").slideUp();
            $("#link-sub-7").slideUp();
            $("#link-sub-2").slideUp();
            $("#link-sub-9").slideUp();
            $("#link-sub-10").slideUp();
        });
        $("#link-9").click(function() {
            $("#link-sub-9").slideToggle();

            $("#link-sub-1").slideUp();
            $("#link-sub-3").slideUp();
            $("#link-sub-4").slideUp();
            $("#link-sub-5").slideUp();
            $("#link-sub-6").slideUp();
            $("#link-sub-7").slideUp();
            $("#link-sub-8").slideUp();
            $("#link-sub-2").slideUp();
            $("#link-sub-10").slideUp();
        });
        $("#link-10").click(function() {
            $("#link-sub-10").slideToggle();

            $("#link-sub-1").slideUp();
            $("#link-sub-3").slideUp();
            $("#link-sub-4").slideUp();
            $("#link-sub-5").slideUp();
            $("#link-sub-6").slideUp();
            $("#link-sub-7").slideUp();
            $("#link-sub-8").slideUp();
            $("#link-sub-9").slideUp();
            $("#link-sub-2").slideUp();
        });

});