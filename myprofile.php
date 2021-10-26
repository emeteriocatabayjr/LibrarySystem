<?php include ('includes/connection.php');?>
<?php include ('includes/sessionstart.php');?>
<?php include ('includes/header.php')?>
<?php 
if(!empty($_SESSION)) {
    ?>
<?php include ('includes/navbar_user.php')?>
	<div class="container text-center my-5">
		<h4>Your Profile</h4>
		<div class="user_info">
			<div class="container text-left">
				<div class="card mx-auto" style="width:320px">					
					<img class="card-img-top " src="uploads/<?php echo $_SESSION['image']; ?>" style="width:100%">
                    <button type="submit" class="btn" id="uploadbtn" bookid="<?php echo $_SESSION['bookid'] ?>">
                        <i class="fa fa-file-photo-o m-0 float-right" data-toggle="tooltip" title="Upload your Photo" style="font-size:16px; color: blue;"></i>
                    </button>				
					<div class="card-body">
						<h4 class="card-title"><?php echo $_SESSION["borrowername"]; ?></h4>
						<p class="card-text">
							<p><b>Address: </b>
								<?php echo $_SESSION["address"];?>
							</p>
                            <p><b>Contact No: </b>
                                <?php echo $_SESSION["contactnumber"];?>
                            </p>                           
							<p><b>Username: </b>
								<?php echo $_SESSION["username"];?>
							</p>
							<p><b>Password: </b>
								******
							</p>
						</p>
						<button type="submit" class="btn btn-primary btn-sm float-right" id="editbtn" bookid="<?php echo $_SESSION['bookid'] ?>">Edit Profile</button>
					</div>
				</div>
			</div>
	   </div>
	</div>

 <?php
 }else echo '<div class="alert alert-danger alert-dismissible fade show">
 <strong>Login Required!</strong> You needed to be login first before you can access the database.
 <a href="login.php"> Go back to login</a>
 </div>';
 ?>
</body>
</html>
<div id="editbook_modal" class="modal fade">
    <div class="modal-dialog">
     	<div class="modal-content">
         	<div class="modal-header">
             	<h4 class="modal-title">Edit Profile</h4>
             	<button type="button" class="close" data-dismiss="modal">&times;</button>
         	</div>
         	<div class="modal-body" id="borrower_detail">

         	</div>
         	<div class="modal-footer">

         	</div>
     	</div>
 	</div>
</div>

<div id="upload_modal" class="modal fade">
    <div class="modal-dialog">
     	<div class="modal-content">
         	<div class="modal-header">
             	<h4 class="modal-title">Upload Your Photo</h4>
             	<button type="button" class="close" data-dismiss="modal">&times;</button>
         	</div>
         	<div class="modal-body" id="borrower_photo">

         	</div>
         	<div class="modal-footer">

         	</div>
     	</div>
 	</div>
</div>

<script type="text/javascript">

	$(document).on('click', '#editbtn', function(){
        var borrower_id = $(this).attr("bookid");
        $.ajax({
         	url:"myprofile_update.php",
         	method:"POST",
         	data:{borrower_id:borrower_id},
         	success:function(data){
            	$('#borrower_detail').html(data);
            	$('#editbook_modal').modal('show');
        	}
        });
    });

   	$(document).on('click', '#uploadbtn', function(){
        var borrower_id = $(this).attr("bookid");
        $.ajax({
         	url:"myprofile_upload.php",
         	method:"POST",
         	data:{borrower_id:borrower_id},
         	success:function(data){
            	$('#borrower_photo').html(data);
            	$('#upload_modal').modal('show');
        	}
        });
    });

function showPassword() {
	var x = document.getElementById("newpassword");
	if (x.type === "password") {
		x.type = "text";
	} else {
		x.type = "password";
	}
}

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});


</script>