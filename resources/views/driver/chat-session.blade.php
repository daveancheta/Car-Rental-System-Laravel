<x-driver-messenger>
    <style>
        .send-button-disabled {
            background-color: gray;
            color: #ffffff;
            padding: 10px;
            border-radius: 100px;
            text-align: center;
            cursor: not-allowed;
        }

        .send-button {
            background-color: #64b5F6;
            color: #1A1A1A;
            padding: 10px;
            border-radius: 100px;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
    </style>
    <div>
        <div class="bg-gray-800 h-150 w-full rounded-t-lg relative overflow-y-auto"
            style="scrollbar-width: thin; scrollbar-color: #6b7280 transparent; scroll">
            <div class="bg-gray-800 h-20 w-full rounded-t-lg flex items-center p-6 mt-5 gap-2 gap-2">
                <img class="rounded-full w-15 h-15 object-cover"
                    src="{{ asset('storage/' . $room->customer_profile) }}">
                <span class="text-sm text-white">{{ $room->customer_name }}</span>

            </div>
            <div class="mb-5">
                 <div id="driverMessage"></div>
            </div>
           
        </div>

        <div class="bg-gray-800 h-20 w-full rounded-b-lg flex items-center p-2 gap-2 sticky bottom-0">
            <div class="ml-5">
                <svg class="w-6 h-6 text-gray-800 dark:text-[#64B5F6]" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9v3a5.006 5.006 0 0 1-5 5h-4a5.006 5.006 0 0 1-5-5V9m7 9v3m-3 0h6M11 3h2a3 3 0 0 1 3 3v5a3 3 0 0 1-3 3h-2a3 3 0 0 1-3-3V6a3 3 0 0 1 3-3Z" />
                </svg>
            </div>
            <div class="ml-2 mr-5">
                <svg class="w-6 h-6 text-gray-800 dark:text-[#64B5F6]" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m3 16 5-7 6 6.5m6.5 2.5L16 13l-4.286 6M14 10h.01M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                </svg>

            </div>
            <input id="inputMessage" class="w-full bg-gray-900 p-3 rounded-full text-white px-5 focus:outline-none"
                type="text" placeholder="Aa" autocomplete="off">
            <div class="mr-5 ml-5">
                <button id="sendButton" class="send-message send-button-disabled disabled">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-send w-6 h-6"
                        viewBox="0 0 16 16">
                        <path
                            d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z" />
                    </svg>
                </button>
            </div>
         
        </div>



    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const inputMessage = document.getElementById('inputMessage');
        const sendButton = document.getElementById('sendButton');

        inputMessage.addEventListener('input', () => {
            if (inputMessage.value.trim() === '') {
                sendButton.classList.add('send-button-disabled');
                sendButton.classList.add('disabled');
                 sendButton.classList.remove('send-button');
            } else {
                sendButton.classList.remove('send-button-disabled');
                sendButton.classList.remove('disabled');
                sendButton.classList.add('send-button');
            }
        });
        
        function getDriverSessionMessage() {
             let roomId = '{{ $room->id }}';
             let customerId = '{{ $room->user_id }}';
             let driverId = {{ Auth::user()->id }};
             let customerProfile = '{{ asset('storage/' . $room->customer_profile) }}';
            let customerName = '{{ $room->customer_name }}';
          
 

            $.get(`/getDriverSessionMessage/${roomId}/${customerId}`, function(driverMessage) {
                let html = '';
              
 

                if(driverMessage.length === 0)
            {
                html += `<div class="flex justify-center mt-100 text-white">Start Messaging</div>`;
            } else {
                         
                driverMessage.forEach(message => {
                   const user = message.driver_id === driverId;
                    html += `
                        <div class="flex flex-col mt-10">
                            <div class="${user ? 'flex justify-end items-end mr-5' : 'flex justify-start items-end ml-5'}">
                        <span class="${user ? 'text-[#1A1A1A] p-2 text-start bg-[#64B5F6] rounded-md' : 'text-white p-2 text-start bg-gray-600 rounded-md'}">${message.message}</span>
                        </div>
                       </div> `;
                });
               
                
                   
            }

                $('#driverMessage').html(html);
            }).fail(() => {
                $('#driverMessage').html('<p class="text-red-500>Failed to load message...</p>')
            });
        }

        getDriverSessionMessage();
        setInterval(getDriverSessionMessage, 500);

           $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

       
        $(document).on('click', '.send-message', function () {
           let roomId = '{{ $room->id }}';
            let button = $(this);
            let data = {
                message: document.getElementById('inputMessage').value,
                driver_id: {{ Auth::user()->id }},
                room_id: `${roomId}`,
            };
                    document.getElementById('inputMessage').value = '';
                    sendButton.classList.add('send-button-disabled');
                    sendButton.classList.add('disabled');
                    sendButton.classList.remove('send-button');
                    

            $.ajax({
                url: '/submitDriverMessage',
                type: 'POST',
                data: data,
                error: function (xhr) {
                    console.error(xhr.responseText);
                    alert('Failed to send message.')
                }
            });
        });
    </script>
</x-driver-messenger>