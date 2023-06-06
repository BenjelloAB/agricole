console.log("working here");
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

const scrollUp = document.getElementById("scrollUP");
window.addEventListener("scroll", () => {
  if (window.pageYOffset > 100) {
    scrollUp.classList.add("active");
  } else {
    scrollUp.classList.remove("active");
  }
});

scrollUp.addEventListener("click", (e) => {
  e.preventDefault();
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});

// ? Etapes stuff :

//   const maxProgress = 131;

//   const elements = [
//     {
//       selector: ".holder .etapes .etape span p.first",
//       minPercentage: 14,
//     },
//     {
//       selector: ".holder .etapes .etape span p.second",
//       minPercentage: 47,
//     },
//     {
//       selector: ".holder .etapes .etape span p.third",
//       minPercentage: 79.38,
//     },
//     {
//       selector: ".holder .etapes .etape span p.forth",
//       minPercentage: 112,
//     },
//   ];
//   function updateProgressBar() {
//     const holder = document.querySelector(".holder2");
//     let scrollPercent =
//       (window.scrollY / (holder.offsetHeight - window.innerHeight)) * 100 ;
    // scrollPercent = Math.min(scrollPercent, maxProgress);

    // elements.forEach((element) => {
    //   const { selector, minPercentage } = element;
    //   const targetElement = document.querySelector(selector);
    //   if (scrollPercent >= minPercentage) {
    //     targetElement.style.setProperty("background-color", "#09ecec");
    //   } else {
    //     targetElement.style.setProperty("background-color", "#D9D9D9");
    //   }
    // });

//     let assignedValue = `${scrollPercent}%`;
//     document.documentElement.style.setProperty("--progress", assignedValue);
//   }

//   document.addEventListener("scroll", updateProgressBar);
$()