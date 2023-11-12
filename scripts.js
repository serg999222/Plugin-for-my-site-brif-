let currentSteps = 1;
let popups = [];
let progress = 0;
let buttonsNext = [];
let buttonsPrev = [];
let progressBars = [];

document.addEventListener('DOMContentLoaded', function () {
	// Код, який має виконатися після завантаження всіх елементів
	popups = document.querySelectorAll('.popaps');
	buttonsNext = document.querySelectorAll('.next');
	buttonsPrev = document.querySelectorAll('.prev');
	progressBars = document.querySelectorAll('.progress-bar');
	uploadStep(currentSteps);

	// Встановлення обробників подій для кнопок

	document.querySelector('.input_name').addEventListener('blur', validateName);
	document.querySelector('.input_tel').addEventListener('blur', validateTel);
	document.querySelector('.input_email').addEventListener('blur', validateEmail);

	document.querySelectorAll('.prev').forEach((buttonPrev) => {
		buttonPrev.addEventListener('click', function (event) {
			event.preventDefault();
			prevStep();
		});
	});

	document.querySelectorAll('.next').forEach((buttonNext) => {
		buttonNext.addEventListener('click', function (event) {
			event.preventDefault();
			nextStep();
		});
	});
});

function uploadStep(currentSteps) {
	if (currentSteps < 1) {
		++currentSteps;
		return;
	} else if (currentSteps > popups.length) {
		--currentSteps;
		return;
	} else {
		document.getElementById('brif_form_submit').style.display = "none";
		popups.forEach((popap, index) => {
			popap.classList.remove('active');
			if (index === currentSteps - 1) {
				popap.classList.add('active');
			}

			buttonsPrev.forEach((buttonPrev) => {
				buttonPrev.style.display = "block";
			})
			buttonsNext.forEach((buttonNext) => {
				buttonNext.style.display = "block";
			})

			if (currentSteps === 1) {
				buttonsPrev.forEach((buttonPrev, index) => {
					if (index === currentSteps - 1) {
						buttonPrev.style.display = "none";
					}
				})
			}

			if (currentSteps === popups.length) {
				document.getElementById('brif_form_submit').style.display = "block";
				buttonsNext.forEach((buttonNext, index) => {
					if (index === currentSteps - 1) {
						buttonNext.style.display = "none";
					}
				})
			}
		}
		)
		progress = (100 / popups.length) * currentSteps;
		progressBars.forEach((progressBar, index) => {
			if (index === currentSteps - 1) {
				progressBar.style.width = String(progress) + "%";
			}
		})

	}

}

//Навігація
function nextStep() {
	if (currentSteps === 1) {
		if (!validateFieldsForStep1()) {
			return;
		}
	}

	currentSteps += 1;
	uploadStep(currentSteps);
}

function prevStep() {
	currentSteps -= 1;
	uploadStep(currentSteps);
}

//Валідація============================================================================================


function validateName() {
	let valueName = document.querySelector('.input_name');
	let fieldError = document.querySelector('.input_name_error');
	if (valueName.value.trim() === "" || valueName.value.length < 2) {
		valueName.style.boxShadow = "inset 0 0 10px red";
		fieldError.style.opacity = 1;
	} else {
		valueName.style.boxShadow = "none";
		fieldError.style.opacity = 0;
	}
}
function validateTelInputTel(input) {
	input.value = input.value.replace(/[^0-9\+\-\*\(\) ]/g, '');
}
function validateTel() {
	let valueTel = document.querySelector('.input_tel');
	let fieldError = document.querySelector('.input_tel_error');
	if (valueTel.value.trim() === "" || valueTel.value.length < 9) {
		valueTel.style.boxShadow = "inset 0 0 10px red";
		fieldError.style.opacity = 1;
	} else {
		valueTel.style.boxShadow = "none";
		fieldError.style.opacity = 0;
	}
}

function validateEmail() {
	let valueEmail = document.querySelector('.input_email');
	let fieldError = document.querySelector('.input_email_error');
	if (valueEmail.value.trim() === "" || valueEmail.value.length < 4) {
		valueEmail.style.boxShadow = "inset 0 0 10px red";
		fieldError.style.opacity = 1;
	} else {
		valueEmail.style.boxShadow = "none";
		fieldError.style.opacity = 0;
	}
}

function validateFieldsForStep1() {
	// Отримуємо значення полів
	let inputName = document.querySelector('.input_name').value;
	let inputTel = document.querySelector('.input_tel').value;
	let inputEmail = document.querySelector('.input_email').value;

	// Проводимо валідацію (приклад)
	if (inputName.trim() === '' || inputTel.trim() === '' || inputEmail.trim() === '') {
		alert('Будь ласка, заповніть всі поля.');
		return false; // Валідація не пройдена
	}

	return true; // Валідація пройдена
}



