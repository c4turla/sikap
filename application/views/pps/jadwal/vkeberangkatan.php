<!DOCTYPE html>
<html>
<head>
<title>KEBERANGKATAN KAPAL - PELABUHAN PERIKANAN SAMUDERA KENDARI</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/app/css/1520219730.css">
	<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/app/js/jquery.min.js"></script>
	<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/app/js/bootstrap.min.js"></script>
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/app/css/bootstrap_table.css" />
	<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/app/js/jquery.marquee.min.js" type="text/javascript"></script>
</head>
<script type="text/javascript">
function toggleFullScreen() {
  if (!document.fullscreenElement) {
      document.documentElement.requestFullscreen();
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen(); 
    }
  }
}
</script>
<script type="text/javascript">
<!--
function startTime() {
    var today=new Date(),
        curr_hour=today.getHours(),
        curr_min=today.getMinutes(),
        curr_sec=today.getSeconds();
 curr_hour=checkTime(curr_hour);
    curr_min=checkTime(curr_min);
    curr_sec=checkTime(curr_sec);
    document.getElementById('clock').innerHTML=curr_hour+":"+curr_min+":"+curr_sec;
}
function checkTime(i) {
    if (i<10) {
        i="0" + i;
    }
    return i;
}
setInterval(startTime, 500);
//-->
</script>

<body>
    <div id="wrapper">
	<div class="marquee">SELAMAT DATANG DI PELABUHAN PERIKANAN SAMUDERA KENDARI</div>
        <div id="header">		
             <h1><center><b><u><div id="logopps">PELABUHAN PERIKANAN SAMUDERA KENDARI</u></b></center></h1></br>
			&nbsp;<div id="kiri"><b>KEBERANGKATAN KAPAL</b></div><div id="kanan"><b><div id='clock'></div></b></div>
        </div>
		
		<div id="line"></div>
		<div id="content">
			 <div class="div-tblatas">
			<div class="table-responsive div-tblatas"  >          
				  <?php echo $dt_retrieve; ?>
			</div>			
				</div>
			</div>

        
		<?php
		 $tanggal = Date("d-M-Y");
		 $hari   = date('l', microtime($tanggal));
		 $hari_indonesia = array(
			'Monday'  => 'Senin',
			'Tuesday'  => 'Selasa',
			'Wednesday' => 'Rabu',
			'Thursday' => 'Kamis',
			'Friday' => 'Jumat',
			'Saturday' => 'Sabtu',
			'Sunday' => 'Minggu');
		 echo "<div id='footer'><center><b>Hari Ini : $hari_indonesia[$hari] $tanggal </b></center></div> " ;
		?>
         <div class="marquee"><h4><?php foreach($himbauan as $u){ ?><?php echo $u->isi ?><?php } ?>		</h4></div>
		<div id='footer'></div>
		</div>
    </div>
</body>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/app/js/ticker-table.js" type="text/javascript"></script>

<script type="text/javascript">

$(function () {
$('[data-toggle="tooltip"]').tooltip()
      })
        $(document).ready(function(){
            tick_table('tblatas',50,0);
            $("#btn-fs").click(function() {
                toggleFullScreen();
            });
            push();
        });

var on_proses = false;


//Fungsi Marquee	
$('.marquee').marquee({
    //speed in milliseconds of the marquee
    duration: 10000,
    //gap in pixels between the tickers
    gap: 500,
    //time in milliseconds before the marquee will start animating
    delayBeforeStart: 0,
    //'left' or 'right'
    direction: 'left',
    //true or false - should the marquee be duplicated to show an effect of continues flow
    duplicated: true
});

</script>


<script type="text/javascript">
$(window).resize(function() {
    if((window.fullScreen) || (window.innerWidth == screen.width && window.innerHeight == screen.height)) {
        $("html").css("overflow", "hidden");
    } else {
        $("html").css("overflow", "auto");
    }
});

$(document).ready(function(){
    $(window).resize();
    // trigger the function when the page loads
    // if you have another $(document).ready(), simply add this line to it
});
</script>

<script type="text/javascript">
    $(window).load(function() {
        $(".loader").fadeOut("slow");
    });
</script>

</html>
