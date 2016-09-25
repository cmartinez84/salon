$(function(){
    $(".accordian").click(function(){
        $(this).next().toggleClass("show");
    });
    $(".infoTop").click(function(){
        $(this).parent().toggleClass("outline");
    })
});
