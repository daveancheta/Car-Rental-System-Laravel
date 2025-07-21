<x-driver-messenger>
    <div>
        {{ Auth::user()->id }}
        <span>{{ $room->id }}</span>
        <span id="driverMessage" class="text-white"></span>
        <div id="userMessage"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function getDriverSessionMessage() {
             let roomId = '{{ $room->id }}';

            $.get(`/getDriverSessionMessage/${roomId}`, function(driverMessage) {
                let html = '';

                if(driverMessage.length === 0)
            {
                html += `Start Messaging`;
            } else {
                driverMessage.forEach(message => {
                    html += `${message.message}`;
                });
            }

                $('#driverMessage').html(html);
            }).fail(() => {
                $('#driverMessage').html('<p class="text-red-500>Faile to load message...</p>')
            })
        }

        getDriverSessionMessage();
        setInterval(getDriverSessionMessage, 500);
    </script>
</x-driver-messenger>