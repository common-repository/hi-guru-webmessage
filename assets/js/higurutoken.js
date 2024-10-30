/* Enable Button */

function enableTokenbutton() {
	var gToken = document.getElementById("higuru_token").value;
	const regex = /^[a-z0-9]{8}[\-]{1}[a-z0-9]{4}[\-]{1}[a-z0-9]{4}[\-]{1}[a-z0-9]{4}[\-]{1}[a-z0-9]{12}/;
	let matchguru;

	if ((matchguru = regex.exec(gToken)) !== null) {
				var guruT = document.getElementById("higuru_token_apply");
				guruT.removeAttribute("disabled");

			} else {
				guruT.setAttribute("disabled");
			}
	}



/* Reset Token */
function removeToken() {	
	
	document.getElementById("higuru_token").value="";
	document.getElementById("higuru_token_apply").value = "Save";
	document.getElementById("higuru_token_apply").click();
	update_option('higuru_channel_uuid','' );
		
}
