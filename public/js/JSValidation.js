addEventListener("load", function(){
    document.querySelector('#formular').addEventListener('submit', function(evt) {
        var errors  = [];

        if(document.querySelector('#name').value === '') 
        {
            errors.push('Bitte gib einen Namen ein.');
        }

        if(document.querySelector('#email').value.indexOf('@') === -1) 
        {
            errors.push('Die Email muss ein \"@\" enthalten.');
        }

        if(document.querySelector('#phone').value.match('^[0-9\\(\\)\\+\\- ]*$')) 
        {
            errors.push('Die Telefonnummer ist nicht gültig.');
        }

        var isValid = errors.length < 1;

        if(!isValid) {
            //renderErrors(errors);
            evt.preventDefault();
        }
    });
});