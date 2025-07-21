<x-driver-messenger>
    <div>
        <div id="customerMessage"></div>
        <div id="driverMessage"></div>
    </div>

    <script>
          function getChatUser() {
            $.get('chatCustomer', function(customerMessage) {
                let html = '';

                customerMessage.forEach($chat => {
                    html += ``;
                });

                $('$customerMessage').html(html);
            }).fail(() => {
                $('#customerMessage').html('<p class="text-red-500">Failed to load chats...</p>')
            });

              }
              
            getChatUser();
            setInterval(getChatUser, 500);

            function getChatDriver() {
                $.get('/chatDriver', function(driverMessage) {
                    let html = '';

                    driverMessage.forEach(dmessage => {
                        html += ``;
                    });

                    $('#driverMessage').html(html);
                }).fail(() {
                    $('#driverMessage').html('<p class="text-red-500">Failed to load message...</p>');
                });
            }
            getChatDriver();
            setInterval(getChatDriver, 500)

    </script>
</x-driver-messenger>