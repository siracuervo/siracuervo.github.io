<?php

// Load main includes
include 'config.inc.php';

$totalInstalls = DB::queryFirstField('SELECT count(1) FROM zrom_stats');
$totalInstallsLast24h = DB::queryFirstField('SELECT count(1) FROM zrom_stats WHERE date_register > date_sub(now(), INTERVAL 24 HOUR)');
$totalUpdatesLast24h = DB::queryFirstField('SELECT count(1) FROM zrom_stats WHERE date_last_checking > date_sub(now(), INTERVAL 24 HOUR)');

?>
<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<link href="http://bhcvinton.org/style.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;" />
<meta name="MobileOptimized" content="width" />
<meta name="HandheldFriendly" content="true" />
  <head>
    <meta charset="utf-8">
    <title>AxxionKat Rom Statistics</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding: 40px;
      }
      table tbody tr td:first-child {
        width: 150px;
      }
    </style>
  </head>
  <body>
  <h1 style="font-family:Comic Sans MS"><font size="7"><strong>AxxionKat Rom Statistics</strong></font></h1><br><br>

      <!-- Content -->
      <div class="row">
  <div class="span12">
    <p style="font-family:Comic Sans MS">
      Devices that have not checked in within the last 90 days are periodically removed from the database.  Statistics may be delayed by up to one minute.
    </p>
  </div>
</div>

<div class="row">
  <div class="span12">
    <h2 style="font-family:Comic Sans MS">Total Installs</h2><br>
    <table class="table table-striped table-bordered table-condensed">
      <thead>
        <tr><th>Type</th><th>Total</th></tr>
      </thead>
      <tbody>
        <tr><td>Total Installs</td><td><?=$totalInstalls?></td></tr>
        <tr><td>Installed last 24 Hours</td><td><?=$totalInstallsLast24h?></td></tr>
        <tr><td>Updated last 24 Hours</td><td><?=$totalUpdatesLast24h?></td></tr>
      </tbody>
    </table>
  </div>
</div>
<html>
<head>
  <script type="text/javascript">
function showSpoiler(obj)
    {
    var inner = obj.parentNode.getElementsByTagName("div")[0];
    if (inner.style.display == "none")
        inner.style.display = "";
    else
        inner.style.display = "none";
    }
    </script>
</head>
</div>
<body>
<div class="spoiler">
    <input type="button" onclick="showSpoiler(this);" value="Installs by ROM" />
    <div class="inner" style="display:none;">

    <h2>Installs by ROM</h2>
    <table class="table table-striped table-bordered table-condensed">
      <thead>
        <tr><th>ROM</th><th>Total</th></tr>
      </thead>
      <tbody>
      <?
	  $romList = DB::query('SELECT rom_name, rom_version, COUNT( 1 ) as rom_tot FROM  zrom_stats GROUP BY rom_name, rom_version ORDER BY 2 DESC LIMIT 0 , 50');

      foreach ($romList as $rom) {
      ?>
        <tr><td><?=$rom['rom_name'] . " " . $rom['rom_version'] ?></td><td><?=$rom['rom_tot']?></td></tr>
      <? } ?>
      </tbody>
    </table>
  </div>
    </div>
</div>
</body>
</html>
<html>
<head>
  <script type="text/javascript">
function showSpoiler(obj)
    {
    var inner = obj.parentNode.getElementsByTagName("div")[0];
    if (inner.style.display == "none")
        inner.style.display = "";
    else
        inner.style.display = "none";
    }
    </script>
</head>
</div>
<body>
<div class="spoiler">
    <input type="button" onclick="showSpoiler(this);" value="Installs by Device" />
    <div class="inner" style="display:none;">

    <h2>Installs by Device</h2>
    <table class="table table-striped table-bordered table-condensed">
      <thead>
        <tr><th>Device</th><th>Total</th></tr>
      </thead>
      <tbody>
      <?
	  $romList = DB::query('SELECT device_name, COUNT( 1 ) as rom_tot FROM  zrom_stats GROUP BY device_name ORDER BY 2 DESC LIMIT 0 , 50');

      foreach ($romList as $rom) {
      ?>
        <tr><td><?=$rom['device_name']?></td><td><?=$rom['rom_tot']?></td></tr>
      <? } ?>
      </tbody>
    </table>
  </div>
</div>
    </div>
</div>
</body>
</html>
<html>
<head>
  <script type="text/javascript">
function showSpoiler(obj)
    {
    var inner = obj.parentNode.getElementsByTagName("div")[0];
    if (inner.style.display == "none")
        inner.style.display = "";
    else
        inner.style.display = "none";
    }
    </script>
