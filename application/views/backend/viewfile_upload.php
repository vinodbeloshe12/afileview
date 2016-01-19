<?php
$today = getdate();
$curmonth = date("m");
$m= $_GET['mon'];
$y = $_GET['year'];
if(isset($m)){
  $curmonth = $m;
   if(isset($y)){
      $start = mktime(0,0,0,$_GET['mon'],1,$_GET['year']);
   }
   else{
      $start = mktime(0,0,0,$_GET['mon'],1,$today['year']);
   }
}
else{
   $start = mktime(0,0,0,$today['mon'],1,$today['year']);
}
$first = getdate($start);
$end = mktime(0,0,0,$first['mon']+1,0,$first['year']);
$last = getdate($end);

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- <link href="calendar.css" rel="stylesheet" type="text/css" /> -->
<style>
@charset "utf-8";
.calendar {
   width: 600px;
     margin:5px auto;
}
.calendar div {
   float: left;
   height: 80px;
   width: 80px;
   border: 1px solid #333333;
}
.calendar .monheader {
  font-weight: bold;
      color: #FFFFFF;
      text-align: center;
      padding: 5px;
      height: 30px;
      width: 560px;
      background-color: #F44336;
}
.calendar .dayheader {
   font-weight: bold;
   color: #FFFFFF;
   text-align: center;
   height: 20px;
   background-color: #000000;
}
.calendar .day {
   background-color: #FFFFCC;
}
.calendar .today {
   background-color: #FFCC00;
   border-color: #CC0000;
}
.calendar .inactive {
   background-color: #666666;
}
.calendar .active {
   background-color: #e7e7e7;
}
</style>

<script>
function myfunction()
{

alert("aaa" );
}
</script>

</head>

<body>
  <div class="row">
  <div class="col s12">
    <h6 style="background:#e7e7e7; text-align:center;font-size:23px;padding:5px;"><a target="_blank" href="http://localhost/afile/uploads/<?php echo $before->pdf;?>">Latest Uploaded File</a></h6>
  </div>
  </div>
  <div class="row">
  <div class="col s12">
<div class="calendar">
  <div class="monheader">
<script>
function myf()
{

var mym=  "<?php echo $first['mon'] - 1 ?>";
var myy=  "<?php echo $first['year'] ?>";

if (mym >= 1) {
    // alert(mym + " " + myy);

      window.location.href="http://localhost/afileview/index.php/site/viewfile_upload?mon="+mym+"&year="+myy;
}

else {
  window.location.href="http://localhost/afileview/index.php/site/viewfile_upload?mon=12&year="+(--myy);
}

}


function myf1()
{

var mym=  "<?php echo $first['mon'] + 1 ?>";
var myy=  "<?php echo $first['year'] ?>";

 if (mym <= 12)  {
      window.location.href="http://localhost/afileview/index.php/site/viewfile_upload?mon="+mym+"&year="+myy;
}
else {
  window.location.href="http://localhost/afileview/index.php/site/viewfile_upload?mon=1&year="+(++myy);
}

}
</script>



<a href="javascript:myf()"><b style="color:#fff;float:left;"><?php echo $sm; ?>Prev</b></a>
    <?php echo $first['month'] . ' - ' . $first['year']; ?>
<a href="javascript:myf1()"> <b style="color:#fff;float:right">Next</b></a>
</div>
  <div class="dayheader">Sun</div>
  <div class="dayheader">Mon</div>
  <div class="dayheader">Tue</div>
  <div class="dayheader">Wed</div>
  <div class="dayheader">Thu</div>
  <div class="dayheader">Fri</div>
  <div class="dayheader">Sat</div>
<?php
for($i = 0; $i < $first['wday']; $i++){
   echo '  <div class="inactive"></div>' . "\n";
}
for($i = 1; $i <= $last['mday']; $i++){
   if($i == $today['mday'] && $first['mon'] == $today['mon'] && $first['year'] == $today['year']){
      $style = 'today';
   }
   else{
      $style = 'day';
   }
   $sql ="SELECT * FROM `afile_file_upload` where day(cdate)='$i' and month(cdate)='$curmonth'";
   $query = $this->db->query($sql);
if ($query->num_rows() > 0) {
  foreach ($query->result() as $row) {
    $mypdf= $row->pdf;

    echo ' <a target="_blank" href="http://localhost/afile/uploads/' . $mypdf . '"> <div class="active">' . $i . '</div></a>' . "\n";
}
}
else
{
  echo '  <div class="' . $style . '">' . $i . '</div>' . "\n";
}

}
if($last['wday'] < 6){
   for($i = $last['wday']; $i < 6; $i++){
      echo '  <div class="inactive"></div>' . "\n";
   }
}
?>
</div>
</div></div>
</body>
</html>
