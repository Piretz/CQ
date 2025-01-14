let angle = 0; // Starting angle for the carousel

// Get the carousel element
const carousel = document.querySelector('.carousel');

// Button for previous slide
const prevButton = document.querySelector('.prev');

// Button for next slide
const nextButton = document.querySelector('.next');

// Function to rotate the carousel left
prevButton.addEventListener('click', () => {
  angle -= 72; // Adjust the angle to rotate by 72 degrees (360°/5 cards)
  carousel.style.transform = `rotateY(${angle}deg)`; // Apply the 3D rotation
});

// Function to rotate the carousel right
nextButton.addEventListener('click', () => {
  angle += 72; // Adjust the angle to rotate by 72 degrees
  carousel.style.transform = `rotateY(${angle}deg)`; // Apply the 3D rotation
});
