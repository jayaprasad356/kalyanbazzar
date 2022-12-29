<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;
?>
<?php

if (isset($_GET['id'])) {
    $ID = $db->escapeString($_GET['id']);
} else {
    // $ID = "";
    return false;
    exit(0);
}
if (isset($_POST['btnEdit'])) {

		$error = array();
		$name = $db->escapeString(($_POST['name']));
		$description = $db->escapeString($_POST['description']);

		
		 
		if (!empty($name) && !empty($description)) 
		{

            //image
            if ($_FILES['image']['size'] != 0 && $_FILES['image']['error'] == 0 && !empty($_FILES['image'])){
            
                $old_image = $db->escapeString($_POST['old_image']);
                $extension = pathinfo($_FILES["image"]["name"])['extension'];
                $new_image = $ID . "." . $extension;
                

                $result = $fn->validate_image($_FILES["image"]);
                $target_path = 'upload/profiles/';
                
                $filename = microtime(true) . '.' . strtolower($extension);
                $full_path = $target_path . "" . $filename;
                if (!move_uploaded_file($_FILES["image"]["tmp_name"], $full_path)) {
                    echo '<p class="alert alert-danger">Can not upload image.</p>';
                    return false;
                    exit();
                }
                if (!empty($old_image)) {
                    unlink( $old_image);
                }
                $upload_image = 'upload/profiles/' . $filename;
                $sql = "UPDATE reviews SET `image`='$upload_image' WHERE id = $ID";
                $db->sql($sql);
            }
			
             $sql_query = "UPDATE reviews SET name='$name',description='$description' WHERE id =  $ID";
			 $db->sql($sql_query);
             $update_result = $db->getResult();
			if (!empty($update_result)) {
				$update_result = 0;
			} else {
				$update_result = 1;
			}

			// check update result
			if ($update_result == 1)
			{
			    $error['update_review'] = " <section class='content-header'><span class='label label-success'>Reviews updated Successfully</span></section>";
			} else {
				$error['update_review'] = " <span class='label label-danger'>Failed to update</span>";
			}
		}
	} 


// create array variable to store previous data
$data = array();

$sql_query = "SELECT * FROM reviews  WHERE id =" . $ID;
$db->sql($sql_query);
$res = $db->getResult();

if (isset($_POST['btnCancel'])) { ?>
	<script>
		window.location.href = "reviews.php";
	</script>
<?php } ?>
<section class="content-header">
	<h1>
		Update Reviews<small><a href='reviews.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Reviews</a></small></h1>
	<small><?php echo isset($error['update_review']) ? $error['update_review'] : ''; ?></small>
	<ol class="breadcrumb">
		<li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
	</ol>
</section>
<section class="content">
	<!-- Main row -->

	<div class="row">
		<div class="col-md-8">
		
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					
				</div><!-- /.box-header -->
				<!-- form start -->
				<form id="edit_review_form" method="post" enctype="multipart/form-data">
					<div class="box-body">
                    <input type="hidden" id="old_image" name="old_image"  value="<?= $res[0]['image']; ?>">
						   <div class="row">
							    <div class="form-group">
									 <div class="col-md-8">
										<label for="exampleInputEmail1">Name</label><i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?>
										<input type="text" class="form-control" name="name" value="<?php echo $res[0]['name']; ?>">
									 </div>
								</div>
						   </div>
						   <br>
						   <div class="row">
								<div class="form-group">
									 <div class="col-md-12">
										<label for="exampleInputEmail1">Description</label><i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
										<textarea rows="3" type="text" class="form-control" name="description"><?php echo $res[0]['description']; ?></textarea>
									 </div>
									
								</div>
						   </div>
                           <br>
                           <div class="row">
                                <div class="form-group">
                                    <div class='col-md-5'>
                                            <label for="exampleInputFile">Profile Image</label> 
                                                <input type="file" accept="image/png,  image/jpeg" onchange="readURL(this);"  name="image" id="image">
                                                <p class="help-block"><img id="blah" src="<?php echo $res[0]['image']; ?>" style="max-width:75%" /></p>
                                    </div>
                                </div>
                         </div>
					</div>
					<!-- /.box-body -->
                       
					<div class="box-footer">
						<button type="submit" class="btn btn-primary" name="btnEdit">Update</button>
					
					</div>
				</form>
			</div><!-- /.box -->
		</div>
	</div>
</section>

<div class="separator"> </div>
<?php $db->disconnect(); ?>
<script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
