function throttle(fn, wait) {
  var time = Date.now();
  return function() {
    if ((time + wait - Date.now()) < 0) {
      fn();
      time = Date.now();
    }
  }
}

function toggle_display(elementid) {
  (function(style) {
    style.display = style.display === 'none' ? '' : 'none';
  })(document.getElementById(elementid).style);
}

function toggle_sidebar(elementid) {
  var elem = document.getElementById(elementid);
  if(elem.classList.contains("bl-sm-hide")){
    elem.classList.remove("bl-sm-hide");
  } else {
    elem.classList.add("bl-sm-hide");
  }
}
//bl-sm-hide

function ajax_post(route, data, return_success, return_fail, csrf_token) {
  var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function()
    { if
      (xmlHttp.readyState === 4)
        {
            return_success.innerHTML = xmlHttp.responseText;
        }
    }
    xmlHttp.open("POST", route);
    xmlHttp.setRequestHeader("X-CSRF-token", csrf_token);
    xmlHttp.send(data);
}

function ajax_post_append(route, data, return_success, return_fail, csrf_token) {
  var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function()
    { if
      (xmlHttp.readyState === 4)
        {
            return_success.insertAdjacentHTML('afterend', xmlHttp.responseText);
        }
    }
    xmlHttp.open("POST", route);
    xmlHttp.setRequestHeader("X-CSRF-token", csrf_token);
    xmlHttp.send(data);
}

function ajax_get(route, return_success, return_fail, data, callback) {
  var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function()
    { if
      (xmlHttp.readyState === 4)
        {
            return_success.innerHTML = xmlHttp.responseText;
            callback();
            return;
        }
    }
    xmlHttp.open("GET", route);
    xmlHttp.send(data);
}

function verify_email() {
  var data = new FormData();
  var form = document.getElementById("form-verify-email");
  var email = form.elements['email_code'].value;
  var email_confirm = form.elements['email_code_confirm'].value;
  data.append('email', email);
  data.append('email-confirmation', email_confirm);
  var elem = document.getElementById('email-data-return');
  var token = document.head.querySelector("[name=csrf_token]").content;
  ajax_post('/sendverificationmail', data, elem, elem, token);
}

function autogrow(element, max_height) {
  if(element.clientHeight < max_height) {
    if(element.clientHeight < element.scrollHeight) {
      element.style.height = (element.clientHeight + 22) + "px";
    }
  }
}

function post() {
  var data = new FormData();
  var form = document.getElementById('form-submit-post');
  var text = form.elements['post-body'].value;
  data.append('textbody', text);
  var return_elem = document.getElementById('post-return');
  var token = document.head.querySelector("[name=csrf_token]").content;
  ajax_post('/makepost', data, return_elem, return_elem, token);
}

function toggle_txt(element,txt_1,txt_2) {
  var txt_0 = element.textContent;
  if(txt_0 === txt_1) {element.textContent = txt_2;} else {element.textContent = txt_1;};
}

function fileup(){
  document.getElementById("fileup").onchange = function() {
  var media_in = document.getElementById("fileup");
  for(var i=0; i < media_in.files.length; i++)
  {
      var file = media_in.files[i];
      if(file.type === "application/pdf") {
        pdf_url = URL.createObjectURL(file);
        var elem = document.getElementById('post-media-preview');
        elem.insertAdjacentHTML('beforeend', '<iframe src="'+pdf_url+'" style="width:100%; height:800px;" frameborder="0"></iframe>');

      } else {
          var fr = new FileReader();
          fr.onload = function (e) {
            var elem = document.getElementById('post-media-preview');
            elem.insertAdjacentHTML('beforeend', '<img class="post-image-previews" src="'+e.target.result+'">');
          }
          fr.readAsDataURL(file);
        }
    }
}}

function write_time() {
  var d = new Date();
  var h = d.getHours();
  var m = d.getMinutes();
  var ampm = h >= 12 ? 'pm' : 'am';
  h = h % 12;
  h = h ? h : 12;
  m = zero_time(m);
  document.getElementById('current-time').innerHTML = h + ":" + m + ' ' + ampm;
  var t = setTimeout(write_time, 2500);
}

function zero_time(i) {
  if (i<10) {
    i = "0" + i;
  }
 return i;
}

function expandpost(post_id, return_to) {
  var return_success = document.getElementById(return_to);
  if(return_success.classList.contains('post_loaded')) {
    toggle_display(return_to);
  }
  else {
    var request = new XMLHttpRequest;
    request.onreadystatechange = function()
    { if
      (request.readyState === 4)
        {
            return_success.innerHTML = request.responseText;
            return_success.style.display = "block";
            return_success.className += " post_loaded";
        }
    }

    request.open("GET" ,'/getpostbody/'+post_id);
    request.send();
  }
}

