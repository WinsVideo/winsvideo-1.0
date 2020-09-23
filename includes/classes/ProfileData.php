<?php
class ProfileData {
    
    public $con, $profileUserObj;

    public function __construct($con, $profileUsername) {
        $this->con = $con;
        $this->profileUserObj = new User($con, $profileUsername);
    }

    public function getProfileUserObj() {
        return $this->profileUserObj;
    }

    public function getProfileUsername() {
        return $this->profileUserObj->getUsername();
    }

    public function userExists() {
        $query = $this->con->prepare("SELECT * FROM users WHERE username = :username");
        $query->bindParam(":username", $profileUsername);
        $profileUsername = $this->getProfileUsername();
        $query->execute();

        return $query->rowCount() != 0;
    }

    public function getCoverPhoto() {
        return $this->profileUserObj->getBanner();
    }

    public function getProfileUserFullName() {
        return $this->profileUserObj->getName();
    }

    public function getProfilePic() {
        return $this->profileUserObj->getProfilePic();
    }

    public function getSubscriberCount() {
        return $this->profileUserObj->getSubscriberCount();
    }

	public function getAboutText() { 
		return $this->profileUserObj->getAboutText(); 
	} 
	
	public function getTotalViews2() { 
		return $this->getTotalViews(); 
	} 

	public function getCountry() { 
		return $this->profileUserObj->getCountry(); 
	} 

	public function getLinks() { 
		return $this->profileUserObj->getLinks(); 
	} 

	public function getTotalVids() { 
		return $this->profileUserObj->getTotalVids(); 
	} 

	public function getBadges() { 
		return $this->profileUserObj->getBadges(); 
	}

	public function getStatus() { 
		return $this->profileUserObj->getStatus(); 
	}

    public function getBackground() { 
        return $this->profileUserObj->getBackground(); 
    }

    public function getColor() { 
        return $this->profileUserObj->getColor(); 
    }

    public function loggedInUsername() { 
        return $this->profileUserObj->loggedInUsername(); 
    }

    public function getProfileUsername2() {
        return $this->profileUserObj->getUsername2();
    }

    public function getTotalVideoCount() {
        $query = $this->con->prepare("SELECT count(id) AS total FROM videos WHERE uploadedBy=:uploadedBy");
        $query->bindParam(":uploadedBy", $username);
        $username = $this->getProfileUsername();
        $query->execute();

        return $query->fetchColumn();
    }
	

    public function getUsersVideos() {
        $query = $this->con->prepare("SELECT * FROM videos WHERE uploadedBy=:uploadedBy ORDER BY uploadDate DESC");
        $query->bindParam(":uploadedBy", $username);
        $username = $this->getProfileUsername();
        $query->execute();

        $videos = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $videos[] = new Video($this->con, $row, $this->profileUserObj->getUsername());
        }
        return $videos;
    }

    public function getAllUserDetails() {
        return array(
            "Name" => $this->getProfileUserFullName(),
            "Username" => $this->getProfileUsername(),
            "Subscribers" => $this->getSubscriberCount(),
            "Total views" => number_format($this->getTotalViews()),
            "Sign up date" => $this->getSignUpDate()
        );
    }

    public function getTotalViews() {
        $query = $this->con->prepare("SELECT sum(views) FROM videos WHERE uploadedBy=:uploadedBy");
        $query->bindParam(":uploadedBy", $username);
        $username = $this->getProfileUsername();
        $query->execute();

        return $query->fetchColumn();
    }

    public function getSignUpDate() {
        $date = $this->profileUserObj->getSignUpDate();
        return date("F jS, Y", strtotime($date));
    }
}
?>