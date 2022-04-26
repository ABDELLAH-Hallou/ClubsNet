window.addEventListener("scroll",function(){
    let header = document.querySelector('.navbar');
    let head = document.querySelector('.navbar');
    header.classList.toggle("sticky" , window.scrollY > 100);
    header.classList.remove("bg-transparent" , window.scrollY > 100);
})