const navbar = document.querySelector('#navbar-js')
const buttons = document.querySelectorAll('.nav-js')
window.addEventListener('scroll',() => {
  if (this.scrollY >= (92 * window.innerHeight / 100)) {
    navbar.classList.add('navbar-lewagon-scroll');
    // navbar.classList.remove('navbar-lewagon');
    buttons.forEach((button) => {
      button.style.color = 'grey';
      // button.classList.add('nav-btn-scroll');
      // button.classList.remove('nav-btn');
    });
  } else {
    navbar.classList.remove('navbar-lewagon-scroll');
    // navbar.classList.add('navbar-lewagon');
    buttons.forEach((button) => {
      button.style.color = 'white';
      // button.classList.remove('nav-btn-scroll');
      // button.classList.add('nav-btn');
    });
  }
});

const navbarLinks = document.querySelectorAll('.navbar .nav-js-scroll');

navbarLinks.forEach(link => {
  link.addEventListener('click', e => {
    e.preventDefault();
    const targetId = link.getAttribute('href');
    const targetElement = document.querySelector(targetId);
    if (targetElement) {
      window.scrollTo({
        top: targetElement.offsetTop,
        behavior: 'smooth',
      });
    }
  });
});
