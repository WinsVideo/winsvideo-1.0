<?php

header('Content-Type: text/html; charset=utf-8'); 

class User {

    private $con, $sqlData;

    public function __construct($con, $username) {
        $this->con = $con;

        $query = $this->con->prepare("SELECT * FROM users WHERE username = :un");
        $query->bindParam(":un", $username);
        $query->execute();

        $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function isLoggedIn() {
        return isset($_SESSION["userLoggedIn"]);
    }

    public function loggedInUsername() {
        return $_SESSION["userLoggedIn"]; 
    }
    
    public function getUsername() {
        return $this->sqlData["username"];
    }

    public function getName() {
        return htmlspecialchars(strip_tags($this->sqlData["firstName"] . " " . $this->sqlData["lastName"]));
    }

    public function getFirstName() {
        return htmlspecialchars(strip_tags($this->sqlData["firstName"]));
    }

    public function getLastName() {
        return htmlspecialchars(strip_tags($this->sqlData["lastName"]));
    }

    public function getEmail() {
        return htmlspecialchars(strip_tags($this->sqlData["email"]));
    }

    public function getProfilePic() {
        return $this->sqlData["profilePic"];
    }

	public function getBanner() { 
		return $this->sqlData["banner"];
	} 

    public function getSignUpDate() {
        return $this->sqlData["signUpDate"];
    }

	public function getAboutText() { 
		return htmlspecialchars($this->sqlData["about"]); 
	}

	public function getCountry() { 
		return htmlspecialchars($this->sqlData["country"]); 
	}
	
	public function getLinks() { 
		//Getting the links that user entered to the db
		return $this->sqlData["links"]; 
	} 

	public function getTotalVids() { 
		//Not-yet done, I can't find the solution. 
	}
	
	public function getBadges() { 
		//Getting the links that user entered to the db
		return htmlspecialchars($this->sqlData["badges"]); 
	}

	public function getStatus() { 
		return htmlspecialchars($this->sqlData["status"]); 
	}

    public function getBackground() { 
        return $this->sqlData["background"]; 
    }

    public function getColor() {
        return htmlspecialchars($this->sqlData["color"]); 
    }

    public function getUsername2() {
        return htmlspecialchars($_SESSION["userLoggedIn"]); 
    }

    public function isSubscribedTo($userTo) {
        $query = $this->con->prepare("SELECT * FROM subscribers WHERE userTo=:userTo AND userFrom=:userFrom");
        $query->bindParam(":userTo", $userTo);
        $query->bindParam(":userFrom", $username);
        $username = $this->getUsername();
        $query->execute();
        return $query->rowCount() > 0;
    }

    public function getSubscriberCount() {
        $query = $this->con->prepare("SELECT * FROM subscribers WHERE userTo=:userTo");
        $query->bindParam(":userTo", $username);
        $username = $this->getUsername();
        $query->execute();
        return $query->rowCount();
    }

	public function getRealtimeSubCount() { 
		
	} 

    public function getSubscriptions() {
        $query = $this->con->prepare("SELECT userTo FROM subscribers WHERE userFrom=:userFrom");
        $username = $this->getUsername();
        $query->bindParam(":userFrom", $username);
        $query->execute();
        
        $subs = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($this->con, $row["userTo"]);
            array_push($subs, $user);
        }
        return $subs;
    }

}
?>