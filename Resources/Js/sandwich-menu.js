document.getElementById('menu-toggle').addEventListener('click', function() {
    const menu = document.getElementById('menu');
    menu.classList.toggle('open'); // Abre o menu
  });
  
  document.getElementById('close-menu').addEventListener('click', function() {
    const menu = document.getElementById('menu');
    menu.classList.remove('open'); // Fecha o menu
  });
  