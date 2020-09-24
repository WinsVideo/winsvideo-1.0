<?php
class SuggestionGridItem {

    private $video, $largeMode;

    public function __construct($video, $largeMode) {
        $this->video = $video;
        $this->largeMode = $largeMode;
    }

    public function create() {
        $thumbnail = $this->createThumbnail();
        $details = $this->createDetails();
        $url = "watch.php?id=" . $this->video->getId();

        return "<a href='$url'>
						<div class='column'>
                    <div class='suggestionGridItem'>
                        $thumbnail
						<br>
                        $details
                    </div>
						</div>
                </a>";
    }

    private function createThumbnail() {
        
        $thumbnail = $this->video->getThumbnail();
        $duration = $this->video->getDuration();

        return "<div class='thumbnail'>
                    <img width: 355px; height: 200px; src='$thumbnail'>
                    <div class='duration'>
                        <span>$duration</span>
                    </div>
                </div>";

    }

    private function createDetails() {
        $title = $this->video->getTitle();
        $name = $this->video->getUploadedBy();
        $views = $this->video->getViews();
        $description = $this->createDescription();
        $timestamp = $this->video->getTimeStamp();

        return "<div class='details'>
                    <h3 class='title'>$title</h3>
                    <span class='username'>$name</span>
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
            return "<span class='description'>$description</span>";
        }
    }

}
?>