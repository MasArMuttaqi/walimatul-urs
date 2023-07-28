<?php
if(isset($_FILES['uploads']) && ($_FILES['uploads']['size']>0)){
        if(trim($existing_image)!='No'){
                $photo=$existing_image;
        }
        else { $photo = date('dmY-his');
        $photo .="-".$_FILES['uploads']['name'];

        }
        move_uploaded_file($_FILES['uploads']['tmp_name'], 'directory/image/'.$photo);
}
        else { $photo = $existing_image; }
?>