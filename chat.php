<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Messaging App
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            background-color: #f0f2f5;
        }
        .sidebar {
            width: 300px;
            background-color: #fff;
            border-right: 1px solid #ddd;
            display: flex;
            flex-direction: column;
        }
        .sidebar-header {
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #ddd;
        }
        .sidebar-header img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }
        .sidebar-header .fa-cog {
            font-size: 20px;
            cursor: pointer;
        }
        .search-bar {
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }
        .search-bar input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 20px;
            outline: none;
        }
        .contacts {
            flex: 1;
            overflow-y: auto;
        }
        .contact {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            cursor: pointer;
            border-bottom: 1px solid #ddd;
        }
        .contact img {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            margin-right: 15px;
        }
        .contact .contact-info {
            flex: 1;
        }
        .contact .contact-info h4 {
            margin: 0;
            font-size: 16px;
            font-weight: 500;
        }
        .contact .contact-info p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #888;
        }
        .contact .contact-time {
            font-size: 12px;
            color: #888;
        }
        .chat {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: #fff;
        }
        .chat-header {
            padding: 20px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ddd;
        }
        .chat-header img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-right: 15px;
        }
        .chat-header .chat-info {
            flex: 1;
        }
        .chat-header .chat-info h4 {
            margin: 0;
            font-size: 16px;
            font-weight: 500;
        }
        .chat-header .chat-info p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #888;
        }
        .chat-header .fa-ellipsis-v {
            font-size: 20px;
            cursor: pointer;
        }
        .chat-messages {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            background-color: #f9f9f9;
        }
        .message {
            display: flex;
            margin-bottom: 20px;
        }
        .message.sent {
            justify-content: flex-end;
        }
        .message.received {
            justify-content: flex-start;
        }
        .message .message-content {
            max-width: 60%;
            padding: 10px 15px;
            border-radius: 20px;
            background-color: #e1ffc7;
            position: relative;
        }
        .message.sent .message-content {
            background-color: #dcf8c6;
        }
        .message .message-content p {
            margin: 0;
            font-size: 14px;
        }
        .message .message-time {
            font-size: 12px;
            color: #888;
            margin-top: 5px;
        }
        .message.sent .message-content::after {
            content: '';
            position: absolute;
            top: 0;
            right: -10px;
            border-width: 10px 0 10px 10px;
            border-style: solid;
            border-color: transparent transparent transparent #dcf8c6;
        }
        .message.received .message-content::after {
            content: '';
            position: absolute;
            top: 0;
            left: -10px;
            border-width: 10px 10px 10px 0;
            border-style: solid;
            border-color: transparent #e1ffc7 transparent transparent;
        }
        .chat-input {
            padding: 20px;
            display: flex;
            align-items: center;
            border-top: 1px solid #ddd;
        }
        .chat-input input {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 20px;
            outline: none;
        }
        .chat-input button {
            background-color: #0084ff;
            border: none;
            color: #fff;
            padding: 10px 15px;
            border-radius: 20px;
            margin-left: 10px;
            cursor: pointer;
        }
  </style>
 </head>
 <body>
  <div class="sidebar">
   <div class="sidebar-header">
    <img alt="User profile picture" height="40" src="https://storage.googleapis.com/a1aa/image/zQrqLGUGYKLlPdhfVhViT8UkK2927CKYTqhpkTkFa8KJdw3JA.jpg" width="40"/>
    <i class="fas fa-cog">
    </i>
   </div>
   <div class="search-bar">
    <input placeholder="Search or start new chat" type="text"/>
   </div>
   <div class="contacts">
    <div class="contact">
     <img alt="Contact profile picture" height="50" src="https://storage.googleapis.com/a1aa/image/oMLBck7d7pIJAVnvkF3PpOwJHdeSIicsqlfSh1eSamto0BfOB.jpg" width="50"/>
     <div class="contact-info">
      <h4>
       John Doe
      </h4>
      <p>
       Hey, how are you?
      </p>
     </div>
     <div class="contact-time">
      12:45 PM
     </div>
    </div>
    </div>
  </div>
  <script>
        let receiverId = null; // Store selected contact's ID

        function selectContact(id) {
            receiverId = id;
            fetchMessages();
        }

        function fetchMessages() {
            if (!receiverId) return;
            const xhr = new XMLHttpRequest();
            xhr.open("GET", `fetch_messages.php?receiver_id=${receiverId}`, true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    document.querySelector(".chat-messages").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        function sendMessage() {
            const messageInput = document.querySelector(".chat-input input");
            const message = messageInput.value.trim();
            if (message === "" || !receiverId) return;

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "send_message.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function () {
                if (xhr.status === 200) {
                    messageInput.value = ""; // Clear input after sending
                    fetchMessages(); // Fetch new messages
                }
            };
            xhr.send(`receiver_id=${receiverId}&message=${encodeURIComponent(message)}`);
        }

        setInterval(fetchMessages, 2000); // Fetch messages every 2 seconds

        document.addEventListener("DOMContentLoaded", () => {
            document.querySelector(".chat-input button").addEventListener("click", sendMessage);
        });
  </script>
  
  <div class="chat">
   <div class="chat-header">
    <img alt="Chat profile picture" height="40" src="https://storage.googleapis.com/a1aa/image/dbte4Gv1mI3CTq96yeRXFTNf5gc3TvKfia2Dxo7vmybNpDedC.jpg" width="40"/>
    <div class="chat-info">
     <h4>
      John Doe
     </h4>
     <p>
      Online
     </p>
    </div>
    <i class="fas fa-ellipsis-v">
    </i>
   </div>
   <div class="chat-messages">
    <div class="message received">
     <div class="message-content">
      <p>
       Hey, how are you?
      </p>
      <div class="message-time">
       12:45 PM
      </div>
     </div>
    </div>
    <div class="message sent">
     <div class="message-content">
      <p>
       I'm good, thanks! How about you?
      </p>
      <div class="message-time">
       12:46 PM
      </div>
     </div>
    </div>
    <div class="message received">
     <div class="message-content">
      <p>
       Doing well, just busy with work.
      </p>
      <div class="message-time">
       12:47 PM
      </div>
     </div>
    </div>
    <div class="message sent">
     <div class="message-content">
      <p>
       Same here. Let's catch up soon!
      </p>
      <div class="message-time">
       12:48 PM
      </div>
     </div>
    </div>
   </div>
   <div class="chat-input">
    <input placeholder="Type a message" type="text"/>
    <button>
     <i class="fas fa-paper-plane">
     </i>
    </button>
   </div>
  </div>
 </body>
</html> 