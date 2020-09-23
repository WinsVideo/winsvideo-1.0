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

    .video-js {
      width: 660;
      height: 640px;
      left: 0px;
      top: 0px;
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
class PlayerEmbed {

    private $con, $video, $userLoggedInObj;

    public function __construct($con, $video, $userLoggedInObj) {
        $this->con = $con;
        $this->video = $video;
        $this->userLoggedInObj = $userLoggedInObj;
    }

    public function create() {
        return $this->createPrimaryInfo() . $this->createSecondaryInfo();
    }

    public function titleCreate() {
        return $this->createGetTitle(); 
    }

    public function createGetTitle() {
        $title = $this->video->getTitle(); 
        $filePath = $this->video->getId(); 
        $thumbnail = $this->video->getThumbnail(); 
        $description = $this->video->getDescription(); 
        $uploadedBy = $this->video->getUploadedBy(); 
        $video = $this->video->getFilePath(); 
        $privacy = $this->video->getPrivacy();

        if($privacy == 0) {
            $title = "Gotem";
            $thumbnail = "assets/images/icons/no-video-available.png";  
            $uploadedBy = "No Username"; 
            $video = " "; 
        }

        if($title == null){
            $title = "No Title Available / The video might have been deleted."; 
        }

        if($thumbnail == null){
            $thumbnail = "assets/images/icons/no-video-available.png"; 
        }

        if($uploadedBy == null){
            $uploadedBy = "No Username"; 
        }

        if($description == null) {
            $description = "No description available"; 
        }

        return "    
        <video autoplay id='video videoPlayer2' tabindex='-1' class='video-js vjs-matrix vjs-theme-forest vjs-big-play-centered videoPlayer' poster='$thumbnail' controls controlslist='nodownload' style='flex: 1;' preload='auto' data-setup='{}'>
                    <source src='https://winsvideo.net/$video' type='video/mp4'>
         </video>


         <script>

            
            videojs('video', {
                playbackRates: [0.25, 0.5, 0.75, 1, 1.25, 1.5, 1.75, 2]
              });


            var video = document.getElementById('video');"; 
    }
} 
?>