<?php
/* FileName: tempSaveFile.php
* Simple PHP script to save image file.
* Note: This simple PHP requires much update for data validation
*/
 

  $data = file_get_contents('php://input');
  if (!(file_put_contents($_GET['fileName'],$data) === FALSE)) echo "File xfer completed.";
// file could be empty, though    else echo "File xfer failed.";
?>

?>