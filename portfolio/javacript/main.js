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

function toggleCardInfo(cardNumber) {
    const cardInfo = document.getElementById('cardInf' + cardNumber);

    cardInfo.style.display = cardInfo.style.display === 'none' ? 'block' : 'none';

    for (let i = 1; i <= 2; i++) {
      if (i !== cardNumber) {
        document.getElementById('cardInf' + i).style.display = 'none';
      }
    }
  }

  // Ajoutez des écouteurs d'événements pour masquer les informations complémentaires lorsqu'on clique ailleurs sur la page
  document.addEventListener('click', function (event) {
    const cardInfoContainers = document.querySelectorAll('.ca');
    const isClickInsideCard = Array.from(cardInfoContainers).some(container => container.contains(event.target));
    const infoContainers = document.querySelectorAll('.card-info');

    if (!isClickInsideCard) {
      for (const container of infoContainers) {
        container.style.display = 'none';
      }
    }
  });
