<div class="page-content"> <!-- page content start -->

<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li class="active"><a href="javascript:;">Dashboard</a></li>
    </ol>
</div>
<div class="container-fluid-md">
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-metric panel-metric-sm">
                <div class="panel-body panel-body-primary">
                    <div class="metric-content metric-icon">
                        <div class="value">
                            <?php echo $totalKapal;?> Kapal
                        </div>
                        <div class="icon">
                            <i class="fa fa-anchor"></i>
                        </div>
                        <header>
                            <h4 class="thin">Total Seluruh Kapal</h3>
                        </header>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-metric panel-metric-sm">
                <div class="panel-body panel-body-success">
                    <div class="metric-content metric-icon">
                        <div class="value">
                           <?php echo $Kedatangan;?> Kapal
                        </div>
                        <div class="icon">
                            <i class="fa fa-compress"></i>
                        </div>
                        <header>
                            <h4 class="thin">Total Seluruh Kedatangan</h3>
                        </header>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-metric panel-metric-sm">
                <div class="panel-body panel-body-inverse">
                    <div class="metric-content metric-icon">
                        <div class="value">
                           <?php echo $totalKeberangkatan;?> Kapal
                        </div>
                        <div class="icon">
                            <i class="fa fa-expand"></i>
                        </div>
                        <header>
                            <h4 class="thin">Total Seluruh Keberangkatan</h3>
                        </header>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-metric panel-metric-sm">
                <div class="panel-body panel-body-danger">
                    <div class="metric-content metric-icon">
                        <div class="value">
                            <?php echo number_format($totalIkan);?> Kg
                        </div>
                        <div class="icon">
                            <i class="fa fa-truck"></i>
                        </div>
                        <header>
                            <h4 class="thin">Total Ikan Bulan Ini</h3>
                        </header>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
    <div class="panel">
		<div class="panel-body  padding-sm-vertical">
        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
					<script language = "JavaScript">
					Highcharts.chart('container', {
						chart: {
							type: 'column'
						},
						title: {
							text: 'GRAFIK KEDATANGAN DAN KEBERANGKATAN KAPAL TAHUN <?php echo date('Y') ?>'
						},
						subtitle: {
							text: 'Source:  Sistem Infomasi Aktivitas Kapal Perikanan (SIKAP) '
						},
						xAxis: {
							categories: [
								'Jan',
								'Feb',
								'Mar',
								'Apr',
								'Mei',
								'Jun',
								'Jul',
								'Ags',
								'Sep',
								'Okt',
								'Nov',
								'Des'
							],
							crosshair: true
						},
						yAxis: {
							min: 0,
							title: {
								text: 'Jumlah Kapal'
							}
						},
						tooltip: {
							headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
							pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name} :  </td>' +
								'<td style="padding:0"><b>  {point.y:.f} Kapal</b></td></tr>',
							footerFormat: '</table>',
							shared: true,
							useHTML: true
						},
						plotOptions: {
							column: {
								pointPadding: 0.2,
								borderWidth: 0
							}
						},
						series: [{
							name: 'Kedatangan',
							data: <?php echo json_encode($grafik); ?>

						}, {
							name: 'Keberangkatan',
							data: <?php echo json_encode($berangkat); ?>

						}]
					});
			</script>
			</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4">
                            <div class="mini-chart">
                                <div id="mini-chart-1" class="chart text-center" style="width: 44px;"><i class="fa fa-line-chart"></i></div>
                                <div class="chart-details" style="width: 79px;">
                                    <div class="chart-name">Ikan Mutu I</div>
                                    <div class="chart-value">2,655,980</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 text-center">
                            <div class="mini-chart text-left">
                                <div id="mini-chart-2" class="chart" style="width: 44px;"></div>
                                <div class="chart-details" style="width: 79px;">
                                    <div class="chart-name">Ikan Mutu II</div>
                                    <div class="chart-value">1,431,250</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 text-right">
                            <div class="mini-chart text-left">
                                <div id="mini-chart-3" class="chart" style="width: 44px;"></div>
                                <div class="chart-details" style="width: 79px;">
                                    <div class="chart-name">Ikan Mutu III</div>
                                    <div class="chart-value">261,885</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div> <!-- page content end -->


