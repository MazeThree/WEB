<?php
if(is_uploaded_file($_FILES['uplosd']['tmp_name'])){
move_uploaded_file($_FILES['upload']['tmp_name'],"./flies/".$_FILES
['upload']['name']);
};
?>