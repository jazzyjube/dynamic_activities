

var Airtable = require('airtable');
var base = new Airtable({ apiKey: 'key0LItg2WigNuuwe' }).base('appZsBeHjfvPFN5yv');


var todayDate = new Date();
var dateOptions = { weekday: 'long'};

var todayDay = (todayDate.getDate()<10?'0':'') + todayDate.getDate();
var todayMonth = (todayDate.getMonth() + 1);
todayMonth = (todayMonth<10?'0':'') + todayMonth;

var todayName = todayDate.toLocaleDateString('fr-FR', dateOptions)+" "+todayDay+"."+todayMonth;

base('Planning').select({
    filterByFormula: "IS_SAME({Date}, TODAY(), 'day')",
    fields : ['Session name', 'Nom lieu'],
    sort: [
        {field: 'Nom lieu', direction: 'asc'}
    ],
    }).eachPage(function page(records, fetchNextPage) {

        if(records[0] !== undefined && records[0] !== null){

            var $dayInfo = $('#today-title');
            $dayInfo.text('Le Pass '+todayName);

            records.forEach(function(element) {

                $('.content').append('<p><b>'+(element.get("Nom lieu") === undefined?'':element.get("Nom lieu")+" : ")+'</b> '+(element.get("Session name") === undefined?'':element.get("Session name"))+'</p>');
           
            });
         }

        fetchNextPage();

    }, function done(error) {
        console.log(error);
    });        

