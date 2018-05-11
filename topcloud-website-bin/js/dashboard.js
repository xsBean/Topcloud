/*
 *  Functions for the height of the columns
 */

function adjustWidthCol3() {

  if(window.innerWidth < 800) {
    document.getElementById('column-container3').style.width = '100%'
  } else if(window.innerWidth < 1025) {
  	var w = window.innerWidth - 478;
  	var element = document.getElementById('column-container3');
    element.style.width = w + 'px';
    return w;
  } else if(window.innerWidth < 1350){
    document.getElementById('column-container3').style.width = '98%';
  } else {
    document.getElementById('column-container3').style.width = '24%';
  }
}

function adjustHeightCol2() {
  if (window.innerWidth < 800) {
    var element = document.getElementById('column-container2');
    element.style.height = (element.offsetWidth * 1.34) + 'px';
  } else {
    document.getElementById('column-container2').style.height = '550px';
  }
}

function adjustHeightCol1() {
  if(window.innerWidth < 380) {
    var element = document.getElementById('column-container1');
    element.style.height = '250px';
  } else if (window.innerWidth < 800) {
    var element = document.getElementById('column-container1');
    element.style.height = element.offsetWidth + 'px';
  } else {
    document.getElementById('column-container1').style.height = '550px';
  }
}

function adjustHeightCalendarContent() {
  var element1 = document.getElementById('calendar-container');
  var element2 = document.getElementById('calendar-content');
  element2.style.height = (element1.offsetHeight-63) + 'px';
}

function adjustHeightMessagesContainer() {
  if(window.innerWidth < 460) {
    var element1 = document.getElementById('messenger-container');
    var element2 = document.getElementById('messages-container');
    element2.style.height = (element1.offsetHeight-45) + 'px';
  } else {
    var element1 = document.getElementById('messenger-container');
    var element2 = document.getElementById('messages-container');
    element2.style.height = (element1.offsetHeight-100) + 'px';
  }
}

function adjustHeightAnnouncementsContentContainer() {
  var element1 = document.getElementById('announcements-container');
  var element2 = document.getElementById('announcements-content-container');
  element2.style.height = (element1.offsetHeight-66) + 'px';
}

function adjustHeightTextArea(id) {
  var element = document.getElementById(id);
  if(window.innerWidth < 400) {
    element.style.height = (window.innerHeight - 120) + 'px';
  } else {
    element.style.height = (window.innerHeight - 200) + 'px';
  }
}

// calls adjustHeight on window load
window.onload = function(event) {
  adjustHeightCol1();
  adjustHeightCol2();
  adjustWidthCol3();
  adjustHeightCalendarContent();
  adjustHeightMessagesContainer();
  adjustHeightAnnouncementsContentContainer();
  adjustHeightTextArea('message-textarea');
  adjustHeightTextArea('announcement-textarea');
  buildCalendar();
};

// calls adjustHeight anytime the browser window is resized
window.onresize = function(event) {
  adjustHeightCol1();
  adjustHeightCol2();
  adjustWidthCol3();
  adjustHeightCalendarContent();
  adjustHeightMessagesContainer();
  adjustHeightAnnouncementsContentContainer();
  adjustHeightTextArea('message-textarea');
  adjustHeightTextArea('announcement-textarea');
};

/**
 *  Settings Card Functions
 */

 function settingsCardToggle(id) {
   var element = document.getElementById(id);
   if(element.getAttribute('class') === 'unselected-settings-container') {
     element.setAttribute('class','selected-settings-container');
   } else {
     element.setAttribute('class','unselected-settings-container');
   }
 }

