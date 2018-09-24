

		function shuffle(array) {
		  var currentIndex = array.length, temporaryValue, randomIndex;

		  // While there remain elements to shuffle...
		  while (0 !== currentIndex) {

		    // Pick a remaining element...
		    randomIndex = Math.floor(Math.random() * currentIndex);
		    currentIndex -= 1;

		    // And swap it with the current element.
		    temporaryValue = array[currentIndex];
		    array[currentIndex] = array[randomIndex];
		    array[randomIndex] = temporaryValue;
		  }

		  return array;
		}


	function start() {
	  // 2. Initialize the JavaScript client library.
	  gapi.client.init({
	    'apiKey': 'AIzaSyBDfVIMW5-42qSEIDD4pSx6GK4TbxhDYww',
	  }).then(function() {
	    // 3. Initialize and make the API request.
	    return gapi.client.request({
	      'path': 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyBDfVIMW5-42qSEIDD4pSx6GK4TbxhDYww&channelId=UCjaHbgu02STSSoGAJx4DLrg&part=snippet,id&order=date&maxResults=50&type=video',
	    })
	  }).then(function(response) {

	    var url = "";

		if(response.result.items != undefined){

			var itemArray = shuffle(response.result.items);

			itemArray.forEach(function(item, index){
				if(item.id.videoId != undefined) {
					if (index == 0) {
				 		url = "https://www.youtube.com/embed/"+ item.id.videoId +"?&autoplay=1&controls=0&showinfo=0&loop=1&mute=1&playlist=";
					 }else{
					 		url += item.id.videoId+",";
					 }
				}
			});
			
		}	


	    $("#video-iframe").attr('src',url);

	  }, function(reason) {
	    console.log('Error: ' + reason.result.error.message);
	  });
	};
	// 1. Load the JavaScript client library.
	gapi.load('client', start);


