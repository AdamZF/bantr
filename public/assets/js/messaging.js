var socket = io(':3000');

function throttle(fn, wait) {
  var time = Date.now();
  return function() {
    if ((time + wait - Date.now()) < 0) {
      fn();
      time = Date.now();
    }
  }
}


function clear_form() {
  document.getElementById('new_msg').elements.namedItem('textbody').value = "";
}

function sendmessage($f) {
  var data = new FormData($f);
  var return_to = document.getElementById('message_return');
  var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function()
    { if(xmlHttp.readyState === 4)
        {
          document.getElementById('message_return').insertAdjacentHTML('beforeend', xmlHttp.responseText);
          set_bottom();
          clear_form();
        }
      else {
      }
    }
    xmlHttp.open("POST", '/sendmessage');
    xmlHttp.send(data);
  event.preventDefault();
}

socket.on('newmessage', function(data) {
  var msg = data['message_data'];
  var user = document.head.querySelector("[name=user]").content;
  if(user !== data['username']) {
  document.getElementById('message_return').insertAdjacentHTML('beforeend', msg);
  set_bottom();
}

});

function mailbox_sh() {
  var msg_box = document.getElementById('message_return');
  msg_box.scrollTop = msg_box.scrollHeight;
}


function get_convo() {
  var convo_id = this.getAttribute('data-convo');
  window.location = "/messages/c/"+convo_id;
}

function set_preview_listener() {
  var convos = document.getElementsByClassName("convo_preview");
  for (var i = 0; i < convos.length; i++) {
      convos[i].addEventListener('click', get_convo, false);
  }

  var menu_tog = document.getElementById('msg-menu-tog');
  menu_tog.onclick = function() {
    var menu = document.getElementById('msg-menu-left');
    menu.classList.toggle('bl-md-hide');
  }
}

function check_key(ta) {

  if(ta.keyCode === 13 && !ta.shiftKey) {
    var form = document.getElementById('new_msg');
    sendmessage(form);
  }
}


function connect() {
 var id = document.getElementById('convo_key');
 if(id) {
   id = id.value;

   socket.connect();
   socket.emit('conversation_connect', {convo: id});
 }
}

function loadmessages() {
  var elem = document.getElementById('messages-paginate-next-page');
  if(elem.dataset.next && elem.dataset.next !== "null") {
    var route = elem.dataset.next;
    elem.dataset.next = null;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4) {
          var data = JSON.parse(xhr.response);
          elem.dataset.next = data['next_page'];
          document.getElementById('messages-paginate-append').insertAdjacentHTML('beforeend', data['messages']);
          if(!data['next_page']) {
            document.getElementById('messages-paginate-append').insertAdjacentHTML('afterbegin', '<h3 class="card light card-blue">No More Messages to Load</h3>');
          }
        }
      }
    xhr.open("GET", route);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.send();
  }
}

function message_loader() {
    var elem = document.getElementById('messages-paginate-next-page');
    var page = elem.dataset.next;
    if(page !== null && page !== "") {
      var scroll_position_for_load = window.innerHeight + window.pageYOffset + 600;
      if(scroll_position_for_load >= document.body.scrollHeight) {
        loadmessages();
      }
  }
}


function set_bottom() {
  var c = document.getElementById('message_return');
  c.scrollTop = c.scrollHeight;
}

function message_paginator() {
  var paginator = document.getElementById('messages-paginate-next-page');
  if(paginator) {
    document.getElementById('message_return').addEventListener("scroll", throttle(message_loader, 300));
  }
}

function m_setup() {
  set_preview_listener();
  connect();
  set_bottom();
  message_paginator();
}

document.addEventListener("DOMContentLoaded", function(){
  m_setup();
});
