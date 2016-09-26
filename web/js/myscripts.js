$(function(){

    $(".infoTop").click(function(){
        $("div").removeClass("outline");
        $(".show").removeClass("show");
        $(this).parent().toggleClass("outline");
        // $(this).next().toggleClass("show");
    })
    $(".accordian").click(function(){
        $(this).next().toggleClass("show");
    });
});