function bp_upvote(obj) {
  var data = new FormData();
  var post_id = obj.getAttribute('data-post-id');
  data.append('post_id', obj.getAttribute('data-post-id'));
  data.append('block', obj.getAttribute('data-block'));
  var token = document.head.querySelector("[name=csrf_token]").content;
  var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function()
    { if
      (xmlHttp.readyState === 4)
        {
            var return_score = document.getElementById('bp-preview-score-'+post_id);
            return_score.innerHTML = xmlHttp.responseText;

            if(obj.classList.contains("bp-upvoted")) {
              obj.classList.remove("bp-upvoted");
            } else {
            obj.classList += " bp-upvoted";
          }
        }
    }
    xmlHttp.open("POST", '/upvote');
    xmlHttp.setRequestHeader("X-CSRF-token", token);
    xmlHttp.send(data);

}

function previewsidebar() {
  var data = new FormData();
  var sidebar = document.getElementById('sidebar');
  data.append('text', sidebar.value);
  var token = document.head.querySelector("[name=csrf_token]").content;
  var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function()
    { if
      (xmlHttp.readyState === 4)
        {
            var sidebar = document.getElementById('sidebar-compiled');
            sidebar.innerHTML = xmlHttp.responseText;
        }
    }
    xmlHttp.open("POST", '/markdownpreview');
    xmlHttp.setRequestHeader("X-CSRF-token", token);
    xmlHttp.send(data);
}

function subscribe($block) {
  var data = new FormData();
  data.append('block_name', $block);
  var token = document.head.querySelector("[name=csrf_token]").content;
  var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function()
    { if
      (xmlHttp.readyState === 4)
        {
            var sub_div = document.getElementById('subscribe-container');
            sub_div.innerHTML = '<button onclick="unsubscribe('+$block+')" class="btn btn-unsubscribe">UnSubscribe</button>';
        }
    }
    xmlHttp.open("POST", '/subscribe');
    xmlHttp.setRequestHeader("X-CSRF-token", token);
    xmlHttp.send(data);
}

function unsubscribe($block) {
  var data = new FormData();
  data.append('block_name', $block);
  var token = document.head.querySelector("[name=csrf_token]").content;
  var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function()
    { if
      (xmlHttp.readyState === 4)
        {
            var sub_div = document.getElementById('subscribe-container');
            sub_div.innerHTML = '<button onclick="subscribe('+$block+')" class="btn btn-subscribe">Subscribe</button>';
        }
    }
    xmlHttp.open("POST", '/unsubscribe');
    xmlHttp.setRequestHeader("X-CSRF-token", token);
    xmlHttp.send(data);
}

function comment($f, $return) {
  var cd = new FormData($f);
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      document.getElementById($return).insertAdjacentHTML('afterbegin', xhr.responseText);
    }
  }
  xhr.open("POST", "/make-bp-comment");
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.send(cd);
  event.preventDefault();
}

function comment_reply(f, id) {
  var cd = new FormData(f);
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      document.getElementById('reply-return-'+id).insertAdjacentHTML('afterbegin', xhr.responseText);
      hide('reply-'+id); 
      document.getElementById('comment-rtext-'+id).value = ""; 
      document.getElementById('crp-'+id).style.display = "none"; 
    }
  }
  xhr.open("POST", "/makecommentreply");
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.send(cd);
  event.preventDefault();
}

function bc_upvote($b, $comment) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      document.getElementById('comment-score-num'+$comment).innerHTML = xhr.responseText;
      $b.className += 'voted';
      document.getElementById($return).insertAdjacentHTML('afterbegin', xhr.responseText);
    }
  }
  xhr.open("POST", "/upvotecomment");
  var token = document.head.querySelector("[name=csrf_token]").content;
  xhr.setRequestHeader("X-CSRF-token", token);
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.send(cd);
  event.preventDefault();
}

function bc_downvote($b, $comment) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      document.getElementById('comment-score-num'+$comment).innerHTML = xhr.responseText;
      $b.className += 'voted';
      document.getElementById($return).insertAdjacentHTML('afterbegin', xhr.responseText);
    }
  }
  xhr.open("POST", "/upvotecomment");
  var token = document.head.querySelector("[name=csrf_token]").content;
  xhr.setRequestHeader("X-CSRF-token", token);
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.send(cd);
  event.preventDefault();
}

function bp_downvote() {

}

