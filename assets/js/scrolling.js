// function up(){
//     var element = document.getElementById("header");
//     element.style.position='relative';
// }
// function down(){
//     var element = document.getElementById("header");
//     element.style.position='fixed';
// }
// window.onscroll = function() {scrolling()};
        
// function scrolling() {
//     if (document.body.scrollTop > 1 || document.documentElement.scrollTop > 1) {
//     up();
//     } else {
//     down();
//     }
// }
window.addEventListener("scroll",function(){
    let header = document.querySelector('.navbar');
    let head = document.querySelector('.navbar');
    header.classList.toggle("sticky" , window.scrollY > 100);
    header.classList.remove("bg-transparent" , window.scrollY > 100);
})