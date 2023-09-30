<!DOCTYPE html>
<html>
<head>
    <title>Planification des Livraisons</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
</head>
<body>

    <div id="calendar"></div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var events = <?php echo json_encode($events); ?>;

        $('#calendar').fullCalendar({
            events: events,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            eventRender: function(event, element) {
    element.find('.fc-title').append('<br/>Adresse de livraison : ' + event.adresse + '<br/>Client : ' + event.nom_client + '<br/>Motif : ' + event.motif);
}

        });
    });
</script>


</body>
</html>