function show(element) {
  document.getElementById(element).style.display = "block";
}

function hide(element) {
  document.getElementById(element).style.display = "none";
}

function preview_comment(element, text) {
  var form = element.parentElement;
  var data = new FormData();
  data.append('text', form.elements[text].value);
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      form.querySelector('#text-preview').innerHTML = xhr.responseText;
      form.querySelector('#text-preview').style.display = "block";
    }
  }
  xhr.open("POST", "/rendertext");
  var token = document.head.querySelector("[name=csrf_token]").content;
  xhr.setRequestHeader("X-CSRF-token", token);
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.send(data);
  event.preventDefault();

}

function rendertext(txt_src, target) {
  var data = new FormData(); 
  data.append('text',document.getElementById(txt_src).value); 
  var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      var elem = document.getElementById(target); 
      elem.innerHTML = xhr.responseText; 
      elem.style.display = "block"; 
    
    }
  }
  xhr.open("POST", "/rendertext");
  var token = document.head.querySelector("[name=csrf_token]").content;
  xhr.setRequestHeader("X-CSRF-token", token);
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.send(data);
  event.preventDefault();
}
function render(form, name, to) {
  var form = document.getElementById(form);
  var data = new FormData();
  data.append('text', form.elements[name].value);
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if(xhr.readyState === 4) {
      document.getElementById(to).innerHTML = xhr.responseText;
    }
  }
  xhr.open("POST", '/rendertext');
  var token = document.head.querySelector("[name=csrf_token]").content;
  xhr.setRequestHeader("X-CSRF-token", token);
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.send(data);
  event.preventDefault();
}

function load_yt(bt) {
  var link = bt.getAttribute('data-link');
  document.getElementById('yt-'+bt.getAttribute('data-post')).innerHTML = '<iframe src="https://www.youtube.com/embed/'+link.substr(link.length - 11)+'">';
}

function expand_menu() {

}

function report(form) {
  var data = new FormData(form);
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if(xhr.readyState === 4) {
      form.innerHTML = xhr.responseText;
    }
  }
  xhr.open("POST", '/makereport');
  var token = document.head.querySelector("[name=csrf_token]").content;
  xhr.setRequestHeader("X-CSRF-token", token);
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.send(data);
  event.preventDefault();

}

function loginrequired() {
  alert("You need to login.");
}

function fetchreports(type, ref) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if(xhr.readyState === 4) {
      console.log('yee');
      console.log(xhr.responseText);
      show('reports-'+type+'-'+ref);
      var elem = document.getElementById('reports-'+type+'-'+ref);
      elem.innerHTML = xhr.responseText;
      elem.style.display = "block"; 
    }
  }
  xhr.open("GET", '/reports/'+type+'/'+ref);
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.send();
}

function loadnext() {
  var elem = document.getElementById('paginate-next-page');
  if(elem.dataset.next && elem.dataset.next !== "null") {
    var route = elem.dataset.next;
    elem.dataset.next = null;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4) {
          var data = JSON.parse(xhr.response);
          elem.dataset.next = data['next_page'];
          document.getElementById('paginate-append').insertAdjacentHTML('beforeend', data['posts']);
          if(!data['next_page']) {
            document.getElementById('paginate-append').insertAdjacentHTML('beforeend', '<h3 class="card light card-blue">No More to Load</h3>');
            hide('load-next');
          }
        }
      }
    xhr.open("GET", route);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.send();
  }
}

function scroll_loader() {
    var elem = document.getElementById('paginate-next-page');
    var page = elem.dataset.next;
    if(page !== null && page !== "") {
      var scroll_position_for_load = window.innerHeight + window.pageYOffset + 600;
      if(scroll_position_for_load >= document.body.scrollHeight) {
        loadnext();
      }
  }
}

function p_setup() {
  var paginator = document.getElementById('paginate-next-page');
  if(paginator) {
    window.addEventListener("scroll", throttle(scroll_loader, 300));

  }
}

document.addEventListener("DOMContentLoaded", function(){
  try {
    p_setup();
  } catch (err) {

  }
});

function deletepost(form) {
    var xhr = new XMLHttpRequest();
    var data = new FormData(form); 
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        form.innerHTML = xhr.responseText; 
      }
    }
    xhr.open("POST", "/deletepost");
    var token = document.head.querySelector("[name=csrf_token]").content;
    xhr.setRequestHeader("X-CSRF-token", token);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.send(data);
    event.preventDefault();
}

