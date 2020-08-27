//create mail list elemets=
function generateMailList(username, subject, date, buttonID) {
  var nameContainer = document.createElement("p");
  nameContainer.className = "username";
  nameContainer.innerHTML = username;

  var subjectContainer = document.createElement("p");
  subjectContainer.className = "subject";
  subjectContainer.innerHTML = `Subj: ${subject}`;

  var dateContainer = document.createElement("p");
  dateContainer.className = "date";
  dateContainer.innerHTML = date;

  var textContainer = document.createElement("div");
  textContainer.className = "text";
  textContainer.appendChild(nameContainer);
  textContainer.appendChild(subjectContainer);
  textContainer.appendChild(dateContainer);

  var button = document.createElement("button");
  button.innerHTML = "Read...";
  button.id = buttonID;

  var mail = document.createElement("div");
  mail.className = "mail";
  mail.appendChild(textContainer);
  mail.appendChild(button);

  return mail;
}

//generate content elements

function generateMailContent(username, subject, content, date) {
  var usernameContainer = document.createElement("p");
  usernameContainer.className = "body-username";
  usernameContainer.innerHTML = `Sender: ${username}`;

  var subjectContainer = document.createElement("p");
  subjectContainer.className = "body-subject";
  subjectContainer.innerHTML = `Subject: ${subject}`;

  var contentContainer = document.createElement("pre");
  contentContainer.className = "content";
  contentContainer.innerHTML = content;

  var dateContainer = document.createElement("p");
  dateContainer.className = "date";
  dateContainer.innerHTML = `Date sent: ${date}`;

  var bodyContainer = document.createElement("div");
  bodyContainer.className = "body";
  bodyContainer.appendChild(usernameContainer);
  bodyContainer.appendChild(subjectContainer);
  bodyContainer.appendChild(contentContainer);
  bodyContainer.appendChild(dateContainer);

  var header = document.createElement("p");
  header.className = "header";
  header.innerHTML = "Content";

  var mailContent = document.createElement("div");
  mailContent.id = "content";
  mailContent.appendChild(header);
  mailContent.appendChild(bodyContainer);

  return mailContent;
}

//retrieve info from the database using htmlrequest

var xhr = new XMLHttpRequest();
xhr.open("GET", "../scripts/retrieve-mails.php", true);
xhr.onload = function () {
  var results = JSON.parse(this.responseText).reverse();

  for (let result of results) {
    let mailInstance = generateMailList(
      users[result.userID - 1],
      result.subject,
      result.date,
      result.mailID
    );
    mailInstance.addEventListener("click", (e) => {
      e.preventDefault();
      let mailInstance = generateMailContent(
        result.userID,
        result.subject,
        result.content.replace(/[||]+/gm, "\n\n"),
        result.date
      );
      document.getElementById("content").innerHTML = mailInstance.innerHTML;
    });
    document.getElementById("mails").appendChild(mailInstance);
  }
};
xhr.send();
