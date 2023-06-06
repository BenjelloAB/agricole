const inputs = document.querySelectorAll('.input-field');
const toggle_btn = document.querySelectorAll('.toggle');
const main = document.querySelector('main');
const bullets = document.querySelectorAll('.bullets span');
const images = document.querySelectorAll('.image');




toggle_btn.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        main.classList.toggle("sign-up-mode");
        console.log('clicked');
    });

});







function moveSlider() {
    let index = this.dataset.value;

    let currentImage = document.querySelector(`.img-${index}`);
    images.forEach((img) => {
        img.classList.remove('show');
    });
    currentImage.classList.add('show');

    const textSlider = document.querySelector('.text-group');
    textSlider.style.transform = `translateY(${-(index - 1) * 2.2}rem)`;

    bullets.forEach((bull) => {
        bull.classList.remove("active");
    });
    this.classList.add("active");

    // Move to the next bullet element
    const nextBullet = this.nextElementSibling || bullets[0]; // Get the next sibling or the first bullet
    setTimeout(function () {
        nextBullet.click(); // Simulate a click on the next bullet element
    }, 3000); // Wait for 3 seconds before moving to the next slide
}

bullets.forEach((bullet) => {
    bullet.addEventListener("click", moveSlider);
});

// Simulate the initial click on the first bullet to start the infinite loop
bullets[0].click();


console.log("WHYYYYYYYYYYYYYyy");

//   ?Terms logic
let checky = document.getElementById("cbx-12");
let signup = document.getElementById("signup");

checky.addEventListener('change', (e) => {

    if (e.target.checked === true) {
        signup.classList.add("agree");
    }
    if (e.target.checked === false) {
        console.log("Checkbox is not checked - boolean value: ", e.target.checked)
        signup.classList.remove("agree");
    }

})
