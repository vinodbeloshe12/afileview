<html>
<head>
<link href="http://localhost/afileview/assets/css/calender.css" type="text/css" rel="stylesheet" />
<!-- <link href="<?php echo site_url('calender.css"'); ?>" type="text/css" rel="stylesheet" /> -->

</head>
<body>
  <div class="row">
  <div class="col s12">
    <h6 style="background:#e7e7e7; text-align:center;font-size:23px;padding:5px;"><a target="_blank" href="http://localhost/afile/uploads/<?php echo $before->pdf;?>">Latest Uploaded File</a></h6>
  </div>
  </div>
  <div class="row">
  <div class="col s12">
<?php
include 'calender.php';

$calendar = new Calendar();

echo $calendar->show();
?>
</div></div>
</body>
</html>
