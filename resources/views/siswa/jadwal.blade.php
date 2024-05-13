<x-base-layout>

    <div class="page-heading d-flex justify-content-between items-center">
        <h3>Jadwal Pelajaran</h3>
    </div>

    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body" id="calendar">
                </div>
            </div>
        </section>
    </div>
    @push('scripts')
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.11/index.global.min.js'></script>
        <script src="/js/plugins/fullcalendar/packages/core/locales/id.global.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events:" {{ route('jadwal.data') }}",
                    locale: 'id',
                    visibleRange: {
                        start: '2023-10-01',
                        end: '2023-10-31',
                    },
                    selectOverlap: function (event) {
                        return event.rendering === 'background';
                    },
                    dateClick: function(info) {
                        openDetail(info.dateStr);
                    },
                    eventClick: function(info) {
                        if (info.url) {
                            return false;
                        }
                        openDetail(info.event.startStr);
                    },
                    eventContent: function(arg) {
                        let el = document.createElement("p");
                        el.classList.add('mb-0');
                        el.innerHTML = arg.event.title + '<br> Pesanan';
                        
                        let arrayOfDomNodes = [ el ]
                        return { domNodes: arrayOfDomNodes }
                    }
                });
                calendar.render();
            });
        
        
        </script>
    @endpush
</x-base-layout>