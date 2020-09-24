<?php
class VideoGridItem {

    private $video, $largeMode;

    public function __construct($video, $largeMode) {
        $this->video = $video;
        $this->largeMode = $largeMode;
    }

    public function create() {
        $thumbnail = $this->createThumbnail();
        $details = $this->createDetails();
        $url = "watch.php?v=" . $this->video->getId();

        return "<a href='$url'>
                    <div class='videoGridItem'>
                        $thumbnail
                        $details
                    </div>
                </a>";
    }

    private function createThumbnail() {
        
        $thumbnail = $this->video->getThumbnail();
        $duration = $this->video->getDuration();

        if($thumbnail == null){
            $thumbnail = "assets/images/icons/no-video-available.png"; 
        }

        return "<div class='thumbnail'>
                    <img width: 420px; height: 236px; src='$thumbnail' style=''>
                    <div class='duration'>
                        <span>$duration</span>
                    </div>
                </div>";

    }

    private function createDetails() {
        $title = $this->video->getTitle();
        $name = htmlspecialchars(strip_tags($this->video->getUploadedByFullName()), ENT_NOQUOTES);
        $username = htmlspecialchars(strip_tags($this->video->getUploadedBy()));
        $views = $this->video->getViews();
        // useless haha ->$description = $this->createDescription();
        $timestamp = $this->video->getTimeStamp();

        return "<div class='details'>
                    <h3 class='title' style='
                        .title {
                            overflow: hidden;
                            text-overflow: ellipsis;
                            word-wrap: break-word;
                            word-break: break-all;
                        }
                        '>$title</h4>
                    <a href='profile.php?username=$username' class='username'>$name</a>
                    <div class='stats'>
                        <span class='viewCount'>$views views - </span>
                        <span class='timeStamp'>$timestamp</span>
                    </div>
                    $description
                </div>";
    }

    private function createDescription() {
        if(!$this->largeMode) {
            return "";
        }
        else {
            $description = $this->video->getDescription();
            $description = (strlen($description) > 10000) ? substr($description, 0, 10000) . "..." : $description;
            return "";
        }
    }

	private function createThumbnailSuggestions() {
        
        $thumbnail = $this->video->getThumbnail();
        $duration = $this->video->getDuration();

        return "<div class='suggestionThumbnail'>
                    <img width: 210px; height: 118px; src='$thumbnail'>
                    <div class='duration'>
                        <span>$duration</span>
                    </div>
                </div>";

    }

}
?>