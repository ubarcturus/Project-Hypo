        var nameErr= "";;
        var emailErr= "";;
        var phoneErr= "";; 
        var riskErr= "";;
        var mortgageErr = "";
        var name = ""; 
        var email = ""; 
        var phone = ""; 
        var risklvl = ""; 
        var mortgagePacket = "";
        var risklevels = ['Risikostufe 1', 'Risikostufe 2', 'Risikostufe 3', 'Risikostufe 4'];
        var mortgages = ['HypoPaket 1', 'HypoPaket 2', 'HypoPaket 3', 'HypoPaket 4'];
        var errors  = [];

        if(document.querySelector('#submit').value.length!== '0')
        {
            if(document.querySelector('#name').value === '')
            {
                errors.push('Name wird benötigt');
            }
            else
            {
                    //
            }
            if(document.querySelector('#email').value === '')
            {
                errors.push('Email wird benötigt');
            }
            else
            {
                if(strpos($_POST["email"], '@'))
                {
                    //$email = test_input($_POST["email"]);
                }
                else
                {
                    errors.push('Email braucht ein @ Zeichen');
                }
            }
            if(document.querySelector('#phone').value !== '')
            {
                if(preg_match('/^[0-9\/ +-]*$/', $_POST["phone"]))
                {
                   // $phone = test_input($_POST["phone"]);
                }
                else
                {
                    errors.push('Die Telefonnummer ist nicht im richtigem Format');
                }
            }
            if(document.querySelector('#risk').value == 'Select Risikostufe')
            {
                errors.push('Es muss eine Risikostufe ausgewählt werden'); 
            }
            else
            {
                //$risklvl = htmlentities($_POST["risk"]);
            }
            if(document.querySelector('#mortgage').value == "Select HypoPaket")
            {
                $mortgageErr = "Es muss ein HypoPaket ausgewählt werden";
            }
            else
            {
                //$mortgagePacket = htmlentities($_POST["mortgage"]);
            }
            var isValid = errors.length < 1;
            
            if ( ! isValid) {
                renderErrors(errors);
                e.preventDefault();
            }
        }

        function test_input(data) 
        {
            data = data.Prototype.Trim();
            data = stripslashes($data);
            data = htmlspecialchars($data);
            return $data;
        }