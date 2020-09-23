<?php 
require_once("includes/header.php");
require_once("includes/classes/VideoDetailsFormProvider.php");


?>

<div class="column">

<div class="alert alert-warning">
    <strong>WARNING! </strong> If your video has a big file size, the conversion might take a while. 
  </div>



<b>Video Requirements</b>
  <p>1. Video Type: MP4, FLV, WEBM, MKV, VOB, OGV, OGG, AVI, WMV, MOV, MPEG, MPG. 
    <br> 2. Max Video / File Size: 100 MB</p>
  <hr>

    <?php
    $formProvider = new VideoDetailsFormProvider($con);
    echo $formProvider->createUploadForm();
    ?>

<script>
$("form").submit(function() {
    $("#loadingModal").modal("show");
});
</script>



<div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        Please wait. This might take a while.
        <img src="assets/images/icons/loading-spinner.gif">
      </div>

    </div>
  </div>
</div>

</div>



<?php require_once("includes/footer.php"); ?>
                