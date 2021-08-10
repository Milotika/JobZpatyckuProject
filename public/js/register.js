const form = document.querySelector('#register-form');
const username = document.querySelector('#user-login');
const email = document.querySelector('#user-email');
const password = document.querySelector('#user-password');
const password2 = document.querySelector('#user-password2');



form.addEventListener('submit',(e) => {
	e.preventDefault();

	checkInputs();
});

function checkInputs() {
	const usernameValue = username.value.trim();
	const emailValue = email.value.trim();
	const passwordValue = password.value.trim();
	const password2Value = password2.value.trim();
	var i = 0;
	if(usernameValue === '') {
		setError(username,'Pole login jest wymagane');
	} else {
		i++;
		setSuccess(username)
	}

	if(emailValue === '') {
		setError(email,'Pole email jest wymagane');
	} else if(!isEmail(emailValue)) {
		setError(email,'Pole adres email musi być poprawnym adresem email');
	}	else {
		i++;
		setSuccess(email);
	}

	if(passwordValue === '') {
		setError(password,'Pole hasło jest wymagane');
	} else {
		i++;
		setSuccess(password);
	}

	if(password2Value === '') {
		setError(password2,'Pole powtórz hasło jest wymagane');
	} else if(passwordValue !== password2Value) {
		setError(password2,'Hasła się nie zgadzają')
	} else {
		i++;
		setSuccess(password2);
	}
	if(i==4) {
		form.submit();
	}
}

function setError(input, message) {
	const controlForm = input.parentElement;
	const small = controlForm.querySelector('small');

	small.textContent = message;

	controlForm.className = 'control-form error'
}

function setSuccess(input){
	const controlForm = input.parentElement;
	controlForm.className = 'control-form success'
}  

function isEmail(email) {
	const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(String(email).toLowerCase());
}