/**
 *  Calendar Functions
 */
 var days = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
 var month;   // Integer holding the month of the current year Values:(0-11)
 var dayOfTheWeek;  // String holding the day in the current week
 var dayOfTheMonth; // Integer holding the day in the current month
 var CalendarLength =  35; // array for date values.
 var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
 var monthLengths = [31,28,31,30,31,30,31,31,30,31,30,31];

 function disableDate(id) {
   document.getElementById(id).style.color = "#c13328";
 }

 function getDateInfo() {
   var date = (new Date()).toString();
   month = getMonthNum(date.substring(4,7));
   dayOfTheWeek = date.substring(0,3);

   for(var i = 8; i < date.length; i++) {
     if(date.substring(i,i+1) === " ") {
       dayOfTheMonth = date.substring(8,i);
       break;
     }
   }
 }

 /**
  * Returns the month as an integer
  */
 function getMonthNum(monthAsStr) {
   for(var i = 0; i < months.length; i++) {
     if(monthAsStr === months[i].substring(0,3)) {
       return i;
     }
   }
   return 0;
 }

 /**
  * Returns the previous month as an integer
  */
 function getPreviousMonth(monthAsNum) {
   monthAsNum -= 1;
   if(monthAsNum < 0) {
     return monthAsNum + 12;
   } else {
     return monthAsNum;
   }
 }

 /**
  * Returns the next month as an integer
  */
 function getNextMonth(monthAsNum) {
   monthAsNum += 1;
   if(monthAsNum > 11) {
     return monthAsNum - 12;
   } else {
     return monthAsNum;
   }
 }

 /*
  * Returns the first day of the current month as an integer in position width
  * the Calendar array.
  */
 function findFirstDay(currentDay) {
   var firstDay;

   for(var i = 0; i < 7; i++) {
     if(days[i] === currentDay) {
       firstDay = i + 1 - (dayOfTheMonth % 7);
       break;
     }
   }
   if(firstDay < 0) { // wraps through the week
     firstDay += 7;
   }

   return firstDay;
 }

 function buildCalendar() {
   getDateInfo();
   var firstDay = findFirstDay(dayOfTheWeek);
   var tInt = 0; // Used as a second integer to increment in the for-loops below

   // Sets the month in the Calendar card
   document.getElementById('month').innerHTML = months[month];

   // Fills the dates of the previous month and diables them
   for(var i = firstDay-1; i >= 0; i--) {
     document.getElementById("date"+(i+1)).innerHTML = monthLengths[getPreviousMonth(month)] - tInt;
     disableDate("date" + (i+1));
     tInt++;
   }
   tInt = 1; // Prepares for use in next for-loop

   // Fills in the days in the current month
   for(var i = firstDay; i < monthLengths[month]+firstDay; i++) {
     document.getElementById("date"+(i+1)).innerHTML = tInt;
     tInt++;
   }
   tInt = 1; // Prepares for use in next for-loop

   // Fills in the days in the next month and disables them
   for(var i = monthLengths[month]+firstDay; i < CalendarLength; i++) {
     document.getElementById("date"+(i+1)).innerHTML = tInt;
     disableDate("date" + (i+1));
     tInt++;
   }
 }

/**
 *  Messenger Functions
 */
 function toggleMessengerDivisionExpansion(idNum) {

   var div = document.getElementById('messenger-division' + idNum);

   // If the division is closed... It opens it.
   if(div.getAttribute('class') === 'closed-messenger-division') {
     div.setAttribute('class','opened-messenger-division');

     var button = document.getElementById('drop-button' + idNum);
     button.setAttribute('class','opened-drop-button');
     var content = document.getElementById('content' + idNum);
     content.setAttribute('class','opened-messenger-content');

   // If the division is opened... It closes it.
   } else {
     div.setAttribute('class','closed-messenger-division');

     var button = document.getElementById('drop-button' + idNum);
     button.setAttribute('class','closed-drop-button');
     var content = document.getElementById('content' + idNum);
     content.setAttribute('class','closed-messenger-content');
   }
 }
/*
 *  Toggles the visibiliy of the notification 'id'
 */
 function toggleNotificationVisibility(idNum) {
   var badge = document.getElementById(idNum);
   if(badge.className === 'visible-notification-badge') {
     badge.className = 'invisible-notification-badge';
   } else {
     badge.className = 'visible-notification-badge';
   }
 }

/*
 *  Toggles the visibiliy of the composer passed as 'id'
 */
 function togglePopUp(id) {
   var element = document.getElementById(id);

   if(element.getAttribute('class') === 'invisible-pop-up') {
     element.setAttribute('class','visible-pop-up');
   } else {
     element.setAttribute('class','invisible-pop-up');
   }
 }
