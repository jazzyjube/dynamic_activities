
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
var pageTitle = "Expériences<br> à thecamp";
var pageSubtitle1 = "Ralentir, se connecter, explorer...";
var pageSubtitle2 = "Sans inscription. Dans la limite des places disponibles.<br>";
var pageSubtitle3 = "Merci de vous présenter 5 minutes en avance.<br>";
var day1 = "Lundi";
var day2 = "Mardi";
var day3 = "Mercredi";
var day4 = "Jeudi";
var day5 = "Vendredi";

if(language == "EN"){
    var pageTitle = "Experiences<br> @thecamp";
    var pageSubtitle1 = "Slowing down, connecting with each other, exploring...";
    var pageSubtitle2 = "No registration. Subject to place availability.<br>";
    var pageSubtitle3 = "Please present yourself 5 minutes before the activity starts.<br>";
    var day1 = "Monday";
    var day2 = "Tuesday";
    var day3 = "Wednesday";
    var day4 = "Thursday";
    var day5 = "Friday";
}

$("#pageTitle").html(pageTitle);
$("#pageSubtitle1").html(pageSubtitle1);
$("#pageSubtitle2").html(pageSubtitle2);
$("#pageSubtitle3").html(pageSubtitle3);


var Airtable = require('airtable');
var base = new Airtable({ apiKey: 'key0LItg2WigNuuwe' }).base('appSuR2Fm8F98nmoZ');


var curr = new Date(); 

//If saturday, switch to next week
if (curr.getDay() == 6) {
    curr.setDate(curr.getDate() + 1)
}

        
var first = curr.getDate() - curr.getDay();

var firstday = (new Date(curr.setDate(first+1))).toString();

var dateArray = [];

for (var i = 0; i < 6; i++) {
    var next = new Date(curr.getTime());

    next.setDate(next.getDate() + i);

    dateArray.push(formatDate(next.toString()));
}



base('Planning sessions').select({
    filterByFormula: "IS_SAME({Date 1}, '"+dateArray[0]+"', 'day')",
    fields : ['Session name' + " - " + language, 'Lieu', 'Image', 'Short description' + " - " + language, 'Durée', 'Date 1', 'Language'],
    sort: [
        {field: 'Date 1', direction: 'asc'}
    ],
    }).eachPage(function page(records, fetchNextPage) {


        if(records[0] !== undefined && records[0] !== null){


            //monday
            var $dayInfo = $('.monday');
            $dayInfo.append('<h3 class="bold">'+day1+'</h3>');

            records.forEach(function(element) {

                //Do not display if session name is not available 
                if(element.get("Session name"+ " - " + language) != undefined){

                    var image = element.get("Image");
                    image = image[0].url;

                    var dateClean = new Date(element.get("Date 1"));
                    var cleanHours = dateClean.getHours()+"h"+(dateClean.getMinutes()<10?'0':'') + dateClean.getMinutes();

                    if (language == "EN"){
                        cleanHours = tConvert(dateClean.getHours()+":"+(dateClean.getMinutes()<10?'0':'') + dateClean.getMinutes());
                    }

                    $('.monday').append('<div class="row"> <div class="col-md-7"> <p> '+(element.get("Session name"+ " - " + language) === undefined?'':element.get("Session name"+ " - " + language))+(element.get("Language") == "EN" ?' ('+element.get("Language")+')':'')+(element.get("Durée") === undefined?'':' - '+element.get("Durée"))+' </p> </div> <div class="col-md-2"> <p class="bold"> '+(cleanHours === undefined?'':cleanHours)+' </p> </div> <div class="col-md-3"> <p class="bold"> '+(element.get("Lieu") === undefined?'':element.get("Lieu"))+'</p> </div> </div>');
                    $(".carousel-inner").append('<div class="item" style="background-image: url('+(image === undefined?'':image)+')"><div class="carousel-caption"><h3>'+(element.get("Session name"+ " - " + language) === undefined?'':element.get("Session name"+ " - " + language))+'</h3><p>'+(element.get("Short description" + " - " + language) === undefined?'':element.get("Short description" + " - " + language))+'</p></div></div>');        
                }
                   
            });
            $('.carousel-inner .item').first().addClass("active");
        }


        fetchNextPage();

    }, function done(error) {
        console.log(error);
    });        



