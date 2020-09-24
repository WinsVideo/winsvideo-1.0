<?php
class Channels {

    private $con, $sqlData, $userLoggedInObj;

    public function __construct($con, $input, $userLoggedInObj) {
        $this->con = $con;
        $this->userLoggedInObj = $userLoggedInObj;

        if(is_array($input)) {
            $this->sqlData = $input;
        }
        else {
            $query = $this->con->prepare("SELECT * FROM users WHERE id = :id");
            $query->bindParam(":id", $input);
            $query->execute();

            $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
        }
    }
    
    public function getId() {
        return $this->sqlData["id"];
    }

    public function getfirstName() {
        return $this->sqlData["firstName"];
    }

    public function getLastName() {
        return $this->sqlData["lastName"];
    }

    public function getUsername() {
        return $this->sqlData["username"];
    }

    public function getProFilePic() {
        $query = $this->con->prepare("SELECT profilePic FROM users WHERE id=:id AND selected=1");
        $query->bindParam(":id", $userId);
        $id = $this->getId();
        $query->execute();

        return $query->fetchColumn();
    }

}
?>