<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      
      $('#coba').on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
          // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('cd4a5f4ea7dbfce33aab', {
          cluster: 'ap1',
          forceTLS: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
          alert(JSON.stringify(data));
          $('#id').html(data);
        });
      });
    });
  </script>
</head>
<body>
  <button id="coba">Pusher test</button>
  <h1>Pusher Test</h1>
  <p id="id">
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
</body>