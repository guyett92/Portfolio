/* Show and hide the table */
$(".skills").click(function(){
  $(".display-wrapper").toggle("slow", function(){
  });
});

/* Floating Contact Button */
$(window).scroll(function() {
    var winScrollTop = $(window).scrollTop();
    var winHeight = $(window).height();
    var floaterHeight = $('.contact').outerHeight(true);
    //true so the function takes margins into account
    var fromBottom = 20;

    var top = winScrollTop + winHeight - floaterHeight - fromBottom;
    $('.contact').css({'top': top + 'px'});
});
