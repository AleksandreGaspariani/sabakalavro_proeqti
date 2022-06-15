

function init() {
    getTodaySession();
}

function getMovieID() {
    return $('#movieID').val();
}

function getTodayDate() {
    return $('[name="dateButton"]:first').val();
}

function getTodaySession() {
    getSessionAjax(getTodayDate());
}

function getSessionAjax(date) {
    console.log(date);
    $.ajax({
        url: '/sessions/getSessions',
        type: 'GET',
        data: {
            date: date,
            movieID: getMovieID(),
        },
        success: function (data) {
            drawSessions(data);
        }
    });
}

function drawSessions(data) {
    let container = $('#sessionContainer');
    container.empty();
    let html = '';
    $.each(data, function (index, value) {
        html +=
                '<a href="/session/order/{{ $session->id }}"\n' +
            '                               class="card text-black bg-white text-decoration-none m-3 flex-row"\n' +
            '                               style="max-width: 18rem;">\n' +
            '                                <div\n' +
            '                                    class="card-header d-flex justify-content-center align-items-center"> {{ date("g:i a",strtotime($session->start_at)) }} </div>\n' +
            '                                <!-- Time -->\n' +
            '                                <div class="card-body">\n' +
            '                                    <h5 class="card-title">Price: '+value.price+' Gel </h5> <!-- Ticket Price -->\n' +
            '                                    <p class="card-text border border-primary bg-info"> '+value.language+' </p>\n' +
            '                                    <!-- Language -->\n' +
            '                                    <small>Check seats</small>\n' +
            '                                </div>\n' +
            '                            </a>'
    });
    container.append(html);
}


$(document).ready(function () {
    init();

});
