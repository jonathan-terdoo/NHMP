const $ = (h)=> document.querySelector(h);
// selecting eyes here
let input = $("#pass"),
    first = $(".first-eye"),
    second = $(".second-eye");
first.onclick = function(){
    second.style.cssText = 'display: block;'
}
$(".close").onclick = function(){
    $(".container").style.cssText = 'display: none;';
}