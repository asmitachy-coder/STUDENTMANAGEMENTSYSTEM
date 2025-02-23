// Chart.js Configuration
document.addEventListener("DOMContentLoaded", function () {
  const ctx = document.getElementById('studentChart').getContext('2d');
  const studentChart = new Chart(ctx, {
      type: 'bar', // You can change this to 'line', 'pie', etc.
      data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June'],
          datasets: [{
              label: 'Number of Students',
              data: [50, 75, 100, 120, 150, 200],
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderColor: 'rgba(75, 192, 192, 1)',
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          },
          animation: {
              duration: 2000, // Animation duration in milliseconds
              easing: 'easeInOutQuart' // Smooth easing function
          }
      }
  });

  // Add hover animations to cards
  const cards = document.querySelectorAll('.card');
  cards.forEach(card => {
      card.addEventListener('mouseenter', () => {
          card.style.transform = 'translateY(-5px)';
          card.style.boxShadow = '0 6px 16px rgba(0, 0, 0, 0.15)';
      });
      card.addEventListener('mouseleave', () => {
          card.style.transform = 'translateY(0)';
          card.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.1)';
      });
  });
});