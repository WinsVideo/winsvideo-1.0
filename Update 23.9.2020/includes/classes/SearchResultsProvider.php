<?php
class SearchResultsProvider {

    private $con, $userLoggedInObj;

    public function __construct($con, $userLoggedInObj) {
        $this->con = $con;
        $this->userLoggedInObj = $userLoggedInObj;
    }

    public function getVideos($term, $orderBy) {
        $query = $this->con->prepare("SELECT * FROM videos WHERE title LIKE CONCAT('%', :term, '%')
                                        OR uploadedBy LIKE CONCAT('%', :term, '%') OR tags LIKE CONCAT('%', :term, '%') ORDER BY $orderBy DESC");
        $query->bindParam(":term", $term);
        $query->execute();

        $videos = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $video = new Video($this->con, $row, $this->userLoggedInObj);
            array_push($videos, $video);
        }

        return $videos;

    }	

    /*

    public function getChannels($term, $orderBy) {
        $query = $this->con->prepare("SELECT * FROM users WHERE username LIKE CONCAT('%', :term, '%')
                                        OR firstName LIKE CONCAT('%', :term, '%') OR lastName LIKE CONCAT('%', :term, '%') ORDER BY $orderBy DESC");
        $query->bindParam(":term", $term);
        $query->execute();

        $channels = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $username = $row['username'];

            echo $username; 
        }

        return $channels;

    } 

    */  

}
?>