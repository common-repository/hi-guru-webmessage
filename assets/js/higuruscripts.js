function higuru_widget_init() {
        var body = document.body; 
        var higuruChatBlock = document.createElement('div'); 
                higuruChatBlock.setAttribute('id', 'higuru-webchat'); 
                body.appendChild(higuruChatBlock); 
        var token = document.getElementById("higuru_token");
                Higuru.WebChat.init({ selector: "#higuru-webchat", token: token.value}); 
     
}




