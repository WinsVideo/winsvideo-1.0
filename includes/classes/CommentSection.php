<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php

header('Content-Type: text/html; charset=utf-8');

class CommentSection {

    private $con, $video, $userLoggedInObj;

    public function __construct($con, $video, $userLoggedInObj) {
        $this->con = $con;
        $this->video = $video;
        $this->userLoggedInObj = $userLoggedInObj;
    }

    public function create() {
        return $this->createCommentSection();
    }

    private function createCommentSection() {
        $numComments = $this->video->getNumberOfComments();
        $postedBy = $this->userLoggedInObj->getUsername();
        $videoId = $this->video->getId();

        $profileButton = ButtonProvider::createUserProfileButton($this->con, $postedBy);
        $commentAction = "postComment(this, \"$postedBy\", $videoId, null, \"comments\");";
        $commentButton = ButtonProvider::createCommentButton("COMMENT", null, $commentAction, "postComment");
        
        $comments = $this->video->getComments(); 
        $commentItems = "";
        foreach($comments as $comment) {
            $commentItems .= $comment->create();
        }


        return "<div class='commentSection'>

                    <div class='header'>
                        <span class='commentCount'>$numComments Comments</span>

                        <div class='commentForm'>
                            $profileButton
                            <textarea class='commentBodyClass' placeholder='Add a public comment'></textarea>
                            $commentButton
                        </div>
                    </div>

                            
                            
                      <div class='comments'>

                        $commentItems

                    </div>

                </div>";

 
    // here you must input the secret key, not the site key
    // don´t worry, it is server side protected and won´t be
    // visible under the page source, it´s php code from now on...
    $secret = "6Lc-_LQZAAAAACVhpgpULedIm0T3yR7zOPrlDYLJ";

    

    $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    // set post fields
    $post = [
        'secret' => $secret,
        'response' => $_POST['g-recaptcha-response'],
        'remoteip'   => $_SERVER['REMOTE_ADDR']
    ];



    // execute!
    $response = curl_exec($ch);

    // close the connection, release resources used
    curl_close($ch);

    // do anything you want with your response
    // var_dump(json_decode($response)); // uncomment this to get the json full response
    $array = json_decode($response,true);
    //echo "<pre/>";print_r($array); // uncomment this to get the json to array full response/results

    if($array['success'] == 1){
    // here we have confirmed the chalenge, do whatever you want here, as redirecting to another
    // page. i suggest using $_SESSION in order for really protecting the other page to be
    // redirected from here to be safe, else anyone may access the other page directly 
    // without passing by the recapctha challenge, so there won´t be any point in this effort!
        echo "success!" ;
    }
    else{
        echo "Challenge not accepted so far....";
    }
    }

}
?>

<script>
                function recaptchaCallback() {
                  $('.postComment').removeAttr('disabled');
                };

            </script>