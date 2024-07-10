import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import esLocale from '@fullcalendar/core/locales/es';
import interactionPlugin from '@fullcalendar/interaction';
import { auto } from '@popperjs/core';

const getTipos_eventos = () => {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: 'tipo_evento/show',
      method: 'GET',
      success(response) {
        resolve(response)
      },
      error(error) {
        reject(error)
      }
    })
  })
}

let calendarEl = document.getElementById('calendar');
if (calendarEl) {
  let calendar = new Calendar(calendarEl, {
    plugins: [dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin],
    initialView: 'timeGridWeek',
    weekends: false,
    locale: esLocale,
    slotDuration: '00:30:00',
    slotLabelInterval: '00:30:00',
    allDaySlot: false,
    slotMinTime: '14:00:00',
    slotMaxTime: '21:30:00',
    height: auto,
    slotLabelFormat: {
      hour: '2-digit',
      minute: '2-digit'
    },
    dateClick: async function (info) {

      const DefauLtDate = new Date(info.dateStr)
      const formattedDate = DefauLtDate.toISOString().slice(0, 16)
      const Tipos_eventos = await getTipos_eventos()
      $('#tipos_eventos').empty()
      $('#titulo').empty()
      Tipos_eventos.forEach(tipo => {
        $('#tipos_eventos').append($('<option>', {
          value: tipo.id,
          text: tipo.nombre
        }));
      });
      $('#date_start').val(formattedDate)
      $('#date_end').val(formattedDate)
      $('#open_add_modal').click()
    },
    async eventClick(e) {
      const evento = e.event._def
      $('#date_edit_start').val(evento.extendedProps.start)
      $('#date_edit_end').val(evento.extendedProps.end)
      $('#edit_title').val(evento.title)
      $('#event_id').data('id',evento.extendedProps.id)
      const Tipos_eventos = await getTipos_eventos()
      $('#tipos_eventos_edit').empty()
      Tipos_eventos.forEach(tipo => {
        $('#tipos_eventos_edit').append($('<option>', {
          value: tipo.id,
          text: tipo.nombre,
          selected: tipo.id === evento.extendedProps.event_type
        }))
      })
      $('#open_edit_modal').click()
    },
    views: {
      timeGridFourDay: {
        type: 'timeGrid',
        duration: { days: 4 }
      }
    },
    eventClassNames: 'evento',
    events: 'calendar/show',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    }
  });
  calendar.render();
}
