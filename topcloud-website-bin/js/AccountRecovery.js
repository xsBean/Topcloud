function handleRadioChange(id) {
  // unselectRadio(1,false);
  // unselectRadio(2,false);
  // unselectRadio(3,false);

  switch(id) {
    case 'radio1':
      toggleRadio(1,true);
      // document.getElementById('radio-dialog1').className = 'selected-radio-dialog';
      toggleRadio(2,false);
      toggleRadio(3,false);

      break;
    case 'radio2':
      toggleRadio(2,true);
      // document.getElementById('radio-dialog2').className = 'selected-radio-dialog';
      toggleRadio(1,false);
      toggleRadio(3,false);
      break;
    case 'radio3':
      toggleRadio(3,true);
      // document.getElementById('radio-dialog3').className = 'selected-radio-dialog';
      toggleRadio(1,false);
      toggleRadio(2,false);
      break;
    default:
      alert('Error. Invalid .js'); // This shouldn't happen
  }
}



function toggleRadio(idNum, bool) {
  document.getElementById('radio' + idNum).checked = bool;
  if(bool) {
    document.getElementById('radio-dialog' + idNum).className = 'selected-radio-dialog';
  } else {
    document.getElementById('radio-dialog' + idNum).className = 'unselected-radio-dialog';
  }
}