base('Planning sessions').select({
    filterByFormula: "IS_SAME({Date 1}, '"+dateArray[1]+"', 'day')", 
    fields : ['Session name' + " - " + language, 'Lieu', 'Image', 'Short description' + " - " + language, 'Durée', 'Date 1', 'Language'],
    sort: [
        {field: 'Date 1', direction: 'asc'}
    ],
    }).eachPage(function page(records, fetchNextPage) {


        if(records[0] !== undefined && records[0] !== null){

            //tuesday
            var $dayInfo = $('.tuesday');
            $dayInfo.append('<h3 class="bold">'+day2+'</h3>');


            records.forEach(function(element) {

                //Do not display if session name is not available 
                if(element.get("Session name"+ " - " + language) != undefined){

                    var image = element.get("Image");
                    image = image[0].url;

                    var dateClean = new Date(element.get("Date 1"));
                    var cleanHours = dateClean.getHours()+"h"+(dateClean.getMinutes()<10?'0':'') + dateClean.getMinutes();

                    if (language == "EN"){
                        cleanHours = tConvert(dateClean.getHours()+":"+(dateClean.getMinutes()<10?'0':'') + dateClean.getMinutes());
                    }

                    $('.tuesday').append('<div class="row"> <div class="col-md-7"> <p> '+(element.get("Session name"+ " - " + language) === undefined?'':element.get("Session name"+ " - " + language))+(element.get("Language") == "EN" ?' ('+element.get("Language")+')':'')+(element.get("Durée") === undefined?'':' - '+element.get("Durée"))+' </p> </div> <div class="col-md-2"> <p class="bold"> '+(cleanHours === undefined?'':cleanHours)+' </p> </div> <div class="col-md-3"> <p class="bold"> '+(element.get("Lieu") === undefined?'':element.get("Lieu"))+'</p> </div> </div>');
                    $(".carousel-inner").append('<div class="item" style="background-image: url('+(image === undefined?'':image)+')"><div class="carousel-caption"><h3>'+(element.get("Session name"+ " - " + language) === undefined?'':element.get("Session name"+ " - " + language))+'</h3><p>'+(element.get("Short description" + " - " + language) === undefined?'':element.get("Short description" + " - " + language))+'</p></div></div>');
                }
            });
            $('.carousel-inner .item').first().addClass("active");
        }


        fetchNextPage();

    }, function done(error) {
        console.log(error);
    });        



base('Planning sessions').select({
    filterByFormula: "IS_SAME({Date 1}, '"+dateArray[2]+"', 'day')",
    fields : ['Session name' + " - " + language, 'Lieu', 'Image', 'Short description' + " - " + language, 'Durée', 'Date 1', 'Language'],
    sort: [
        {field: 'Date 1', direction: 'asc'}
    ],
    }).eachPage(function page(records, fetchNextPage) {


        if(records[0] !== undefined && records[0] !== null){

            //wednesday
            var $dayInfo = $('.wednesday');
            $dayInfo.append('<h3 class="bold">'+day3+'</h3>');

            records.forEach(function(element) {

                //Do not display if session name is not available 
                if(element.get("Session name"+ " - " + language) != undefined){

                    var image = element.get("Image");
                    image = image[0].url;

                    var dateClean = new Date(element.get("Date 1"));
                    var cleanHours = dateClean.getHours()+"h"+(dateClean.getMinutes()<10?'0':'') + dateClean.getMinutes();

                    if (language == "EN"){
                        cleanHours = tConvert(dateClean.getHours()+":"+(dateClean.getMinutes()<10?'0':'') + dateClean.getMinutes());
                    }

                    $('.wednesday').append('<div class="row"> <div class="col-md-7"> <p> '+(element.get("Session name"+ " - " + language) === undefined?'':element.get("Session name"+ " - " + language))+(element.get("Language") == "EN" ?' ('+element.get("Language")+')':'')+(element.get("Durée") === undefined?'':' - '+element.get("Durée"))+' </p> </div> <div class="col-md-2"> <p class="bold"> '+(cleanHours === undefined?'':cleanHours)+' </p> </div> <div class="col-md-3"> <p class="bold"> '+(element.get("Lieu") === undefined?'':element.get("Lieu"))+'</p> </div> </div>');
                    $(".carousel-inner").append('<div class="item" style="background-image: url('+(image === undefined?'':image)+')"><div class="carousel-caption"><h3>'+(element.get("Session name"+ " - " + language) === undefined?'':element.get("Session name"+ " - " + language))+'</h3><p>'+(element.get("Short description" + " - " + language) === undefined?'':element.get("Short description" + " - " + language))+'</p></div></div>');
                }
            });
            $('.carousel-inner .item').first().addClass("active");
        }


        fetchNextPage();

    }, function done(error) {
        console.log(error);
    });        




