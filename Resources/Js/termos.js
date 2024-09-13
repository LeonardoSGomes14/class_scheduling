// Espera o DOM estar carregado
window.onload = function() {
  // Referências ao modal e botão de aceitar
  var modal = document.getElementById('modal');
  var acceptButton = document.getElementById('acceptButton');

  // Mostra o modal assim que a página carrega
  modal.style.display = 'flex';

  // Quando o botão de aceitar for clicado, fecha o modal
  acceptButton.onclick = function() {
    modal.style.display = 'none';
  }

  // Impede que outros botões interajam com o modal
  document.querySelectorAll('button').forEach(function(button) {
    button.addEventListener('click', function(event) {
      // Impede que outros botões, exceto o "acceptButton", acionem o modal
      if (event.target.id !== 'acceptButton') {
        event.stopPropagation(); // Impede que o evento de clique ative o modal
      }
    });
  });
};
