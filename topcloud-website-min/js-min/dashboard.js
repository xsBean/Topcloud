function adjustWidthCol3(){if(800>window.innerWidth)document.getElementById("column-container3").style.width="100%";else{if(1025>window.innerWidth){var a=window.innerWidth-478;document.getElementById("column-container3").style.width=a+"px";return a}1350>window.innerWidth?document.getElementById("column-container3").style.width="98%":document.getElementById("column-container3").style.width="24%"}}
function adjustHeightCol2(){if(800>window.innerWidth){var a=document.getElementById("column-container2");a.style.height=1.34*a.offsetWidth+"px"}else document.getElementById("column-container2").style.height="550px"}
function adjustHeightCol1(){if(380>window.innerWidth){var a=document.getElementById("column-container1");a.style.height="250px"}else 800>window.innerWidth?(a=document.getElementById("column-container1"),a.style.height=a.offsetWidth+"px"):document.getElementById("column-container1").style.height="550px"}function adjustHeightCalendarContent(){var a=document.getElementById("calendar-container");document.getElementById("calendar-content").style.height=a.offsetHeight-63+"px"}
function adjustHeightMessagesContainer(){if(460>window.innerWidth){var a=document.getElementById("messenger-container"),b=document.getElementById("messages-container");b.style.height=a.offsetHeight-45+"px"}else a=document.getElementById("messenger-container"),b=document.getElementById("messages-container"),b.style.height=a.offsetHeight-100+"px"}
function adjustHeightAnnouncementsContentContainer(){var a=document.getElementById("announcements-container");document.getElementById("announcements-content-container").style.height=a.offsetHeight-66+"px"}function adjustHeightTextArea(a){document.getElementById(a).style.height=400>window.innerWidth?window.innerHeight-120+"px":window.innerHeight-200+"px"}
window.onload=function(a){adjustHeightCol1();adjustHeightCol2();adjustWidthCol3();adjustHeightCalendarContent();adjustHeightMessagesContainer();adjustHeightAnnouncementsContentContainer();adjustHeightTextArea("message-textarea");adjustHeightTextArea("announcement-textarea");buildCalendar()};
window.onresize=function(a){adjustHeightCol1();adjustHeightCol2();adjustWidthCol3();adjustHeightCalendarContent();adjustHeightMessagesContainer();adjustHeightAnnouncementsContentContainer();adjustHeightTextArea("message-textarea");adjustHeightTextArea("announcement-textarea")};
function settingsCardToggle(a){a=document.getElementById(a);"unselected-settings-container"===a.getAttribute("class")?a.setAttribute("class","selected-settings-container"):a.setAttribute("class","unselected-settings-container")}var days="Sun Mon Tue Wed Thu Fri Sat".split(" "),month,dayOfTheWeek,dayOfTheMonth,CalendarLength=35,months="January February March April May June July August September October November December".split(" "),monthLengths=[31,28,31,30,31,30,31,31,30,31,30,31];
function disableDate(a){document.getElementById(a).style.color="#c13328"}function getDateInfo(){var a=(new Date).toString();month=getMonthNum(a.substring(4,7));dayOfTheWeek=a.substring(0,3);for(var b=8;b<a.length;b++)if(" "===a.substring(b,b+1)){dayOfTheMonth=a.substring(8,b);break}}function getMonthNum(a){for(var b=0;b<months.length;b++)if(a===months[b].substring(0,3))return b;return 0}function getPreviousMonth(a){--a;return 0>a?a+12:a}function getNextMonth(a){a+=1;return 11<a?a-12:a}
function findFirstDay(a){for(var b,c=0;7>c;c++)if(days[c]===a){b=c+1-dayOfTheMonth%7;break}0>b&&(b+=7);return b}
function buildCalendar(){getDateInfo();var a=findFirstDay(dayOfTheWeek),b=0;document.getElementById("month").innerHTML=months[month];for(var c=a-1;0<=c;c--)document.getElementById("date"+(c+1)).innerHTML=monthLengths[getPreviousMonth(month)]-b,disableDate("date"+(c+1)),b++;b=1;for(c=a;c<monthLengths[month]+a;c++)document.getElementById("date"+(c+1)).innerHTML=b,b++;b=1;for(c=monthLengths[month]+a;c<CalendarLength;c++)document.getElementById("date"+(c+1)).innerHTML=b,disableDate("date"+(c+1)),b++}
function toggleMessengerDivisionExpansion(a){var b=document.getElementById("messenger-division"+a);"closed-messenger-division"===b.getAttribute("class")?(b.setAttribute("class","opened-messenger-division"),b=document.getElementById("drop-button"+a),b.setAttribute("class","opened-drop-button"),a=document.getElementById("content"+a),a.setAttribute("class","opened-messenger-content")):(b.setAttribute("class","closed-messenger-division"),b=document.getElementById("drop-button"+a),b.setAttribute("class",
"closed-drop-button"),a=document.getElementById("content"+a),a.setAttribute("class","closed-messenger-content"))}function toggleNotificationVisibility(a){a=document.getElementById(a);a.className="visible-notification-badge"===a.className?"invisible-notification-badge":"visible-notification-badge"}
function toggleComposer(a){a=document.getElementById(a);"invisible-message-composer"===a.getAttribute("class")?a.setAttribute("class","visible-message-composer"):a.setAttribute("class","invisible-message-composer")};
