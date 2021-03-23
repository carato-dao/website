<?php 
	$toMail = returnDBObject("SELECT * FROM configs WHERE code=?",array('contattimail')); 
	
	if(isset($_POST['sendMail'])){
		$oggetto='Richiesta di contatto dal sito';
		$posted='';
		$i=0;
		
		foreach ($_POST as $name => $value){
			if($name!='sendMail'){
				if($i!=0){
					$posted.='<br>';
				}
				
				$posted.='> '.ucfirst($name).': '.$value;
				
				$i++;	
			}
		}
		
		$testo=
			'La seguente richiesta è stata inviata dal form del sito web<br><br>'.$posted;
			;
		
						
		sendMail(
			array('email'=>'info@mywebsite.com', 'name'=>$oggetto),
			array('email'=>'mywebsite@gmail.com', 'name'=>'My Website'), 
			$oggetto, 
			$testo);
			
			$success='La richiesta è stata mandata correttamente';
		?>
			<script>alert('<?php echo $success; ?>');</script>
		<?php
	} 
?>
<script>
	function validateForm(idform){
		errors='no';
		$('#'+idform).find('.validatefield').each(function(){
			attr = $(this).attr('required');
			value = $(this).val();
			type = $(this).attr('type');
			if (typeof attr !== typeof undefined && attr !== false) {
				
				if(value==''){
					errors='si';
					$(this).addClass('input-error');
					console.log($(this).attr('name'));
				}else{
					if(type=='email'){
						if(IsEmail(value)===false){
							errors='si';
							console.log($(this).attr('name'));
						}
					}else{
						$(this).removeClass('input-error');
					}
				}	
			}
		});
		
		if(errors=='no'){
			$('#'+idform).submit();
		}else{
			alert("<?php echo $compilaform; ?>");
		}
	}
	function IsEmail(email) {
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	}
</script>