var chars = $(".div1").html().split('');
$(".div1").empty();
for (var i = 0; i < chars.length; i++) {
    $(".div1").append("<span class='letter" + i + "'>" + chars[i] + "</span>");
    $(".letter" + i).css({
        "position":"relative",
    });
    $(".letter" + i).css({
        "transition": "0.5s"
    });
}
$(document).on("mousemove", function (e) {
    for (var i = 0; i < chars.length; i++) {
        var x = e.pageX,
            y = e.pageY;
        var distx = x - $(".letter" + i).offset().left + ($(".letter" + i).width() / 2);
        var disty = y - $(".letter" + i).offset().top;

        if (Math.abs(distx) < 24 && Math.abs(disty) < 24) {
            if (distx > 6 || distx < -6) {
                if (x < $(".letter" + i).offset().left) {
                    $(".letter" + i).css({
                        "left": + (24 / Math.abs(distx) * Math.abs(distx)),
                            "position": "relative"
                    });
                } else {
                    $(".letter" + i).css({
                        "left": - (24 / Math.abs(distx) * Math.abs(distx)),
                            "position": "relative"
                    });
                }
            }

            if (disty > 12 || disty < -12) {
                if (y < $(".letter" + i).offset().top + 6) {
                    $(".letter" + i).css({
                        "top": + (24 / Math.abs(disty) * Math.abs(disty)),
                            "position": "relative"
                    });
                } else {
                    $(".letter" + i).css({
                        "top":  - (24 / Math.abs(disty) * Math.abs(disty)),
                            "position": "relative"
                    });
                }
            }
        }
        distx = 0;
        disty = 0;
    }
});