<?php
class VideoUploadData {

    public $videoDataArray, $title, $description, $tags, $privacy, $category, $uploadedBy;

    public function __construct($videoDataArray, $title, $description, $tags, $privacy, $category, $uploadedBy) {
        $this->videoDataArray = $videoDataArray;
        $this->title = $title;
        $this->description = $description;
		$this->tags = $tags;
        $this->privacy = $privacy;
        $this->category = $category;
        $this->uploadedBy = $uploadedBy;
    }

    public function updateDetails($con, $videoId) {
        $query = $con->prepare("UPDATE videos SET title=:title, description=:description, tags=:tags, privacy=:privacy,
                                    category=:category WHERE id=:videoId");
        $query->bindParam(":title", $this->title);
        $query->bindParam(":description", $this->description);
		$query->bindParam(":tags", $this->tags);
        $query->bindParam(":privacy", $this->privacy);
        $query->bindParam(":category", $this->category);
        $query->bindParam(":videoId", $videoId);

        return $query->execute();
    }

}
?>