function deleteimage(id, block) {
    var xhr = new XMLHttpRequest();
    var data = new FormData(); 
    data.append('id',id);
    data.append('block',block);  
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        document.getElementById('img-name-'+id).innerHTML = xhr.response;

      }
    }
    xhr.open("POST", "/deletecssimage");
    var token = document.head.querySelector("[name=csrf_token]").content;
    xhr.setRequestHeader("X-CSRF-token", token);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.send(data);
    event.preventDefault();
}

function sendform(route, form, return_elem, hide) { 
    var xhr = new XMLHttpRequest();
    var data = new FormData(form); 
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        var elem = document.getElementById(return_elem); 
        elem.innerHTML = xhr.responseText; 
        elem.style.display = "block"; 
        if(hide !== null) { 
              document.getElementById(hide).style.display = "none"; 
        }
      }
    }
    xhr.open("POST", "/"+route);
    var token = document.head.querySelector("[name=csrf_token]").content;
    xhr.setRequestHeader("X-CSRF-token", token);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.send(data);
    event.preventDefault();
}

function editpost(id) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if(xhr.readyState === 4) {
      document.getElementById('post-editor-'+id).innerHTML = xhr.responseText; 
    }
  }
  xhr.open("GET", '/editpost?id='+id);
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.send();
}


function vote(obj) {
  var data = new FormData();
  data.append('ref', obj.getAttribute('data-post-id'));
  data.append('vote_type', obj.getAttribute('data-vote-type'));
  data.append('item_type', obj.getAttribute('data-item-type')); 
  var id = obj.getAttribute('data-post-id'); 
  var token = document.head.querySelector("[name=csrf_token]").content;
  var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() { 
      if(xhr.readyState === 4) {
        if(xhr.responseText) { 
          var vt = obj.getAttribute('data-vote-type'); 
          var it = obj.getAttribute('data-item-type'); 
          if(it === "post") { 
            var pre = "bp"; 
          } else { 
            var pre = "comment"; 
          }
          if(vt === "upvote") { 
            var obj2 = document.getElementById(pre+'-downvote-'+id);
            if(obj.classList.contains(pre+'-upvoted')) { 
              obj.classList.remove(pre+'-upvoted'); 
              obj2.classList.remove(pre+'-downvoted'); 
            } else { 
              obj.classList.add(pre+'-upvoted'); 
              obj2.classList.remove(pre+'-downvoted'); 
            }
          } else if(vt === "downvote") { 
            var obj2 = document.getElementById(pre+'-upvote-'+id); 
            if(obj.classList.contains(pre+'-downvoted')) {
              obj.classList.remove(pre+'-downvoted'); 
              obj2.classList.remove(pre+'-upvoted'); 
            } else { 
              obj.classList.add(pre+'-downvoted');
              obj2.classList.remove(pre+'-upvoted'); 
            }
          }
          document.getElementById(pre+'-preview-score-'+id).innerHTML = xhr.responseText; 
        }
      }
    }

    xhr.open("POST", '/vote');
    xhr.setRequestHeader("X-CSRF-token", token);
    xhr.send(data);

}


function ban_user(obj) { 
    var xhr = new XMLHttpRequest();
    var data = new FormData(obj); 
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) { 
        document.getElementById('banlist').insertAdjacentHTML('afterbegin', xhr.responseText); 
        obj.reset(); 
      }
    }
    xhr.open("POST", "/mod/banuser");
    var token = document.head.querySelector("[name=csrf_token]").content;
    xhr.setRequestHeader("X-CSRF-token", token);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.send(data);
    event.preventDefault();
}

function unban(obj) {
  var xhr = new XMLHttpRequest(); 
  var data = new FormData(); 
  data.append('block', obj.getAttribute('data-block'));
  data.append('user', obj.getAttribute('data-user'));
  xhr.onreadystatechange = function() { 
    if(xhr.readyState === 4) { 
      obj.innerHTML = xhr.responseText; 
    }
  }
  xhr.open("POST", "/mod/unban"); 
  var token = document.head.querySelector("[name=csrf_token]").content;
  xhr.setRequestHeader("X-CSRF-token", token);
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.send(data);
  event.preventDefault();

}

function removecomment(obj) {
  var xhr = new XMLHttpRequest(); 
  var data = new FormData(obj); 

  xhr.onreadystatechange = function() { 
    if(xhr.readyState === 4) { 
      obj.innerHTML = xhr.responseText; 
    }
  }
  xhr.open("POST", "/mod/removecomment"); 
  var token = document.head.querySelector("[name=csrf_token]").content;
  xhr.setRequestHeader("X-CSRF-token", token);
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.send(data);
  event.preventDefault();
}
