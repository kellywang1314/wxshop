<?php
header("Content-Type: text/html; charset=utf-8");
if ((($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/jpg"))
&& ($_FILES["file"]["size"] < 2000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    // echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    // echo "Type: " . $_FILES["file"]["type"] . "<br />";
    // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      $newDir = date("YmdHis").rand(1000,9999);
      $newName = $newDir .$_FILES["file"]["name"];
      mkdir("upload/" .$newDir);
      chmod("upload/" .$newDir,0777);

      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $newDir. "/".$newName);

    

      echo "这里是返回值";


    
      }
    }
  }
else
  {
    echo "Invalid file";
  }
?>