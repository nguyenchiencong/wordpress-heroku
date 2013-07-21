// Javascrip Hover Effect

$(document).ready(function(){
$(".feature-itemsa img, .feature-items img, .port-thumba img, .port-thumb img").fadeTo("slow", 1.0);
$(".feature-itemsa img, .feature-items img, .port-thumba img, .port-thumb img").hover(function(){
$(this).fadeTo("fast", 0.2);
},function(){
$(this).fadeTo("slow", 1.0);
});
});









