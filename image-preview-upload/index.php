<?php include 'processForm.php' ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
	
<title>Image Preview and Upload PHP</title>
</head>

<body>
	
	<div class="container">
		<div class="row">
			<div class="col-4.offset-md-4 form-div">
				<form action="index.php" method="POST" enctype="multipart/form-data">
          <h3 class="text-center">Create Profile</h3>
          
          <?php if(!empty($msg)): ?>
            <div class="alert <?php echo $css_class; ?>">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
          
					<div class="form-group">
						<label for"profileImage">Profile Image</label>
						<input type="file" name="profileImage" id="profileImage" class="form-control">
						</div>
						<div class="form-group">
              <label for="bio">Bio</label>
              <textarea name="bio" id="bio" class="form-control"></textarea>                         </div>
            <div class="form-group">  
							<button type="submit" name="save-user" class="btn btn-primary btn-block">Save User</button>
            </div>
					</form>
         </div>
			</div>
		</div>
</body>
</html>