<!DOCTYPE html>
<html>
<head>
<title>KEDATANGAN DAN KEBERANGKATAN KAPAL - PELABUHAN PERIKANAN SAMUDERA KENDARI</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/app/css/1520219730.css">
	<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/app/js/jquery.min.js"></script>
	<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/app/js/bootstrap.min.js"></script>
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/app/css/bootstrap_table.css" />
	<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/app/js/jquery.marquee.min.js" type="text/javascript"></script>
</head>

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

<body onload="javascript:setTimeout('location.reload(true);',60000);">
    <div id="wrapper">
	     <div class="marquee"><b>		
	   <?php foreach($himbauan as $u){ ?><?php echo $u->isi ?><?php } ?>		
		</b></div>
        <div id="header">		
            <h1><center><b><u>PELABUHAN PERIKANAN SAMUDERA KENDARI</u></b></center></h1></br>
			&nbsp;<div id="kiri"><b>KEDATANGAN KAPAL (TOTAL <?php echo $this->db->select('tanggal')->where('tanggal=DATE(NOW())')->get('data_kedatangan')->num_rows(); ?> KAPAL)
</b></div><div id="kananhari"><?php
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
		 echo "$hari_indonesia[$hari], $tanggal" ;
		?> <class id='clock'></class>
        	</div>		
		<div id="line"></div>
        <div id="content">
			 <div class="div-tblatas">
			<div class="table-responsive div-tblatas"  >          
				   <?php echo $dt_kedatangan; ?>
			</div>
			</div>
			</br>
			&nbsp;<div id="kiri"><b>KEBERANGKATAN KAPAL (TOTAL <?php echo $this->db->select('tanggal')->where('tanggal=DATE(NOW())')->get('data_keberangkatan')->num_rows(); ?> KAPAL)
			</b></div>		
			<div id="line"></div>
			<div id="content">
			<div class="table-responsive div-tblbawah"  >          
				  <?php echo $dt_keberangkatan; ?>
				</div>
			</div>	
         </div>
		</br>
	
  
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
            tick_table('tblatas',20,0);
			tick_table('tblbawah',20,0);
            $("#btn-fs").click(function() {
                toggleFullScreen();
            });
            push();
        });

var on_proses = false;


//Fungsi Marquee	
$('.marquee').marquee({
    //speed in milliseconds of the marquee
    duration: 20000,
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
