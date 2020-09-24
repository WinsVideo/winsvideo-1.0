<?php
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
        return "

        <div class='videocontent' style='width: 100%; max-width: 640px'>
		<video autoplay id='video' class='video-js vjs-theme-forest vjs-4-3 vjs-big-play-centered videoPlayer' controls data-setup='{}' height = '720' style='flex: 1; border-radius: .5rem;'>
                    <source src='$filePath' type='video/mp4'>
        
                </video>"; 
    }

}
?>
