function handleRadioChange(a){switch(a){case "radio1":toggleRadio(1,!0);toggleRadio(2,!1);toggleRadio(3,!1);break;case "radio2":toggleRadio(2,!0);toggleRadio(1,!1);toggleRadio(3,!1);break;case "radio3":toggleRadio(3,!0);toggleRadio(1,!1);toggleRadio(2,!1);break;default:alert("Error. Invalid .js")}}
function toggleRadio(a,b){(document.getElementById("radio"+a).checked=b)?document.getElementById("radio-dialog"+a).className="selected-radio-dialog":document.getElementById("radio-dialog"+a).className="unselected-radio-dialog"};