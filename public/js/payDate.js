function changePayDate()
{
    if(document.querySelector('#cmbRisk').value != 'Select Risikostufe')
    {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        today = mm + '/' + dd + '/' + yyyy;
        today = new Date(today);
        
        switch (document.querySelector('#cmbRisk').value) {
            case '1':
                today = addDaysToStartDate(today, +840);
                break;
            case '2':
                today = addDaysToStartDate(today,  +660);
                break;
            case '3':
                today = addDaysToStartDate(today, +480);
                break;
            case '4':
                today = addDaysToStartDate(today, +360);
                break;
            case '5':
                today = addDaysToStartDate(today, +240);
                break;
        
            default:
                break;
        }
        document.querySelector('#payDate').value = today.getDate() + "." + (today.getMonth() + 1) + "." + today.getFullYear();
    }
}
function addDaysToStartDate(startDate, addDays) {
    var startDate = new Date(startDate);
    startDate.setDate(startDate.getDate() + addDays);
    return startDate;
}
