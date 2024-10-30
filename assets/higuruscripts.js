function higuru_widget_init() {
        var body = document.body; 
        var higuruChatBlock = document.createElement('div'); 
                higuruChatBlock.setAttribute('id', 'higuru-webchat'); 
                body.appendChild(higuruChatBlock); 
        var token = document.getElementById("higuru_token");
                Higuru.WebChat.init({ selector: "#higuru-webchat", token: token.value}); 
     
}

function enableTokenbutton() {
        var gToken = document.getElementById("higuru_token").value;
        if(gToken.length===36) {
            var guruT = document.getElementById("higuru_token_apply");
            guruT.removeAttribute("disabled");
            
        } else {
            guruT.setAttribute("disabled");
        }
}


