$(document).ready(function () {
    $("#pss_1").click(function () {
        $("#pss_soft").toggle("slow");
		$('html, body').animate({scrollTop:0}, 'fast');
    })
});

$(document).ready(function () {
    $("#pss_2").click(function () {
        $("#pss_hard").toggle("slow");
		$('html, body').animate({scrollTop:0}, 'fast');
    })
});

$(document).ready(function () {
    $("#pss_3").click(function () {
        $("#pss_camera").toggle("slow");
		
    })
});

$(document).ready(function () {
    $("#pss_4").click(function () {
        $("#pss_memory").toggle("slow");
		
    })
});


$(document).ready(function () {
    $("#pss_5").click(function () {
        $("#pss_network").toggle("slow");
		
    })
});

$(document).ready(function () {
    $("#pss_6").click(function () {
        $("#pss_das").toggle("slow");
		
    })
});

$(document).ready(function () {
    $("#pss_7").click(function () {
        $("#pss_other").toggle("slow");
		
    })
});

$(document).ready(function () {
    $("#pss_8").click(function () {
        $("#pss_price").toggle("slow");
		
    })
});

$(document).ready(function () {
    $("#pss_9").toggle(function () {
	     $('.pss_under_class').slideDown("slow");
		$('html, body').animate({scrollTop:0}, 'fast');
    },function() {
	 $('.pss_under_class').slideUp("slow");
		$('html, body').animate({scrollTop:0}, 'fast');
	 })
});

