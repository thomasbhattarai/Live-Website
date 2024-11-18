let menuIcon = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

// Use addEventListener for flexibility and potential future use
menuIcon.addEventListener('click', (event) => {
  // Toggle menuIcon, navbar, and prevent default behavior for clicks with links
  menuIcon.classList.toggle('bx-x');
  navbar.classList.toggle('active');
  if (menuIcon.classList.contains('bx-x')) {
    event.preventDefault(); // Prevent link follow if menu is open
  }
});

const sections = document.querySelectorAll('section');
const navLinks = document.querySelectorAll('header nav a');

window.addEventListener('scroll', () => {
  sections.forEach(section => {
    const top = window.scrollY;
    const offset = section.offsetTop - 100; // Adjustment for smooth transition
    const height = section.offsetHeight;
    const id = section.getAttribute('id');

    if (top >= offset && top < offset + height) {
      navLinks.forEach(link => {
        link.classList.remove('active'); // Remove 'active' from all links
        if (link.getAttribute('href').includes(id)) { // Use includes() for partial matches
          link.classList.add('active'); // Add 'active' to the matching link
        }
      });

      // Add and remove 'show animate' classes conditionally to handle smooth transitions
      section.classList.remove('show-animate'); // Remove classes first for better performance
      setTimeout(() => section.classList.add('show-animate'), 100); // Add after a slight delay
    } else {
      section.classList.remove('show-animate');
    }
  });

  const header = document.querySelector('header');
  header.classList.toggle('sticky', window.scrollY > 100); // Toggle 'sticky' only on scroll down, not up

  // Corrected footer animation logic
  const footer = document.querySelector('footer');
  footer.classList.toggle('show-animate', this.innerHeight + this.scrollY >= document.body.scrollHeight);
});
