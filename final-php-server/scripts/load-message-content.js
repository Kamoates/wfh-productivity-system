//load all rooms
console.log(users);
var roomNumber = 1;
var roomReq = new XMLHttpRequest();
roomReq.open("GET", "../scripts/retrieve-rooms.php", true);

roomReq.onload = function () {
  //result
  var roomList = JSON.parse(this.responseText);
  var roomListStyle = `
        .room {
            display: flex;
            text-align: left;
        }

        .room-name {
            font-size: 10px;
        }

        .creator {
            font-size: 8px;
        }

        .date-created {
            font-size: 8px;
        } 

        .btn {
            background-color: green;
            border: none;
            color: white;
            font-size: 10px;
            height: 20px;
            width: 20px
        }`;

  for (var i = 0; i < 3; i++) {
    var room = roomList[i];

    var roomName = document.createElement("h6");
    roomName.className = "room-name";
    roomName.innerHTML = room["room_name"];

    var creator = document.createElement("p");
    creator.className = "creator";
    creator.innerHTML = users[room["userID"] - 1];

    var dateCreated = document.createElement("p");
    dateCreated.className = "date-created";
    dateCreated.innerHTML = room["date_created"];

    var button = document.createElement("button");
    button.className = "btn";
    button.id = "btn" + room["chatroomID"].toString();
    button.innerHTML = "GO";

    var details = document.createElement("div");
    details.className = "details";
    details.appendChild(roomName);
    details.appendChild(creator);
    details.appendChild(dateCreated);

    var roomContainer = document.createElement("div");
    roomContainer.className = "room";
    roomContainer.appendChild(details);
    roomContainer.appendChild(button);

    var seperator = document.createElement("hr");
    /* var roomListTemp = `
    <div class="room">
        <div class="details">
            <h6 class="room-name">${room["room_name"]}</h6>
            <p class="creator">Created by: ${room["userID"]}</p>
            <p class="date-created">Date Created: ${room["date_created"]}<p>
        </div>
        <button class="btn" id="${room["chatroomID"]}">Go</button>
    </div>
    <hr>
    `;
    document.getElementById("room-list").innerHTML += roomListTemp; */
    document.getElementById("room-list").appendChild(roomContainer);
    document.getElementById("room-list").appendChild(seperator);
  }
  var roomStyle = document.createElement("style");
  roomStyle.innerHTML = roomListStyle;
  document.getElementById("room-list").appendChild(roomStyle);
};

roomReq.send();
//add event listener to each button
//for (var i = 0; i < 3; i++) {
//}
/*
------------------------------------------------------------------------------------------------
*/
//load all previous chat
function loadMessages() {
  document.getElementById("message-box").innerHTML = "";
  var chatReq = new XMLHttpRequest();
  chatReq.open(
    "GET",
    `../scripts/load-msg-from-database.php?roomNumber=${roomNumber}`,
    true
  );
  chatReq.onload = function () {
    var chats = JSON.parse(this.responseText);
    var chatStyle = `
                  .messages {
                      color: white;
                      padding: 10px;
                  }
      
                  .user-name {
                      font-size: 14px;
                  }
      
                  .message {
                      font-size: 10px;
                      text-align: justify;
                      word-wrap: break-word;
                  }
      
                  .date-sent {
                      font-size: 8px;
                      text-align: right;
                  }
              `;
    for (var i = 0; i < chats.length; i++) {
      var newChat = chats[i];
      // /console.log(newChat);

      var userName = document.createElement("h6");
      userName.className = "user-name";
      userName.innerHTML = users[newChat.userID - 1];

      var inMessage = document.createElement("p");
      inMessage.className = "message";
      inMessage.innerHTML = newChat.message;

      var timestamp = document.createElement("p");
      timestamp.className = "date-sent";
      timestamp.innerHTML = newChat.chat_date;

      var messageContainer = document.createElement("div");
      messageContainer.className = "messages";
      if (newChat.userID == userID) {
        messageContainer.style =
          "background-color: magenta;margin: 10px 10px 10px 50px;";
      } else {
        messageContainer.style =
          "background-color: lightskyblue;margin: 10px 50px 10px 10px;";
      }

      messageContainer.appendChild(userName);
      messageContainer.appendChild(inMessage);
      messageContainer.appendChild(timestamp);
      document.getElementById("message-box").appendChild(messageContainer);
    }
    var messageStyle = document.createElement("style");
    messageStyle.innerHTML = chatStyle;
    document.getElementById("message-box").appendChild(messageStyle);
  };

  chatReq.send();
}

/*
-------------------------------------------------------------------
*/
loadMessages();

document.getElementById("chat-form").addEventListener("submit", (e) => {
  e.preventDefault();

  if ((message = document.getElementById("input-msg").value)) {
    var params = `userID=${userID}&chatroomID=${roomNumber}&content=${message}`;
    console.log(params);

    //start xhr
    var sendReq = new XMLHttpRequest();
    sendReq.open("POST", "../scripts/add-msg-to-database.php", true);
    sendReq.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );

    sendReq.onload = function () {
      console.log(this.responseText);
    };

    sendReq.send(params);
  }
  loadMessages();
});

var roomInfoTemp = `
<div id="info">
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt facilis laboriosam a facere, aliquid fugit ratione sequi rerum ipsam asperiores consectetur hic reiciendis provident maxime ut pariatur, aspernatur quos, minima nemo eaque molestias. Incidunt sequi rerum cum recusandae excepturi quia, aspernatur cumque.</p>
</div>
`;

var roomInfoStyle = `
<style>
    #info p {
        font-size: 8px;
        text-align: justify;
    }
</style>
`;
//manipulate divs

document.getElementById("room-info").innerHTML += roomInfoTemp + roomInfoStyle;
