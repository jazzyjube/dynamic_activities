
//utility functions

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}


function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}

function tConvert (time) {
   // Check correct time format and split into components
   time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

    if (time.length > 1) { // If time format correct
      time = time.slice (1);  // Remove full string match value
      time[5] = +time[0] < 12 ? 'AM' : 'PM'; // Set AM/PM
      time[0] = +time[0] % 12 || 12; // Adjust hours
    }
    return time.join (''); // return adjusted time or original string
}


var language = getParameterByName('lang');


if(language != undefined) {
    language = language.toUpperCase();
}

//switch to fr if lang parameter is not defined
if(language == undefined || (language != "FR" && language != "EN")) {
    language = "FR";
}

// Multilingual texts
var pageTitle = "Événements<br> à thecamp";
var pageSubtitle1 = "Des rassemblements festifs et collaboratifs pour partager des connaissances, des valeurs, et des initiatives inspirantes.";


if(language == "EN"){
    var pageTitle = "Events @thecamp";
    var pageSubtitle1 = "Festive, collaborative events to share knowledge, values and inspiring initiatives.";
}

$("#pageTitle").html(pageTitle);
$("#pageSubtitle1").html(pageSubtitle1);

// Cache of the template
var template = document.getElementById("template-list-item");
// Get the contents of the template
var templateHtml = template.innerHTML;
// Final HTML variable as empty string
var listHtml = "";


var Airtable = require('airtable');
var base = new Airtable({ apiKey: 'key0LItg2WigNuuwe' }).base('apphjU1LF4u3C2wH8');


base('Planning').select({
    fields : ['Event picture', 'Date start'],
    filterByFormula: "IS_AFTER({Date start}, TODAY())",
    maxRecords: 3,
    sort: [
        {field: 'Date start', direction: 'asc'}
    ],
    }).eachPage(function page(records, fetchNextPage) {


        if(records[0] !== undefined && records[0] !== null){

            records.forEach(function(element, index) {

                    var image = element.get("Event picture");
                  
                    if(image != undefined){
                        image = image[0].url;
                        var templateItem = templateHtml.replace(/{{url}}/g, image)
                                                        .replace(/{{id}}/g, 'col-event-'+index);
                        $("#list").append(templateItem);
                    }

                });
        }

        fetchNextPage();

    }, function done(error) {
        console.log(error);
    });        
