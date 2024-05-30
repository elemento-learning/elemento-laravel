const calendarSettings = {
    settings: {
        lang: 'define',
        visibility: {
            theme: 'light',
            weekend: true,
        },
    },
    locale: {
        months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        weekday: ['M', 'S', 'S', 'R', 'K', 'J', 'S'],
    },
    DOMTemplates: {
        default: `
            <div class="vanilla-calendar-header">
                <#ArrowPrev />
                <div class="vanilla-calendar-header__content">
                    <#Month />
                    <#Year />
                </div>
                <#ArrowNext />
            </div>
            <div class="vanilla-calendar-wrapper">
                <#WeekNumbers />
                <div class="vanilla-calendar-content d-flex justify-content-center w-100">
                    <#Week />
                    <#Days />
                </div>
            </div>
            <#ControlTime />
        `
    }
}

$(function () {
    let timelineCalendar = new VanillaCalendar('#timelineCalendar', calendarSettings);
    timelineCalendar.init()
});
