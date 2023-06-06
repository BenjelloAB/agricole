const inputs = document.querySelectorAll(".contact-input");

inputs.forEach((ipt)=>{

    ipt.addEventListener("focus", function(){
        ipt.parentNode.classList.add("focus");
        ipt.parentNode.classList.add("not-empty");
    });

    
    ipt.addEventListener("blur", function(){
        if (ipt.value == ""){
            ipt.parentNode.classList.remove("not-empty");
        }
        ipt.parentNode.classList.remove("focus");
});

});
const openNavMenu = document.querySelector(".open-nav-menu"),
  closeNavMenu = document.querySelector(".close-nav-menu"),
  navMenu = document.querySelector(".nav-menu"),
  menuOverlay = document.querySelector(".menu-overlay"),
  mediaSize = 1064;

function toggleNav() {
  navMenu.classList.toggle("open");
  menuOverlay.classList.toggle("active");
  // document.body.classList.toggle('hidden-scrolling');
  document.documentElement.classList.toggle("hidden-scrolling");
}

openNavMenu.addEventListener("click", toggleNav);
closeNavMenu.addEventListener("click", toggleNav);
// close the navMenu by clicking outside
menuOverlay.addEventListener("click", toggleNav);

navMenu.addEventListener("click", (e) => {
  if (e.target.hasAttribute("data-toggle") && window.innerWidth <= mediaSize) {
    e.preventDefault();
    const menuItemHasChildren = e.target.parentElement;
    console.log(menuItemHasChildren);
    // if menuItemHasChildren is already expanded, collapse it
    if (menuItemHasChildren.classList.contains("active")) {
      collapseSubMenu();
    } else {
      // Collapse existing expanded menuItemHasChildren
      if (navMenu.querySelector(".menu-item-has-children.active")) {
        collapseSubMenu();
      }
      //expand new menuItemHasChildren
      menuItemHasChildren.classList.add("active");
      const subMenu = menuItemHasChildren.querySelector(".sub-menu");
      subMenu.style.maxHeight = subMenu.scrollHeight + "px";
    }
  }
});

function collapseSubMenu() {
  navMenu
    .querySelector(".menu-item-has-children.active .sub-menu")
    .removeAttribute("style");
  navMenu
    .querySelector(".menu-item-has-children.active")
    .classList.remove("active");
}

function resizeFix() {
  // if navMenu is open , close it
  if (navMenu.classList.contains("open")) {
    toggleNav();
  }
  // if menu ItemHasChildren is expanded , collapse it
  if (navMenu.querySelector(".menu-item-has-children.active")) {
    collapseSubMenu();
  }
}
window.addEventListener("resize", function () {
  if (this.innerWidth > mediaSize) {
    resizeFix();
  }
});


