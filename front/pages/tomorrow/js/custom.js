
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
var pageTitle = "Demain à thecamp!";


if(language == "EN"){
    var pageTitle = "Tomorrow @thecamp!";
}

$("#pageTitle").html(pageTitle);
$("#pageSubtitle1").html(pageSubtitle1);

// Cache of the template
var template = document.getElementById("template-list-item");
// Get the contents of the template
var templateHtml = template.innerHTML;
// Final HTML variable as empty string
var listHtml = "";

var today = new Date();
tomorrow = today.setDate(today.getDate()+1);
tomorrow = formatDate(tomorrow);


var eventArray = [];
var activitiesArray = [];

var nodata = true;

//EVENTS
var Airtable = require('airtable');
var base = new Airtable({ apiKey: 'key0LItg2WigNuuwe' }).base('apphjU1LF4u3C2wH8');

base('Planning').select({
    fields : ['Picture', 'Date start', "Title", "Expert", "Expert bio"],
    filterByFormula: "IS_SAME({Date start}, '" + tomorrow +"')",
    maxRecords: 4,
    sort: [
        {field: 'Date start', direction: 'asc'}
    ],
    }).eachPage(function page(records, fetchNextPage) {

        if(records[0] !== undefined && records[0] !== null){

            records.forEach(function(element, index) {

                    eventArray.push(element);
                    nodata = false;
                    
                });
        }

        fetchNextPage();

    }, function done(error) {

    });        
    
    console.log(eventArray);

//ACTIVITIES
var Airtable = require('airtable');
var base = new Airtable({ apiKey: 'key0LItg2WigNuuwe' }).base('appSuR2Fm8F98nmoZ');


base('Planning sessions').select({
    filterByFormula: "IS_SAME({Date 1}, '" + tomorrow +"' , 'day')",
    maxRecords: 4,
     fields : ['Session name' + " - " + language, 'Lieu', 'Image', 'Durée', 'Date 1', 'Language'],
    sort: [
        {field: 'Date 1', direction: 'asc'}
    ],
    }).eachPage(function page(records, fetchNextPage) {

        if(records[0] !== undefined && records[0] !== null){

            records.forEach(function(element, index) {
                    activitiesArray.push(element);
                    nodata = false;
                });
        }

        fetchNextPage();

    }, function done(error) {
       
       
    }); 











    
     var templateItem1 = templateHtml.replace(/{{img}}/g, "https://thecamp.fr/sites/default/files/images/basecamp.jpg")
                                                        .replace(/{{title}}/g, 'Showdown in Shanghai: Lessons from Western Companies in China')
                                                        .replace(/{{subtitle}}/g, 'with Srinivas K. Reddy')
                                                       .replace(/{{place}}/g, 'Salle de sport')
                                                       .replace(/{{index}}/g, '0')
                                                          .replace(/{{tag}}/g, 'PASS')
                                                        .replace(/{{time}}/g,  '19:00');
                                                
    var templateItem2 = templateHtml.replace(/{{img}}/g, "https://dl.airtable.com/r8OTtokQTuenSSHsTHkU_full_Voyage-sonore.jpg")
         .replace(/{{title}}/g, 'Voyage sonore')
         .replace(/{{tag}}/g, 'Experiences')
         .replace(/{{place}}/g, 'Amphi')
          .replace(/{{index}}/g, '1')
         .replace(/{{subtitle}}/g, 'Découvrir et éprouver les bienfaits d’une musique qui aspire à réunifier la tête, le corps et le coeur !')
         .replace(/{{time}}/g,  '13:45');

         var templateItem3 = templateHtml.replace(/{{img}}/g, "https://dl.airtable.com/r8OTtokQTuenSSHsTHkU_full_Voyage-sonore.jpg")
         .replace(/{{title}}/g, 'Voyage sonore')
         .replace(/{{tag}}/g, 'Experiences')
         .replace(/{{place}}/g, 'Amphi')
            .replace(/{{index}}/g, '2')
         .replace(/{{subtitle}}/g, 'Découvrir et éprouver les bienfaits d’une musique qui aspire à réunifier la tête, le corps et le coeur !')
         .replace(/{{time}}/g,  '13:45');

         var templateItem4 = templateHtml.replace(/{{img}}/g, "https://dl.airtable.com/r8OTtokQTuenSSHsTHkU_full_Voyage-sonore.jpg")
         .replace(/{{title}}/g, 'Voyage sonore')
         .replace(/{{tag}}/g, 'Experiences')
         .replace(/{{place}}/g, 'Amphi')
          .replace(/{{index}}/g, '3')
         .replace(/{{subtitle}}/g, 'Découvrir et éprouver les bienfaits d’une musique qui aspire à réunifier la tête, le corps et le coeur !')
         .replace(/{{time}}/g,  '13:45');

         var templateItem5 = templateHtml.replace(/{{img}}/g, "https://dl.airtable.com/r8OTtokQTuenSSHsTHkU_full_Voyage-sonore.jpg")
         .replace(/{{title}}/g, 'Voyage sonore')
         .replace(/{{tag}}/g, 'Experiences')
         .replace(/{{place}}/g, 'Amphi')
          .replace(/{{index}}/g, '4')
         .replace(/{{subtitle}}/g, 'Découvrir et éprouver les bienfaits d’une musique qui aspire à réunifier la tête, le corps et le coeur !')
         .replace(/{{time}}/g,  '13:45');

         var templateItem6 = templateHtml.replace(/{{img}}/g, "https://dl.airtable.com/r8OTtokQTuenSSHsTHkU_full_Voyage-sonore.jpg")
         .replace(/{{title}}/g, 'Voyage sonore')
         .replace(/{{tag}}/g, 'Experiences')
         .replace(/{{place}}/g, 'Amphi')
          .replace(/{{index}}/g, '5')
         .replace(/{{subtitle}}/g, 'Découvrir et éprouver les bienfaits d’une musique qui aspire à réunifier la tête, le corps et le coeur !')
         .replace(/{{time}}/g,  '13:45');
 
                        $("#list").append(templateItem1);
                        $("#list").append(templateItem2);
                        $("#list").append(templateItem3);
                        $("#list").append(templateItem4);
                        $("#list").append(templateItem5);
                        $("#list").append(templateItem6);
                        $("#list").append(templateItem2);
                        $("#list").append(templateItem2);
