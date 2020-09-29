
<style>
    #status span.status {
      display: none;
      font-weight: bold;
    }
    span.status.complete {
      color: green;
    }
    span.status.incomplete {
      color: red;
    }
    #status.complete span.status.complete {
      display: inline;
    }
    #status.incomplete span.status.incomplete {
      display: inline;
    }

    /* Change the border of the big play button. */
    .vjs-matrix .vjs-big-play-button {
      border-color: #fff;
      width: 2em;
      height: 2em;
      line-height: 2em;
    }

    .vjs-matrix .vjs-big-play-button:hover {
      background-color: rgba(0.5);
    }

    /* /* Change the color of various "bars". 
    .vjs-matrix .vjs-volume-level,
    .vjs-matrix .vjs-play-progress,
    .vjs-matrix .vjs-slider-bar {
      background: #00b300;
    } 

    */

    .video-js {
      height: 100%;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 110;
    }

    .vjs-matrix .vjs-load-progress {
      /* For IE8 we'll lighten the color */
      background: lighten(25%);
      /* Otherwise we'll rely on stacked opacities */
      background-color: rgba(0.5);
    }

    

    .vjs-matrix .vjs-control-bar,
    .vjs-matrix .vjs-big-play-button,
    .vjs-matrix .vjs-menu-button .vjs-menu-content {
  /* IE8 - has no alpha support */
  background-color: #000;
  /* Opacity: 1.0 = 100%, 0.0 = 0% */
  background-color: rgba(0.0);
}

    .vjs-matrix .vjs-big-play-button {
      background-color: #22b14c;
    }

    .vjs-matrix .vjs-menu-item-text {
      padding-top: 0.4em;
      padding-right: 0.4em;
      padding-bottom: 0.4em;
      padding-left: 0.4em;
    }

</style>

<script>


var noDownload = function() {
    var videoElem = document.getElementsByTagName("VIDEO");
    for (x in videoElem) {
        if (isNaN(x) == true) {
            continue;
        }
        videoElem[x].setAttribute("controlsList", "nodownload");
    }
}
noDownload();

</script>

<script>
    (function(window, videojs) {
      var player = window.player = videojs('video', {
        playbackRates: [0.5, 1, 1.5, 2, 4]
      });

    }(window, window.videojs));
  </script>

<?php
require_once("Video.php");

class VideoPlayer {

    private $video;

    public function __construct($video) {
        $this->video = $video;
    }

    public function create($autoPlay) {
        if($autoPlay) {
            $autoPlay = "autoplay";
        }
        else {
            $autoPlay = "";
        }
        $filePath = $this->video->getFilePath();

        $thumbnail = $this->video->getThumbnail();
        // 'playbackRates': [0.25, 0.5, 0.75, 1, 1.25, 1.5, 1.75, 2] 
        return "



		<video id='video' tabindex='-1' class='video-js vjs-matrix vjs-theme-forest vjs-big-play-centered videoPlayer' controls controlslist='nodownload' style='flex: 1;' preload='auto' data-setup='{}'>
                    <source src='https://videos.winsvideo.net/$filePath' type='video/mp4'>
         </video>


         <script>

            
            videojs('video', {
                playbackRates: [0.25, 0.5, 0.75, 1, 1.25, 1.5, 1.75, 2];
                
              });


            var video = document.getElementById('video');

            video.qualityLevels();

            video.hlsQualitySelector();

        var timeStarted = -1;
        var timePlayed = 0;
        var duration = 0;
        // If video metadata is laoded get duration
        if(video.readyState > 0)
          getDuration.call(video);
        //If metadata not loaded, use event to get it
        else
        {
          video.addEventListener('loadedmetadata', getDuration);
        }
        // remember time user started the video
        function videoStartedPlaying() {
          timeStarted = new Date().getTime()/1000;
        }
        function videoStoppedPlaying(event) {
          // Start time less then zero means stop event was fired vidout start event
          if(timeStarted>0) {
            var playedFor = new Date().getTime()/1000 - timeStarted;
            timeStarted = -1;
            // add the new ammount of seconds played
            timePlayed+=playedFor;
          }
          document.getElementById('played').innerHTML = Math.round(timePlayed)+'';
          // Count as complete only if end of video was reached
          if(timePlayed>=duration && event.type=='ended') {
            document.getElementById('status').className='complete';
          }
        }

        function getDuration() {
          duration = video.duration;
          document.getElementById('duration').appendChild(new Text(Math.round(duration)+''));
          console.log('Duration: ', duration);
        }

        video.addEventListener('play', videoStartedPlaying);
        video.addEventListener('playing', videoStartedPlaying);

        video.addEventListener('ended', videoStoppedPlaying);
        video.addEventListener('pause', videoStoppedPlaying);
        </script>


         <div id='status' class='incomplete' style='display: none;'>
            <span>Play status: </span>
            <span class='status complete'>COMPLETE</span>
            <span class='status incomplete'>INCOMPLETE</span>
            <br />
        </div>
        <div style='display: none;'>
            <span id='played'>0</span> seconds out of 
            <span id='duration'></span> seconds. (only updates when the video pauses)
        </div>
        "
        ; 
    }

}
?>
