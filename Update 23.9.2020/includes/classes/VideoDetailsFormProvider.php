<?php
class VideoDetailsFormProvider {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function createUploadForm() {
        $fileInput = $this->createFileInput();
        $titleInput = $this->createTitleInput(null);
        $descriptionInput = $this->createDescriptionInput(null);
		$tagsInput = $this->createTagsInput(null); 
        $privacyInput = $this->createPrivacyInput(null);
        $categoriesInput = $this->createCategoriesInput(null);
        $uploadButton = $this->createUploadButton();
        return "<form action='processing.php' method='POST' enctype='multipart/form-data'>
                    $fileInput
                    $titleInput
                    $descriptionInput
					$tagsInput
                    $privacyInput
                    $categoriesInput
                    $uploadButton
                </form>";
    }

    public function createEditDetailsForm($video) {
        $titleInput = $this->createTitleInput($video->getTitle());
        $descriptionInput = $this->createDescriptionInput($video->getDescription());
		$tagsInput = $this->createTagsInput($video->getTags()); 
        $privacyInput = $this->createPrivacyInput($video->getPrivacy());
        $categoriesInput = $this->createCategoriesInput($video->getCategory());
        $saveButton = $this->createSaveButton();
        $deleteButton = $this->createDeleteButton();
        return "<form method='POST'>
                    $titleInput
                    $descriptionInput
					$tagsInput
                    $privacyInput
                    $categoriesInput
                    $saveButton
                    $deleteButton
                </form>";
    }

    private function createFileInput() {

        return "<div class='form-group'>
                    <label for='exampleFormControlFile1'>Select Your Video</label>
                    <input type='file' class='form-control-file' id='exampleFormControlFile1' name='fileInput' required>
                </div>";
    }

    private function createTitleInput($value) {
        if($value == null) $value = "";
        return "<div class='form-group'>
        <b><label for='details2'>Video Details</label></b>
                    <input class='form-control' type='text' placeholder='Title' name='titleInput' value='$value'>
                </div>";
    }

    private function createDescriptionInput($value) {
        if($value == null) $value = "";
        return "<div class='form-group'>
                    <textarea class='form-control' placeholder='Description' name='descriptionInput' rows='3'>$value</textarea>
                </div>";
    } 

	private function createTagsInput($value) {
        if($value == null) $value = "";
        return "<div class='form-group'>
                    <textarea class='form-control' placeholder='Tags' name='tagsInput' rows='1'>$value</textarea>
                </div>";
    } 

    private function createPrivacyInput($value) {
        if($value == null) $value = "";

        $publicSelected = ($value == 1) ? "selected='selected'" : "";
        $privateSelected = ($value == 0);
        return "<div class='form-group'>
        <b><label for='privacy'>Privacy</label></b>
                    <select class='form-control' name='privacyInput'>
                    
                        <option value='1' $publicSelected>Public</option>
                        <option value='0' $privateSelected>Private</option>
                        
                    </select>
                </div>";
    }

    private function createCategoriesInput($value) {
        if($value == null) $value = "";
        $query = $this->con->prepare("SELECT * FROM categories");    
        $query->execute();
        
        $html = "<div class='form-group'>
        <b><label for='category'>Category</label></b>
                    <select class='form-control' name='categoryInput'>";

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $id = $row["id"];
            $name = $row["name"];
            $selected = ($id == $value) ? "selected='selected'" : "";

            $html .= "<option $selected value='$id'>$name</option>";
        }
        
        $html .= "</select>
                </div>";

        return $html;

    }

    private function createUploadButton() {
        return "<button type='submit' class='btn btn-primary' name='uploadButton'>Upload</button>";
    }

    private function createSaveButton() {
        return "<button type='submit' class='btn btn-primary' name='saveButton'>Save</button>";
    }

	private function createDeleteButton() {
        return "<button type='submit' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal' name='deleteButton'>Delete</button>";
    }
}
?>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>