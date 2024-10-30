function enableTokenbutton() {
        var gToken = document.getElementById("higuru_token").value;
        if(gToken.length===36) {
            var guruT = document.getElementById("higuru_token_apply");
            guruT.removeAttribute("disabled");
            
        } else {
            guruT.setAttribute("disabled");
        }
}


