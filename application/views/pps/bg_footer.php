<!-- FOOTER START -->
        </div>

        <script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/assets/bs3/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/assets/plugins/jquery-navgoco/jquery.navgoco.js"></script>
        <script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/js/main.js"></script>
		<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/js/content.js"></script>

        <!--[if lt IE 9]>
        <script src="dist/assets/plugins/flot/excanvas.min.js"></script>
        <![endif]-->
        <script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>
        <script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/app/js/app.js"></script>

        <!-- for modal popup -->
        <script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/assets/plugins/jquery-bpopup/jquery.bpopup.min.js"></script>
        <!-- -->

        <script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/assets/plugins/jquery-datatables/js/jquery.dataTables.js"></script>
        <script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/assets/plugins/jquery-datatables/js/dataTables.tableTools.js"></script>
        <script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/assets/plugins/jquery-datatables/js/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/app/js/tables-data-tables.js"></script>

        <!-- <script src="dist/assets/libs/jquery-ui/minified/jquery-ui.min.js"></script>  -->
       <!-- dist/assets/plugins/jquery-select2/select2.min.js"></script> -->
		<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/assets/plugins/jquery-select2/select2.min.js"></script>

		<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/assets/plugins/jquery-chosen/chosen.jquery.min.js"></script>
		<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
		<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
		<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/js/jquery.validate.js"></script>
 		<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/app/js/forms-advanced-components.js"></script>



        <!-- for grafik n map dashboard -->

        <script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/assets/plugins/jquery-jvectormap/maps/world_mill_en.js"></script>

        <!--[if gte IE 9]>-->
        <script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/assets/plugins/rickshaw/js/vendor/d3.v3.js"></script>
        <script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/assets/plugins/rickshaw/rickshaw.min.js"></script>
        <!--<![endif]-->
 		<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/assets/plugins/raphael/raphael-min.js"></script>
        <script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/assets/plugins/morris/morris.min.js"></script>


		<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/dist/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>

        <link href="<?php echo base_url('asset/plugins/daterangepicker/daterangepicker.css'); ?>" rel="stylesheet" media="all">
        <script src="<?php echo base_url('asset/plugins/daterangepicker/moment.min.js'); ?>"></script>
        <script src="<?php echo base_url('asset/plugins/daterangepicker/daterangepicker.js'); ?>"></script>


        <script type="text/javascript">
        // $('#filterdate').daterangepicker({
        //       autoUpdateInput: true,
        //       locale: {
        //           format: 'YYYY-MM-DD'
        //       }
        //   });

          $( function() {
           $( "#filterawal" ).datepicker({
                 format: "yyyy-mm-dd",
                 autoclose: true
             }
             );
          } );

          $( function() {
           $( "#filterakhir" ).datepicker({
                 format: "yyyy-mm-dd",
                 autoclose: true
             }
             );
          } );
        </script>

        <script type="text/javascript">
          $(document).ready(function(){
            $('.search-filter').click(function(){
              var dataForm = {
                  'tgl1'      :$('#filterawal').val(),
                  'tgl2'      :$('#filterakhir').val()
                };
              var url = "<?php echo base_url('report/ExportKedatangan/')?>";
              $.ajax({
                url: url,
                type: 'POST',
                data: dataForm,
                success: function(data) {
                  $('.ajax').html(data);
                }
              });

            });
          })

          $(document).ready(function(){
            $('.search-filter3').click(function(){
              var dataForm = {
                  'tgl1'      :$('#filterawal').val(),
                  'tgl2'      :$('#filterakhir').val()
                };
              var url = "<?php echo base_url('report/ExportHarian/')?>";
              $.ajax({
                url: url,
                type: 'POST',
                data: dataForm,
                success: function(data) {
                  $('.ajax').html(data);
                }
              });

            });
          })

          $(document).ready(function(){
            $('.search-filter2').click(function(){
              var dataForm = {
                'tgl1'      :$('#filterawal').val(),
                'tgl2'      :$('#filterakhir').val()
                };
              var url = "<?php echo base_url('report/ExportKeberangkatan2/')?>";
              $.ajax({
                url: url,
                type: 'POST',
                data: dataForm,
                success: function(data) {
                  $('.ajax').html(data);
                }
              });

            });
          })

          $('#filterdate').on('apply.daterangepicker', function(ev, picker) {
              $(this).val(picker.startDate.format('YYYY-MM-DD') + ' -- ' + picker.endDate.format('YYYY-MM-DD'));
          });

          $('#filterdate').on('cancel.daterangepicker', function(ev, picker) {
              $(this).val(picker.startDate.format('YYYY-MM-DD') + ' -- ' + picker.endDate.format('YYYY-MM-DD'));
          });
        </script>

		<script>

		$('.vendoradd').click(function() {
			$('#button-pop').trigger( "click" );
		});

	   $( function() {
	    $( "#datepicker" ).datepicker({
		        format: "dd/mm/yyyy",
		        autoclose: true
		    }
	    	);
	   } );


     $("#tahun").datepicker( {
        format: "yyyy",
        startView: "years", 
        minViewMode: "years"
    });


		$('.FormProfile').validate();

		$('.settingcompany1').click(function() {
			$('.pop-up').modal('toggle');
			$(".pop-up").modal().hide()
			$('.FormProfile').validate();
			$('.FormProfile').submit();
		});

		$('.settingcompany2').click(function() {
			$('.pop-up').modal('toggle');
			$(".pop-up").modal().hide()
			$('.FormProfile2').validate();
			$('.FormProfile2').submit();
		});


		$('.settingcompany3').click(function() {
			$('.pop-up').modal('toggle');
			$(".pop-up").modal().hide()
			$('.FormProfile2').validate();
			$('.FormProfile2').submit();
		});


		$('.editprofile').click(function() {
			$('.pop-up').modal('toggle');
			$(".pop-up").modal().hide()
			$('.FormProfile').validate();
			$('.FormProfile').submit();
		});



		$("#imgInp").change(function(){
			readURL(this);
		});

		function readURL(input) {

			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#blah').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}


		</script>

		 <!-- Javascript -->
     <script type="text/javascript">
      $(window).load(function() { // makes sure the whole site is loaded
      $("#status").fadeOut(); // will first fade out the loading animation
      $("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.
      })
     </script>

    </body>
</html>

<!-- FOOTER END -->
