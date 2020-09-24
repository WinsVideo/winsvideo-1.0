<?php

header('Content-Type: text/html; charset=utf-8'); 


class VideoProcessor {

    private $con;
    private $sizeLimit = 100000000;
    private $allowedTypes = array("mp4", "flv", "webm", "mkv", "vob", "ogv", "ogg", "avi", "wmv", "mov", "mpeg", "mpg", "mtc");
    
    // *** UNCOMMENT ONE OF THESE DEPENDING ON YOUR COMPUTER ***
    // private $ffmpegPath = "ffmpeg/mac/regular-xampp/ffmpeg"; // *** MAC (USING REGULAR XAMPP) ***
    //private $ffmpegPath = "ffmpeg/mac/xampp-VM/ffmpeg"; // *** MAC (USING XAMPP VM) ***
     // private $ffmpegPath = "ffmpeg/linux/ffmpeg"; // *** LINUX ***
     private $ffmpegPath; //  *** WINDOWS (UNCOMMENT CODE IN CONSTRUCTOR) ***

    // *** ALSO UNCOMMENT ONE OF THESE DEPENDING ON YOUR COMPUTER ***
    // private $ffprobePath = "ffmpeg/mac/regular-xampp/ffprobe"; // *** MAC (USING REGULAR XAMPP) ***
    //private $ffprobePath = "ffmpeg/mac/xampp-VM/ffprobe"; // *** MAC (USING XAMPP VM) ***
     // private $ffprobePath = "ffmpeg/linux/ffprobe"; // *** LINUX ***
     private $ffprobePath; //  *** WINDOWS (UNCOMMENT CODE IN CONSTRUCTOR) ***
    // updates: mtc added. 

    public function __construct($con) {
        $this->con = $con;

        // *** UNCOMMENT IF USING WINDOWS *** 
        $this->ffmpegPath = realpath("ffmpeg/windows/ffmpeg.exe");
        $this->ffprobePath = realpath("ffmpeg/windows/ffprobe.exe");
    }

    public function upload($videoUploadData) {

        $targetDir = "uploads/videos/";
        $videoData = $videoUploadData->videoDataArray;

        $tempFilePath = $targetDir . uniqid() . basename($videoData["name"]);
        $tempFilePath = str_replace(" ", "_", $tempFilePath);

        $isValidData = $this->processData($videoData, $tempFilePath);

        if(!$isValidData) {
            return false;
        }

        if(move_uploaded_file($videoData["tmp_name"], $tempFilePath)) {
            $finalFilePath = $targetDir . uniqid() . ".mp4";

            if(!$this->insertVideoData($videoUploadData, $finalFilePath)) {
                echo "<div class='column'>
                        <h2>Upload unsuccessful</h2>
                        <p>Error: Insert query failed\n</p>
                      </div>";
                return false;
            }

            if(!$this->convertVideoToMp4($tempFilePath, $finalFilePath)) {
                echo "<div class='column'>
                        <h2>Upload unsuccessful</h2>
                        <p>Error: Upload failed\n</p>
                      </div>";
                return false;
            }

            if(!$this->deleteFile($tempFilePath)) {
                echo "<div class='column'>
                        <h2>Upload unsuccessful</h2>
                        <p>Error: Upload failed\n</p>
                      </div>";
                return false;
            }

            if(!$this->generateThumbnails($finalFilePath)) {
                echo "<div class='column'>
                        <h2>Upload unsuccessful</h2>
                        <p>Upload failed - could not generate thumbnails\n</p>
                      </div>";
                return false;
            }

            return true;

        }
    }

    private function processData($videoData, $filePath) {
        $videoType = pathInfo($filePath, PATHINFO_EXTENSION);
        
        if(!$this->isValidSize($videoData)) {
            echo "<div class='column'>
                    <h2>Upload unsuccessful</h2>
                    <p>Error: File too large. Can't be more than " . $this->sizeLimit . " bytes </p>
                  </div>";
            return false;
        }
        else if(!$this->isValidType($videoType)) {
            echo "
              <div class='column'>
                <h2>Upload unsuccessful</h2>
                <p>Error: Invalid file type</p>
              </div>";
          
            return false;
        }
        else if($this->hasError($videoData)) {
            echo "<div class='column'>
                    <h2>Upload unsuccessful</h2>
                    <p>Error: " . $videoData["error"] . "</p>
                  </div>";
            return false;
        }

        return true;
    }

    private function isValidSize($data) {
        return $data["size"] <= $this->sizeLimit;
    }

    private function isValidType($type) {
        $lowercased = strtolower($type);
        return in_array($lowercased, $this->allowedTypes);
    }
    
    private function hasError($data) {
        return $data["error"] != 0;
    }