</head>
</div>
<body>
<div class="spoiler">
    <input type="button" onclick="showSpoiler(this);" value="Installs by Carrier" />
    <div class="inner" style="display:none;">

     <h2>Installs by Carrier</h2>
    <table class="table table-striped table-bordered table-condensed">
      <thead>
        <tr><th>Carrier</th><th>Total</th></tr>
      </thead>
      <tbody>
      <?
          $romList = DB::query('SELECT device_carrier, COUNT( 1 ) as rom_tot FROM  zrom_stats GROUP BY device_carrier ORDER BY 2 DESC LIMIT 0 , 50');
 
      foreach ($romList as $rom) {
      ?>
        <tr><td><?=$rom['device_carrier']?></td><td><?=$rom['rom_tot']?></td></tr>
      <? } ?>
      </tbody>
    </table>
  </div>
    </div>
</div>
</body>
</html>

<html>
<head>
  <script type="text/javascript">
function showSpoiler(obj)
    {
    var inner = obj.parentNode.getElementsByTagName("div")[0];
    if (inner.style.display == "none")
        inner.style.display = "";
    else
        inner.style.display = "none";
    }
    </script>
</head>
</div>
<body>
<div class="spoiler">
    <input type="button" onclick="showSpoiler(this);" value="Installs by Country" />
    <div class="inner" style="display:none;">

 <h2>Installs by Country</h2>
    <table class="table table-striped table-bordered table-condensed">
      <thead>
        <tr><th>Country</th><th>Total</th></tr>
      </thead>
      <tbody>
      <?
          $romList = DB::query('SELECT device_country, COUNT( 1 ) as rom_tot FROM  zrom_stats GROUP BY device_country ORDER BY 2 DESC LIMIT 0 , 50');
 
      foreach ($romList as $rom) {
      ?>
        <tr><td><?=$rom['device_country']?></td><td><?=$rom['rom_tot']?></td></tr>
      <? } ?>
      </tbody>
    </table>
  </div>
    </div>
</div>
</body>
</html>

<html>
<head>
  <script type="text/javascript">
function showSpoiler(obj)
    {
    var inner = obj.parentNode.getElementsByTagName("div")[0];
    if (inner.style.display == "none")
        inner.style.display = "";
    else
        inner.style.display = "none";
    }
    </script>
</head>
</div>
<body>
<div class="spoiler">
    <input type="button" onclick="showSpoiler(this);" value="Installs by Date" />
    <div class="inner" style="display:none;">

 <h2>Installs by Date</h2>
    <table class="table table-striped table-bordered table-condensed">
      <thead>
        <tr><th>Date</th><th>Total</th></tr>
      </thead>
      <tbody>
      <?
          $romList = DB::query('SELECT date_register, COUNT( 1 ) as rom_tot FROM  zrom_stats GROUP BY date_register ORDER BY 2 ASC LIMIT 0 , 50');
 
      foreach ($romList as $rom) {
      ?>
        <tr><td><?=$rom['date_register']?></td><td><?=$rom['rom_tot']?></td></tr>
      <? } ?>
      </tbody>
    </table>
  </div>
 
    </div>
</div>
</body>
</html>

<html>
<head>
  <script type="text/javascript">
function showSpoiler(obj)
    {
    var inner = obj.parentNode.getElementsByTagName("div")[0];
    if (inner.style.display == "none")
        inner.style.display = "";
    else
        inner.style.display = "none";
    }
    </script>
</head>
</div>
<body>
<div class="spoiler">
    <input type="button" onclick="showSpoiler(this);" value="All Installs" />
    <div class="inner" style="display:none;">

<h2>All Installs</h2>
    <table class="table table-striped table-bordered table-condensed">
      <thead>
        <tr><th>Date</th><th>Device</th><th>Version</th><th>Carrier</th><th>Country</th></tr>
      </thead>
      <tbody>
      <?
          $romList = DB::query('SELECT date_register, device_name, rom_version, device_carrier, device_country, COUNT( 1 ) as rom_tot FROM  zrom_stats GROUP BY date_register, device_name, rom_version, device_carrier, device_country ORDER BY 2 ASC LIMIT 0 , 50');
 
      foreach ($romList as $rom) {
      ?>
        <tr><td><?=$rom['date_register']?></td><td><?=$rom['device_name']?></td><td><?=$rom['rom_version']?></td><td><?=$rom['device_carrier']?></td><td><?=$rom['device_country']?></td></tr>
      <? } ?>
      </tbody>
    </table>
  </div>
    </div>
</div>
</body>
</html>


    </div>
	<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
  </body>
</html>