base('Planning sessions').select({
    filterByFormula: "IS_SAME({Date 1}, '"+dateArray[3]+"', 'day')",
    fields : ['Session name' + " - " + language, 'Lieu', 'Image', 'Short description' + " - " + language, 'Durée', 'Date 1', 'Language'],
    sort: [
        {field: 'Date 1', direction: 'asc'}
    ],
    }).eachPage(function page(records, fetchNextPage) {


        if(records[0] !== undefined && records[0] !== null){

            //thursday
            var $dayInfo = $('.thursday');
            $dayInfo.append('<h3 class="bold">'+day4+'</h3>');


            records.forEach(function(element) {

                //Do not display if session name is not available 
                if(element.get("Session name"+ " - " + language) != undefined){

                    var image = element.get("Image");
                    image = image[0].url;

                    var dateClean = new Date(element.get("Date 1"));
                    var cleanHours = dateClean.getHours()+"h"+(dateClean.getMinutes()<10?'0':'') + dateClean.getMinutes();

                    if (language == "EN"){
                        cleanHours = tConvert(dateClean.getHours()+":"+(dateClean.getMinutes()<10?'0':'') + dateClean.getMinutes());
                    }

                    $('.thursday').append('<div class="row"> <div class="col-md-7"> <p> '+(element.get("Session name"+ " - " + language) === undefined?'':element.get("Session name"+ " - " + language))+(element.get("Language") == "EN" ?' ('+element.get("Language")+')':'')+(element.get("Durée") === undefined?'':' - '+element.get("Durée"))+' </p> </div> <div class="col-md-2"> <p class="bold"> '+(cleanHours === undefined?'':cleanHours)+' </p> </div> <div class="col-md-3"> <p class="bold"> '+(element.get("Lieu") === undefined?'':element.get("Lieu"))+'</p> </div> </div>');
                    $(".carousel-inner").append('<div class="item" style="background-image: url('+(image === undefined?'':image)+')"><div class="carousel-caption"><h3>'+(element.get("Session name"+ " - " + language) === undefined?'':element.get("Session name"+ " - " + language))+'</h3><p>'+(element.get("Short description" + " - " + language) === undefined?'':element.get("Short description" + " - " + language))+'</p></div></div>');
                
                }
            });
            $('.carousel-inner .item').first().addClass("active");
        }


        fetchNextPage();

    }, function done(error) {
        console.log(error);
    });        




base('Planning sessions').select({
    filterByFormula: "IS_SAME({Date 1}, '"+dateArray[4]+"', 'day')",
    fields : ['Session name' + " - " + language, 'Lieu', 'Image', 'Short description' + " - " + language, 'Durée', 'Date 1', 'Language'],
    sort: [
        {field: 'Date 1', direction: 'asc'}
    ],  
    }).eachPage(function page(records, fetchNextPage) {


        if(records[0] !== undefined && records[0] !== null){

            //friday
            var $dayInfo = $('.friday');
            $dayInfo.append('<h3 class="bold">'+day5+'</h3>');


            records.forEach(function(element) {

                //Do not display if session name is not available 
                if(element.get("Session name"+ " - " + language) != undefined){

                    var image = element.get("Image");
                    image = image[0].url;

                    var dateClean = new Date(element.get("Date 1"));
                    var cleanHours = dateClean.getHours()+"h"+(dateClean.getMinutes()<10?'0':'') + dateClean.getMinutes();

                    if (language == "EN"){
                        cleanHours = tConvert(dateClean.getHours()+":"+(dateClean.getMinutes()<10?'0':'') + dateClean.getMinutes());
                    }

                    $('.friday').append('<div class="row"> <div class="col-md-7"> <p> '+(element.get("Session name"+ " - " + language) === undefined?'':element.get("Session name"+ " - " + language))+(element.get("Language") == "EN" ?' ('+element.get("Language")+')':'')+(element.get("Durée") === undefined?'':' - '+element.get("Durée"))+' </p> </div> <div class="col-md-2"> <p class="bold"> '+(cleanHours === undefined?'':cleanHours)+' </p> </div> <div class="col-md-3"> <p class="bold"> '+(element.get("Lieu") === undefined?'':element.get("Lieu"))+'</p> </div> </div>');
                    $(".carousel-inner").append('<div class="item" style="background-image: url('+(image === undefined?'':image)+')"><div class="carousel-caption"><h3>'+(element.get("Session name"+ " - " + language) === undefined?'':element.get("Session name"+ " - " + language))+'</h3><p>'+(element.get("Short description" + " - " + language) === undefined?'':element.get("Short description" + " - " + language))+'</p></div></div>');
                }
            });

             $('.carousel-inner .item').first().addClass("active");
        }


        fetchNextPage();

    }, function done(error) {
        

        console.log(error);
    });        


 $('.carousel').carousel({
      interval: 1000 * 5
    });


