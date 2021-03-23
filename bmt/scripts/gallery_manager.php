<?php
include('initialize.php');
include('core.php');
include('configurations.php');

if(isset($_POST['galleryAdd'])){

$i=0;
foreach($_FILES['popoverImage']['name'] as $image_name){
	$image_names[$i]=$image_name;
	$i++;
}

$i=0;
foreach($_FILES['popoverImage']['tmp_name'] as $image_tmp){

     $file_parts = pathinfo($image_names[$i]);
     $extension=strtolower($file_parts['extension']);
     if( ($extension=='jpg') || ($extension=='png') || ($extension=='jpeg') || ($extension=='gif') ){
	     
  
	 $target='../../'.$_POST['target'];
	 $filename=sanitize(str_replace($file_parts['extension'],'',basename($image_names[$i]))).$extension;
	 $target = $target.$filename;
	 move_uploaded_file($image_tmp, $target); 
?>
	<div class="uploadedImage" url="<?php echo $subdomain; ?>/<?php echo $_POST['target']; ?><?php echo $filename; ?>">
	<div class="uploaded-image" style="background-image:url(<?php echo $subdomain; ?>/<?php echo $_POST['target']; ?><?php echo $filename; ?>)">
		<div class="order-buttons">
		  <i onClick="moveBackward('<?php echo $subdomain; ?>/<?php echo $_POST['target']; ?><?php echo $filename; ?>')" class="fa fa-minus"></i>
		  <i onClick="moveForward('<?php echo $subdomain; ?>/<?php echo $_POST['target']; ?><?php echo $filename; ?>')" class="fa fa-plus"></i>
		</div>
	<div class="remove-image" onClick="removeUploadedImage('<?php echo $subdomain; ?>/<?php echo $_POST['target']; ?><?php echo $filename; ?>')">
	<i class="fa fa-remove-sign icon-remove-image"></i></div>
	</div>
	<input type="hidden" name="gallery[]" value="<?php echo $filename; ?>">
	<input type="text" name="captions[]" class="caption-image" placeholder="Inserisci un titolo">
</div>
<?php    }else{
	?><script>
	    bootbox.alert("Puoi inserire solo file .jpg, .jpeg, .png, .gif");
	</script>
<?php } /* fine controllo estensione */
$i++;
}/* fine foreach */
}/*fine isset galleryadd */ ?>
