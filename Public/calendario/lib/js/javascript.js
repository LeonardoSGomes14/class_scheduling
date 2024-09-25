(function(win, doc) {
  'use strict';

  let selectedEvents = []; // Armazena os eventos selecionados

  // Função para exibir ou ocultar a caixa de exclusão
  function toggleDeleteBox() {
      let deleteBox = doc.getElementById('delete-box');
      if (selectedEvents.length > 0) {
          deleteBox.style.display = 'block'; // Exibe a caixa se houver eventos selecionados
      } else {
          deleteBox.style.display = 'none'; // Oculta a caixa se não houver eventos selecionados
      }
  }

  //Exibir Calendário
  function getCalendar(perfil, div) { 
      let calendarEl = doc.querySelector(div);
      let calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          headerToolbar: {
              start: 'prev, next, today',
              center: 'title',
              end: 'dayGridMonth, timeGridWeek, timeGridDay'
          },
          buttonText: {
              today: 'hoje',
              month: 'mês',
              week: 'semana',
              day: 'dia',
          },
          locale: 'pt-br',
          dateClick: function(info) {
              if (perfil === 'user') {
                  calendar.changeView('timeGrid', info.dateStr);
              } else {
                  if (info.view.type === 'dayGridMonth') {
                      calendar.changeView('timeGrid', info.dateStr);
                  } else {
                      win.location.href = `/class_scheduling/Public/calendario/views/manager/add.php?date=` + info.dateStr;
                  }
              }
          },
          events: '/class_scheduling/Public/calendario/controllers/ControllerEvents.php',
          eventDrop: function(info) {
              resizeAndDrop(info);
          },
          eventResize: function(info) {
              resizeAndDrop(info);
          },
          eventClick: function(info) {
            const eventId = info.event.id;

            // Seleção múltipla com Ctrl
            if (win.event.ctrlKey) {
                // Adiciona ou remove o evento da seleção
                if (selectedEvents.includes(eventId)) {
                    selectedEvents = selectedEvents.filter(id => id !== eventId);
                    info.el.classList.remove('selected'); // Remove a classe de seleção
                } else {
                    selectedEvents.push(eventId);
                    info.el.classList.add('selected'); // Adiciona a classe de seleção
                }
                toggleDeleteBox(); // Atualiza a exibição da caixa de exclusão
            } else {
                // Comportamento padrão para o clique único
                if (perfil === 'manager') {
                    win.location.href = `/class_scheduling/Public/calendario/views/manager/editar.php?id=${eventId}`;
                } else {
                    window.open(`/class_scheduling/Public/evento.php?id=${eventId}`, 'Evento', 'width=800,height=200');
                }

                // Limpa a seleção se não estiver segurando Ctrl
                if (selectedEvents.length > 0) {
                    selectedEvents.forEach(id => {
                        const eventEl = calendar.getEventById(id).el;
                        if (eventEl) {
                            eventEl.classList.remove('selected');
                        }
                    });
                    selectedEvents = [];
                    toggleDeleteBox(); // Oculta a caixa de exclusão
                }
            }
        }
    });
    calendar.render();
}

  // Função para deletar eventos selecionados
  function deleteSelectedEvents() {
    if (confirm("Deseja mesmo apagar os eventos selecionados?")) {
        fetch('/class_scheduling/Public/calendario/controllers/ControllerDelete.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ eventIds: selectedEvents })
        }).then(response => response.json())
          .then(data => {
            if (data.status === 'success') {
                alert('Eventos excluídos com sucesso!');
                // Atualiza o calendário
                location.reload();
            } else {
                alert('Erro ao excluir eventos: ' + data.message);
            }
        }).catch(error => {
            console.error('Erro:', error);
        });
    }
}

  if (doc.querySelector('.calendarUser')) {
      getCalendar('user', '.calendarUser');
  } else if (doc.querySelector('.calendarManager')) {
      getCalendar('manager', '.calendarManager');
  }

  if (doc.querySelector('#delete')) {
      let btn = doc.querySelector('#delete');
      btn.addEventListener('click', (event) => {
          event.preventDefault();
          if (confirm("Deseja mesmo apagar esse evento?")) {
              win.location.href = event.target.parentNode.href;
          }
      }, false);
  }

  // Função para lidar com a repetição dos eventos
  async function addEventWithRepetition(eventData) {
      let reqs = await fetch('http://localhost/class_scheduling/Public/calendario/controllers/ControllerAdd.php', {
          method: 'post',
          headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: `title=${eventData.title}&start=${eventData.start}&end=${eventData.end}&rrule=${eventData.rrule}`
      });
      let ress = await reqs.json();
      console.log(ress);
  }

  // Função para capturar dados do formulário e adicionar evento
  function handleEventSubmission(event) {
      event.preventDefault();
      
      let title = doc.getElementById('title').value;
      let start = doc.getElementById('start').value;
      let end = doc.getElementById('end').value;
      let repeat = doc.getElementById('repeat').value;

      let eventData = {
          title: title,
          start: start,
          end: end
      };

      // Adiciona a lógica de repetição
      switch(repeat) {
          case 'daily':
              eventData.rrule = 'FREQ=DAILY';
              break;
          case 'weekly':
              eventData.rrule = 'FREQ=WEEKLY';
              break;
          case 'monthly':
              eventData.rrule = 'FREQ=MONTHLY';
              break;
          case 'yearly':
              eventData.rrule = 'FREQ=YEARLY';
              break;
          default:
              // Sem repetição
              eventData.rrule = null;
              break;
      }

      // Chama a função para adicionar o evento
      addEventWithRepetition(eventData);
  }

  // Event listener para o envio do formulário
  let form = doc.getElementById('add-event-form');
  if (form) {
      form.addEventListener('submit', handleEventSubmission);
  }
  let deleteButton = doc.getElementById('delete-events');
  if (deleteButton) {
      deleteButton.addEventListener('click', deleteSelectedEvents);
  }

  // Exibe a caixa de exclusão quando eventos são selecionados
  toggleDeleteBox();

})(window, document);