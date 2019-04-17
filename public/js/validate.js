var form = document.querySelector('#mainform');
var errorList = document.querySelector('#errorlist');
form.addEventListener('submit', function (e) {

	var errors = [];
	var fields = [{
			id: 'name',
			name: 'Name'
		},
		{
			id: 'email',
			name: 'E-Mail-Adresse'
		},
		{
			id: 'phone',
			name: 'Telefonnummer'
		}
	];
	fields.forEach(function (field) {
		var element = document.getElementById(field.id);
		var value = element.value.trim();
		if (field.id === "name") {

			if (value == "") {
				errors.push('Der Name muss ausgefüllt werden');
			}
		} 
		if (field.id === "phone") {

			if (!value.match('^[0-9\\(\\)\\+\\- ]*$')) {
				errors.push('Die Telefonnummer ist nicht gültig');
			}
		} 
		if (field.id === 'email') {
			if (value.indexOf('@') === -1) {
				errors.push('Email braucht ein @ Zeichen');
			}
		}

	});
	if (errors.length) {
		errorList.innerHTML = '';
		errors.forEach(function (error) {
			var li = document.createElement('li');
			li.innerHTML = error;
			li.classList.add("text-danger");
			errorList.appendChild(li);
		});
		e.preventDefault();
	}
});
var creationDate = document.querySelector('#creationdate');
var datePaid = document.querySelector('#datepaid');
var loyalityBonus = document.querySelector('#loyalitybonus');
loyalityBonus.addEventListener('change', updatePaymentpPeriod, {
	passive: false
});

function getDate(days) {
	var date;
	if(creationDate !== null){
		date = new Date(creationDate.value);
	}
	else{
		date = new Date();
	}
	date.setDate(date.getDate() + days);
	return date;
}

function updatePaymentpPeriod() {
	//cast to number because ie can't handle it.
	var loyalityValue = loyalityBonus.item(loyalityBonus.selectedIndex)
	var reduction = null;
	if (loyalityValue !== null) {
		reduction = +loyalityValue.getAttribute('data-paymentperiodreduction');
	}

	datePaid.innerHTML = getDate(30 - reduction).toLocaleDateString();
}
updatePaymentpPeriod();