<?php require_once("includes/mobileHeader.php"); 

  error_reporting(0); ?>

  <style>

    
    /* Header/Logo Title */
.header {
  padding: 10px;
  text-align: center;
  background: #1E8449;
  color: white;
 
}

#desc { 

  font-size: 25px;
  
  }


  </style>
  

<div class="column" style="border-radius: .5rem; ">
    
<div class="videoSection">
    <?php
    

    $subscriptionsProvider = new SubscriptionsProvider($con, $userLoggedInObj);
    $subscriptionVideos = $subscriptionsProvider->getVideos();

    $videoGrid = new VideoGrid($con, $userLoggedInObj->getUsername());
  
  echo $videoGrid->create(null, "Recommended", false);
  ?> 

  <?php 

    if(User::isLoggedIn() && sizeof($subscriptionVideos) > 0) {
        echo $videoGrid->create($subscriptionVideos, "Subscriptions", false);
    }

    ?>
</div>
  <b>Your Channel</b>
<hr>
  <?php 

  $conn2 = mysqli_connect("localhost", "root", "", "videotube");
    $sql2 = "SELECT firstName, lastName, username, profilePic FROM users WHERE username = '".$_SESSION['userLoggedIn']."'"; 
    
    $result = $conn2->query($sql2);
      if ($result->num_rows > 0) {
        // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "<tr><td><img width='70' height='70' src='" . $row["profilePic"] . "'><b>" . $row["firstName"] . "&nbsp;"
      . $row["lastName"] . "</b> - <tr><td><a href=profile.php?username=".$row["username"].">" .$row["username"]."</a></tr></td>&nbsp; | ";
    }
      echo "</table><br>";
        } else { echo "
          You are not signed in.
          <br>Need an account? Sign Up <a href='signUp.php'>Here</a>
          <br>Already have an account? Sign In <a href='signIn.php'>Here</a>
        "; }
$conn2->close();

  ?> 
  <br>
  <br><b>Featured Creators</b>
<hr>
<?php 
  $conn = mysqli_connect("localhost", "root", "", "videotube");
    $sql = "SELECT firstName, lastName, username, profilePic FROM users order by RAND() LIMIT 10";
    $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "<tr><td><img width='70' height='70' src='" . $row["profilePic"] . "'><b>" . $row["firstName"] . "&nbsp;"
      . $row["lastName"] . "</b> - <tr><td><a href=profile.php?username=".$row["username"].">" .$row["username"]."</a></tr></td>&nbsp; | ";
    }
      echo "</table>";
        } else { echo "Error"; }
$conn->close();
  
?> 
<div class="menu-top">

    <hr>
  <ul class="nav nav-pills justify-content-center">
          <li class="nav-item">
              <a href="http://winsdominoes.ddns.net:8080" class="nav-link">Community</a>
          </li>

        <li class="nav-item">
              <a href="#" class="nav-link" data-toggle="modal" data-target="#guidelines">Guidelines</a>
          </li>

        <li class="nav-item">
              <a href="#" class="nav-link" data-toggle="modal" data-target="#about">About</a>
          </li>

          <li class="nav-item">
              <a href="http://winsdominoes.ddns.net:8080" class="nav-link" data-toggle="modal" data-target="#tips">Tips and Tricks</a>
          </li>

          <li class="nav-item">
              <a href="" class="nav-link" data-toggle="modal" data-target="#help">Help Center</a>
          </li>
      </ul>
    <div>
</div>

<div class="modal fade" id="guidelines" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">WinsVideo Guidelines</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <b>WinsVideo Guidelines</b>

<br>Community Guidelines
<br>The Community Guidelines for WinsVideo is the rule for every user to follow for the platform
<br>to make this platform better.

<br>1. Video Contains Bad Words, Appearance will be deleted.
<br>2. Videos which is duplicated title, or copied will be deleted.
<br>3. Videos contains Copyrighted Music, Images, And Video, will be claimed. And sometimes will be deleted.
<br>4. Video Contains quarells, bad politics, weapon releated games, alcoholic videos will be deleted.
<br>5. Video Contains Controversy, Antisemetic Content, and weapon related games, will be deleted.
<br>6. Videos contains sexual related, pornographic videos will be deleted and channel will also be terminated.
<br>7. No Doxxing, or showing personal information.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">About</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <b>About WinsVideo</b>
    <p>WinsVideo is a video platform for users to upload their videos to the internet. 
    <br>Upload your style to make the platform more lively and better
    <br></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tips" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tips And Tricks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <b>Tips And Tricks on WinsVideo</b>
    <p>WinsVideo is a video platform for users to upload their videos to the internet. 
    <br>Which also contains useful features you didn't know!

    <ul>
        <li>Dark Mode</li>
        - Although WinsVideo doesn't have built in Dark Mode feature, WinsVideo supports Dark Mode with extensions. For example, Chrome And Chromium based-browser have many dark mode extensions which the site support. 
        <br>
        - <b>Did you know?</b>
        <br>If you upload a transparent .png file as a profile picture when you activate dark mode the image's background will blend to the background in each page!
        <li>Forums</li>
        - Forums is where WinsVideo users can come to ask questions, make a discussion, and etc. 
        Just click the side button beside the WinsVideo logo, then click on Forums or click on the "Community" button on the home page        

        <li>Status</li>
        - Users can add status to their profile page and your status can also be featured on the homepage!
    </ul>
    <br></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 
</div>

  
<?php include_once("includes/footer.php") ?> 

          