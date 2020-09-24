<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<style>
    a {
        text-decoration: none;
    }

    a:hover {
        text-decoration: none;
    }
    #description {
    white-space: -moz-pre-wrap; 
    white-space: -pre-wrap; 
    white-space: -o-pre-wrap;
    white-space: pre-wrap; 
    word-wrap: break-word;
    }
</style>
<?php
require_once("includes/classes/VideoInfoControls.php"); 
class VideoInfoSection {

    private $con, $video, $userLoggedInObj;

    public function __construct($con, $video, $userLoggedInObj) {
        $this->con = $con;
        $this->video = $video;
        $this->userLoggedInObj = $userLoggedInObj;
    }

    public function create() {
        return $this->createPrimaryInfo() . $this->createSecondaryInfo();
    }

   

    private function createPrimaryInfo() {
        $id = $this->video->getId();
        $title = $this->video->getTitle();
        $views = number_format($this->video->getViews());
        $space = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        $space2 = "&nbsp;&nbsp;&nbsp;";

        $videoInfoControls = new VideoInfoControls($this->video, $this->userLoggedInObj);
        $controls = $videoInfoControls->create();

        if($title == null){
            $title = "No Title Available / The video might have been deleted."; 
        }
        return "
        
        <div class='videoInfo'>
                    <h1>$title</h1>
                    <div class='bottomSection'>
                        <span class='viewCount'>
                         $views
                        views</span>
                        $controls $space<img id='click' data-toggle='modal' data-target='#exampleModal' src='assets/images/icons/share.png' width='20px' height='20px'>$space2<a data-toggle='modal' data-target='#exampleModal'>Share</a>
                    </div>
                </div>

                <!-- Button trigger modal -->
                        

                        <!-- Modal -->
                        <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                          <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>Share / Embed</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                  <span aria-hidden='true'>&times;</span>
                                </button>
                              </div>
                              <div class='modal-body'>

                              	<form>
									  <input type='text' class='form-control' id='videoName' name='videoName' value='https://winsvideo.net/embed.php?id=$id' readonly><br><br>
									</form>

                                http://winsvideo.net/watch.php?id=$id
                              </div>
                              <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                              </div>
                            </div>
                          </div>
                        </div>";

        
    }

    private function createSecondaryInfo() {

        $description = $this->video->getDescription();
        $uploadDate = $this->video->getUploadDate();
        $uploadedBy = $this->video->getUploadedBy();
        $uploadedByFullName = $this->video->getUploadedByFullName();
		$tags = $this->video->getTags(); 
        $profileButton = ButtonProvider::createUserProfileButton($this->con, $uploadedBy);
        $category = $this->video->getCategory(); 
        $id = $this->video->getId(); 
        $space = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        $style = "";
        $line = "";

        if($uploadedBy == $this->userLoggedInObj->getUsername()) {
            $actionButton = ButtonProvider::createEditVideoButton($this->video->getId());
        }
        else {
            $userToObject = new User($this->con, $uploadedBy);
            $actionButton = ButtonProvider::createSubscriberButton($this->con, $userToObject, $this->userLoggedInObj);
        }

        if($description == null) {
            $style = "display: none;";
        }

        if($tags == null) {
            $tags = "<style>
                        .tagsContainer {
                            visibility: hidden;     
                        }
                    </style>"; 
        }
        
        return "<div class='secondaryInfo'>
                    <div class='topRow'>
                        $profileButton

                        <div class='uploadInfo'>
                            <span class='owner'>
                                <a href='profile.php?username=$uploadedBy'>
                                    $uploadedByFullName
                                </a>
                            </span>
                            <span class='date'>Published on $uploadDate</span>
                        </div>
                        $actionButton
                    </div>

                    <div class='descriptionContainer' style='$style'>
						<span id='description'>$description</span>
                    <div>
                    <div class='category'>
                        <br><br>
					   <label style='color: rgba(17,17,17,0.6)'>Category$space</label><b>$category</b>
                    </div>

                    <div class='license'>
                        <label style='color: rgba(17,17,17,0.6)'>License$space&nbsp;&nbsp;&nbsp;</label><b>WinsVideo Standard Video</b>
                    </div>
                        
                    </div>
                    </div>


                  
                </div>
				
				<script>
					function myFunction() {
					var dots = document.getElementById('dots');
					var moreText = document.getElementById('more');
					var btnText = document.getElementById('myBtn');

					if (dots.style.display === 'none') {
							dots.style.display = 'inline';
							btnText.innerHTML = 'Show Description'; 
							moreText.style.display = 'none';
					} else {
							dots.style.display = 'none';
							btnText.innerHTML = 'Hide Description'; 
							moreText.style.display = 'inline';
					}
                }

                function share() {
                    var dots = document.getElementById('dots2');
                    var moreText = document.getElementById('link');
                    var btnText = document.getElementById('click');

                    if (dots.style.display === 'none') {
                            dots2.style.display = 'inline';
                            moreText.style.display = 'none';
                    } else {
                            dots2.style.display = 'none';
                            moreText.style.display = 'inline';
                    }
                }
                </script>";
 

    } 

} 
?>