<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
<?php
$exif = exif_read_data("IMAG0005.jpg", 0, true);


$latitude = $exif['GPS']['GPSLatitude'];
//經度
$longitude = $exif['GPS']['GPSLongitude'];

function getGps($exifCoord)
{
  $degrees = count($exifCoord) > 0 ? gps2Num($exifCoord[0]) : 0;
  $minutes = count($exifCoord) > 1 ? gps2Num($exifCoord[1]) : 0;
  $seconds = count($exifCoord) > 2 ? gps2Num($exifCoord[2]) : 0;
 
  //normalize
  $minutes += 60 * ($degrees - floor($degrees));
  $degrees = floor($degrees);
 
  $seconds += 60 * ($minutes - floor($minutes));
  $minutes = floor($minutes);
 
  //extra normalization, probably not necessary unless you get weird data
  if($seconds >= 60)
  {
    $minutes += floor($seconds/60.0);
    $seconds -= 60*floor($seconds/60.0);
  }
 
  if($minutes >= 60)
  {
    $degrees += floor($minutes/60.0);
    $minutes -= 60*floor($minutes/60.0);
  }
 
  return array('degrees' => $degrees, 'minutes' => $minutes, 'seconds' => $seconds);
}
 
function gps2Num($coordPart)
{
  $parts = explode('/', $coordPart);
 
  if(count($parts) <= 0)
    return 0;
  if(count($parts) == 1)
    return $parts[0];
 
  return floatval($parts[0]) / floatval($parts[1]);
}
print_r(getGps($latitude));
print_r(getGps($longitude));
?>
</body>
</html>