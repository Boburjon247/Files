<form action="" method="post" enctype="multipart/form-data">
   <input type="file" name="rasm[]" multiple>
   <input type="submit" name="ok" value="ok">
</form>

<?php if(isset($_POST['ok']) && !empty($_FILES['rasm']['name'])):?>
   <?php
      for ($i=0; $i <count($_FILES['rasm']['name']) ; $i++) { 
         $array = [];
         $array[$i] = explode('.', $_FILES['rasm']['name'][$i]);
         $count = count($array[$i]) - 1;
         if(is_dir($array[$i][$count])){
            move_uploaded_file($_FILES['rasm']['tmp_name'][$i], $array[$i][$count].'/'.$_FILES['rasm']['name'][$i]);
         }
         else{
            mkdir($array[$i][$count]);
            move_uploaded_file($_FILES['rasm']['tmp_name'][$i], $array[$i][$count].'/'.$_FILES['rasm']['name'][$i]);
         } 
      }
   ?>
<?php endif;?>