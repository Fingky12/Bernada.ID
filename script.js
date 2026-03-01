function reveal() {

  let reveals = document.querySelectorAll(".reveal, .reveal-left, .reveal-right");

  reveals.forEach(function(el) {

    let windowHeight = window.innerHeight;
    let elementTop = el.getBoundingClientRect().top;
    let revealPoint = 120;

    if(elementTop < windowHeight - revealPoint){
        el.classList.add("active");
    }else{
        el.classList.remove("active");
    }

  });

}

window.addEventListener("scroll", reveal);