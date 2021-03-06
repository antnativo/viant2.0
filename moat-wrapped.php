<!DOCTYPE html>
<html>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h2>Dynamic Ad Playback from JSON Playlist</h2>
				<hr>
			</div>
		</div>
		<div style="margin: 0 auto; width: 1200px;">
			<div style="width: 830px; padding: 15px; float: left; border-right:1px solid; height: 500px">
				<h2>This is A Sweet Article</h2>
				<p>Etiam porta sem malesuada magna mollis euismod. Aenean lacinia bibendum nulla sed consectetur. Aenean lacinia bibendum nulla sed consectetur. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Maecenas sed diam eget risus varius blandit sit amet non magna. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

				<p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nulla vitae elit libero, a pharetra augue. Donec sed odio dui.</p>

				<p>Etiam porta sem malesuada magna mollis euismod. Aenean lacinia bibendum nulla sed consectetur. Aenean lacinia bibendum nulla sed consectetur. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Maecenas sed diam eget risus varius blandit sit amet non magna. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

				<p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nulla vitae elit libero, a pharetra augue. Donec sed odio dui.</p>

				<p>Etiam porta sem malesuada magna mollis euismod. Aenean lacinia bibendum nulla sed consectetur. Aenean lacinia bibendum nulla sed consectetur. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Maecenas sed diam eget risus varius blandit sit amet non magna. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

				<p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nulla vitae elit libero, a pharetra augue. Donec sed odio dui.</p>
			</div>
			<div class="row" style="width: 320px; float: left; display: block; margin-left: 15px;">
				<img src="https://thevideoink.com/wp-content/uploads/2017/05/0HElsOBJFvK7JBPem.png" width="100%">
				<div class="col-md-6">	
					<div id="jwplayer_video_container"></div>			
				</div>
			</div>
		</div>	
	</div>
</body>
<script type="text/javascript" src="https://z.moatads.com/jwplayerplugin0938452/moatplugin.js"></script>
<script type="text/javascript" src="https://content.jwplatform.com/libraries/nYLmRo1U.js"></script>
<script>

    var tagsToFire = {
        threeSecond: "https://x.vindicosuite.com/dserve/t=d;l=557921;c=1065424;b=4819688;ad=COGGIhC66g0YoDMgASgEMMeUATiV1wFAzYIUSLbcGFDQg0FY6JWmAmDIgBFosq4ncAJ4AYgBAJABAZgBAaIBEzE4NTEzMDMzNzkxMDY0Nzk5NTOyAQVWSURFT7gBAcABAMgBANABANgBAOgB-P_s-5As;a=278600;ts=TIMESTAMP",
        fifteenSecond: "https://x.vindicosuite.com/dserve/t=d;l=557922;c=1065425;b=4819687;ad=COKGIhC66g0YoDMgASgEMMeUATiV1wFAzoIUSMLcGFDRg0FY55WmAmDJgBFosq4ncAJ4AYgBAJABAZgBAaIBEzYyNzk5MzQ1OTcxOTE3NTkwNjGyAQVWSURFT7gBAcABAMgBANABANgBAOgBlZfs-5As;a=278601;ts=TIMESTAMP",
        thirtySecond: "https://x.vindicosuite.com/dserve/t=d;l=557923;c=1065426;b=4819689;ad=COOGIhC66g0YoDMgASgEMMeUATiV1wFAz4IUSM7cGFDSg0FY6ZWmAmDKgBFosq4ncAJ4AYgBAJABAZgBAaIBEzQwNDYzOTA5OTkxNzY3NjAyODayAQVWSURFT7gBAcABAMgBANABANgBAOgBi-ns-5As;a=278602;ts=TIMESTAMP",
    }

    function fireTag(tag, id) {
        var tagToFire = tag + ";jwmediaid=" + id;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {}
        };
        xhttp.open("GET", tagToFire, true);
        xhttp.send();
    }

    function buildJW(jwplayer, playlistUrl) {
        var playerInstance = jwplayer("jwplayer_video_container");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var playerResponseObject = JSON.parse(this.responseText);
                var playlistLength = playerResponseObject.playlist.length;
                var randInt = Math.floor(Math.random() * playlistLength);
                var file = playerResponseObject.playlist[randInt].sources[0].file;
                var tags = playerResponseObject.playlist[randInt].tags;
                var mediaid = playerResponseObject.playlist[randInt].mediaid;
                var playlistTags = tags.split(",");

                for (var i = 0; i < playlistTags.length; i++) {
                    var tag = playlistTags[i];
                    
                    if (playerResponseObject.hasOwnProperty(tag)) {

                        var dfpTag = playerResponseObject[tag]; 

                        playerInstance.setup({
                            playlist: "https://cdn.jwplayer.com/v2/media/" + mediaid,
                            advertising: {
                                client: "googima",
                                tag: dfpTag,
                                vpaidcontrols: true
                            },
                            mute: true,
                            autostart: false
                        });
                        i = playlistTags.length;
                        var threeSec = false;
                        var fifteenSec = false;
                        var thirtySec = false;

                        playerInstance.on("time", function () {
                            var currentPosition = playerInstance.getPosition()
                            if (Math.floor(currentPosition) >= 3 && !threeSec) {
                                fireTag(
                                    tagsToFire.threeSecond,
                                    mediaid);
                                threeSec = true;
                            };
                            if (Math.floor(currentPosition) >= 15 && !fifteenSec) {
                                fireTag(
                                    tagsToFire.fifteenSecond,
                                    mediaid);
                                fifteenSec = true;
                            };
                            if (Math.floor(currentPosition) >= 30 && !thirtySec) {
                                fireTag(
                                    tagsToFire.thirtySecond,
                                    mediaid);
                                thirtySec = true;
                            };
                        });
                        playerInstance.on("adImpression", function (event) {
                            console.log("fired!");
                            currentAdId = moatjw.add({
                                partnerCode:"viantjwplayer764158861377",
                                player:this,
                                adImpressionEvent: event
                            });
                            console.log(currentAdId);
                        });
                    }
                }
            }
        };
        xmlhttp.open("GET", playlistUrl, true);
        xmlhttp.send();
    }
    buildJW(jwplayer, "https://cdn.jwplayer.com/v2/playlists/b53dbsV1");
</script>
</html>