    private function insertVideoData($uploadData, $filePath) {
        $uniqid = uniqid(); 

        $query = $this->con->prepare("INSERT INTO videos(title, uploadedBy, description, tags, privacy, category, filePath, url)
                                        VALUES(:title, :uploadedBy, :description, :tags, :privacy, :category, :filePath, '$uniqid')");

        if($uploadData->uploadedBy == null) {
            echo "<div class='column'>
                    <h2>Upload unsuccessful</h2>
                    <p>Error: You are not signed in.</p>
                  </div>"; 
            return false;
        }

        //sanitizing input

        $query->bindParam(":title", htmlspecialchars(strip_tags($uploadData->title)));
        $query->bindParam(":uploadedBy", htmlspecialchars(strip_tags($uploadData->uploadedBy)));
        $query->bindParam(":description", htmlspecialchars(strip_tags($uploadData->description)));
		$query->bindParam(":tags", htmlspecialchars(strip_tags($uploadData->tags)));
        $query->bindParam(":privacy", htmlspecialchars(strip_tags($uploadData->privacy)));
        $query->bindParam(":category", htmlspecialchars(strip_tags($uploadData->category)));
        $query->bindParam(":filePath", $filePath);
	

        return $query->execute();
    }

    public function convertVideoToMp4($tempFilePath, $finalFilePath) {

         // ffmpegPath -i $tempFilePath -c:v libx264 -crf 18 -preset ultrafast $finalFilePath 2>&1

        // $this->ffmpegPath -i $tempFilePath -vcodec h264 -acodec mp3 -preset ultrafast $finalFilePath 2>&1

        // this command thingy is gonna compress the video lol. to like, one digit mb or something like that 

        // imma try it
        $cmd = "$this->ffmpegPath -i $tempFilePath -vcodec h264 -acodec aac -preset ultrafast $finalFilePath 2>&1";
        $outputLog = array();
        exec($cmd, $outputLog, $returnCode);
        
        if($returnCode != 0) {
            //Command failed
            foreach($outputLog as $line) {
                echo $line . "<br>";
            }
            return false;
        }

        return true;
    }

    private function deleteFile($filePath) {
        if(!unlink($filePath)) {
            echo "Could not delete file\n";
            return false;
        }

        return true;
    }

    public function generateThumbnails($filePath) {

        $thumbnailSize = "210x118";
        $numThumbnails = 3;
        $pathToThumbnail = "uploads/videos/thumbnails";
        
        $duration = $this->getVideoDuration($filePath);

        $videoId = $this->con->lastInsertId();
        $this->updateDuration($duration, $videoId);

        for($num = 1; $num <= $numThumbnails; $num++) {
            $imageName = uniqid() . ".jpg";
            $interval = ($duration * 0.8) / $numThumbnails * $num;
            $fullThumbnailPath = "$pathToThumbnail/$videoId-$imageName";

            $cmd = "$this->ffmpegPath -i $filePath -ss $interval -s $thumbnailSize -vframes 1 $fullThumbnailPath 2>&1";

            $outputLog = array();
            exec($cmd, $outputLog, $returnCode);
            
            if($returnCode != 0) {
                //Command failed
                foreach($outputLog as $line) {
                    echo $line . "<br>";
                }
            }

            $query = $this->con->prepare("INSERT INTO thumbnails(videoId, filePath, selected)
                                        VALUES(:videoId, :filePath, :selected)");
            $query->bindParam(":videoId", $videoId);
            $query->bindParam(":filePath", $fullThumbnailPath);
            $query->bindParam(":selected", $selected);

            $selected = $num == 1 ? 1 : 0;

            $success = $query->execute();

            if(!$success) {
                echo "Error inserting thumbail\n";
                return false;
            }
        }

        return true;
    }

    private function getVideoDuration($filePath) {
        return (int)shell_exec("$this->ffprobePath -v error -show_entries format=duration -of default=noprint_wrappers=1:nokey=1 $filePath");
    }

    private function updateDuration($duration, $videoId) {
        
        $hours = floor($duration / 3600);
        $mins = floor(($duration - ($hours*3600)) / 60);
        $secs = floor($duration % 60);
        
        $hours = ($hours < 1) ? "" : $hours . ":";
        $mins = ($mins < 10) ? "0" . $mins . ":" : $mins . ":";
        $secs = ($secs < 10) ? "0" . $secs : $secs;

        $duration = $hours.$mins.$secs;

        $query = $this->con->prepare("UPDATE videos SET duration=:duration WHERE id=:videoId");
        $query->bindParam(":duration", $duration);
        $query->bindParam(":videoId", $videoId);
        $query->execute();
    }
}
?>