<?php 
require_once("../includes/classes/ProfileGenerator.php"); 
?>

<?php 
class subcount { 

        public function createHeaderSection() {

            $subCount = $this->profileData->getSubscriberCount();

            
    return "<div>
        <span class='subscriberCount'>$subCount Subscribers</span>
    </div>";

        } 

    } 


    
?> 