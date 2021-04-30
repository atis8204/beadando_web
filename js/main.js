function ellenoriz() {
	var rendben = true;
	var fokusz = null;


	var text = document.getElementById("text");
	if (text) {
		if (text.value.length<10 || text.value.length>1000) {
			rendben = false;
			text.style.background = '#f99';
			fokusz = text;
		}
		else
		{
			text.style.background = '#FFFFFF';
		}
	}

	var tel = document.getElementById("tel");
	if (tel) {
		if (tel.value.length<7 || tel.value.length>12) {
			rendben = false;
			tel.style.background = '#f99';
			fokusz = tel;
		}
		else
		{
			tel.style.background = '#FFFFFF';
		}
	}

	var email = document.getElementById("email");
	if (email) {
		var checkPattern =/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if (!checkPattern.test(email.value)) {
			rendben = false;
			email.style.background = '#f99';
			fokusz = email;
		}
		else
		{
			email.style.background = '#FFFFFF';
		}
	}

	var nev = document.getElementById("nev");
	if (nev) {
		if (nev.value.length<8 || nev.value.length>30) {
			rendben = false;
			nev.style.background = '#f99';
			fokusz = nev;
		}
		else
		{
			nev.style.background = '#FFFFFF';
		}
	}

	



	if (fokusz) {
		fokusz.focus();
	}

	
	
	return rendben;
}