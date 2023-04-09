
//Change Car 
$(document).on('change','.changecar',function(){	
	var idcar=$(this).val();
	$.ajax({
            url: "changecar",
            dataType: "JSON",
            type: "POST",
            data: { id: idcar },
            success: function (data) {
					$('.onchangecar').val(data.file);
			}
	  });
});


//buying  
$(document).on('blur','.buying',function(){

	this.value = parseFloat(this.value.replace(/,/g, ""))
	.toFixed(2)
	.toString()
	.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	

});

//selling  
$(document).on('blur','.selling',function(){	
	this.value = parseFloat(this.value.replace(/,/g, ""))
	.toFixed(2)
	.toString()
	.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	var valuenya=this.value;

	$('.totalselling').val(valuenya);

});


//buying  
$(document).on('blur','.Currency',function(){

	this.value = parseFloat(this.value.replace(/,/g, ""))
	.toFixed(2)
	.toString()
	.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	

});


//Change SO 
$(document).on('click','.pilihso',function(){	
	var pilihso=$(this).val();

	if(pilihso=='NewSO'){
	
	

	$('.OrderOldnya').hide();
	$.ajax({
			url: "pilihso",
			dataType: "JSON",
			type: "POST",
			data: { id: pilihso },
			success: function (data) {
					$('.salesorder').html(data.file);
					$('.NoFA').html(data.NoFA);
			}
	  });
	}else{
	   $('.salesorder').html('');
	   $('.OrderOldnya').show();
	   
	}
});

//validation
$(".ok-btn-add-app").click(function () {
	console.log('app');
	$( ".Formapprove" ).trigger( "submit" );

});


$(".ok-btn-add-fa").click(function () {
	console.log('ss');
	$( ".FormProfile" ).trigger( "submit" );

});

$(".ok-btn-add-group").click(function () {
	console.log('ss');
	$( ".FormGroupProfile" ).trigger( "submit" );

});

$(".AddProfile").click(function () {

	   	var valid = [];
	   	valid.push(validasiinput("imgInp", "File"));
	   	valid.push(validasiinput("name", "Nama Penilai"));
	   	valid.push(validasiinput("position","position"));
		valid.push(validasiselect("groupprofile","groupprofile"));
		valid.push(validasiinput("email","email"));
		valid.push(validasiinput("username","username"));
		valid.push(validasiinput("password","password"));
		valid.push(validasiinput("address","address"));
		valid.push(validasiinput("city","city"));
		valid.push(validasiinput("province","province"));
		valid.push(validasiinput("country","country"));
		valid.push(validasiinput("phone","phone"));
		valid.push(validasiinput("bbm","bbm"));
		valid.push(validasiinput("yahoo","yahoo"));

		   if (jQuery.inArray("ada", valid) !== -1) {
		   		//console.log(valid);
	   		  $(".b-close").trigger("click");
	   		  $("html, body").animate({ scrollTop: $('.FormProfile').offset().top - 20 }, "slow");
		      return false;
		   }

		
		$( ".FormProfile" ).trigger( "submit" );

});

function validasiinput(input, variable) {
            $("#" + input + "").removeClass('input-validation-error');
            $("#" + input + "").parent().find('div.myErrors').html("");
            valid = "";
            if ($("#" + input + "").val() == null || $("#" + input + "").val() == "") {
                valid = "ada";
                $("#" + input + "").parent().find('div.myErrors').html("<label style='color:red'>" + variable + " Harus diisi !</label>");
                $("#" + input + "").addClass('input-validation-error');
            }
            if (valid == "ada") { return valid; }
        }
function validasiselect(input, variable) {
            $("#" + input + "").removeClass('input-validation-error');
            $("#" + input + "").parent().find('div.myErrors').html("");
            valid = "";
            if ($("#" + input + " option:selected").val() == null || $("#" + input + " option:selected").val() == "") {
                valid = "ada";
                $("#" + input + "").parent().find('div.myErrors').html("<label style='color:red'>" + variable + " Harus diisi !</label>");
                $("#" + input + "").addClass('input-validation-error');
            }
            if (valid == "ada") { return valid; }
        }

function validasitanggalpenilaian(input, variable) {
           	var today = new Date(); var dd = today.getDate();var mm = today.getMonth() + 1; var yyyy = today.getFullYear();
            if (dd < 10) { dd = '0' + dd}if (mm < 10) { mm = '0' + mm}today = dd + '/' + mm + '/' + yyyy;
            if ($("#" + input + "").val() == "" || $("#" + input + "").val() == null || $("#" + input + "").val() > today) {
                valid = "ada";
                $("#" + input + "").parent().find('div.myErrors').html("<label style='color:red'>" + variable + " Harus diisi !<br>Dan Tanggal Penilaian Tidak Boleh Lebih Besar Dari Hari Ini !</label>");
                $("#" + input + "").addClass('input-validation-error');
            }
            console.log($("#"+input+"").val());
            console.log(today);

            if (valid == "ada") { return valid; }
         
        }


//Change No Faktur SJ 
$(document).on('change','.NofakturSj',function(){	
	console.log('ss');
	var Nofaktur=$(this).val();
	$.ajax({
			url: "../GetDataFaktur",
			dataType: "JSON",
			type: "POST",
			data: { id: Nofaktur },
			success: function (data) {
					$('.Client').val(data.DataClient);
					$('.Mobil').val(data.DataMobil);
					$('.Hari').val(data.Hari);
					
			}
	  });
	
});



//Change No SO INVOCE
$(document).on('change','.NoSoINV',function(){	
	
	var Nofaktur=$(this).val();
	$.ajax({
			url: "GetDataSO",
			dataType: "JSON",
			type: "POST",
			data: { id: Nofaktur },
			success: function (data) {
				    //console.log(data.DataMobil);
					$('#client').val(data.DataClient);
					$('#IdClient').val(data.IdClient);
					var _Str="";
					var no=1;
					var TotalSell=0;
					var array=0;
					$.each(data.ListFaktur, function (i, e) {
                           //console.log(e.NamaMobil);
                            no=no++;
                            array=array++;
                          	_Str=_Str+"<tr>";
                          	_Str=_Str+"<td>"+no+"</td>";
                           	_Str=_Str+'<td><div class="controls">';
						   	_Str=_Str+'<input type="text" class="form-control" name="x['+array+'][NamaMobil]" placeholder="auto.." value="'+e.NamaMobil+'" readonly>';
							_Str=_Str+'</div></td>';
							_Str=_Str+'<td><div class="controls">';
							_Str=_Str+'<input type="text" class="form-control" name="x['+array+'][vendors]" placeholder="auto.." value="'+e.vendors+'"readonly>';
							_Str=_Str+'</div></td>';
							_Str=_Str+'<td><div class="controls">';
							_Str=_Str+'<input type="text" class="form-control" name="x['+array+'][TglSewa]" data-rel="datepicker" value="'+e.TglSewa+'" id="date-sewa" placeholder="auto.." readonly>';
							_Str=_Str+'</div></td>';
							_Str=_Str+'<td><div class="controls">';
							_Str=_Str+'<input type="text" class="form-control" name="x['+array+'][Hari]"  placeholder="auto.." value="'+e.Hari+'" readonly>';
							_Str=_Str+'</div></td>';
							_Str=_Str+'<td><div class="controls">';
							_Str=_Str+'<input type="text" class="form-control" name="x['+array+'][Tujuan]" placeholder="auto.." value="'+e.Tujuan+'" readonly>';
							_Str=_Str+'</div></td>';
							_Str=_Str+'<td><div class="controls">';
							_Str=_Str+'<input type="text" class="form-control" name="x['+array+'][buying]" placeholder="auto.." value="'+e.buying+'" readonly>';
							_Str=_Str+'</div></td>';
							_Str=_Str+'<td><div class="controls">';
							_Str=_Str+'<input type="text" class="form-control" name="x['+array+'][selling]" placeholder="auto.." value="'+e.selling+'" readonly>';
							_Str=_Str+'</div></td>';
							_Str=_Str+'</tr>';

							var bil = e.selling;
							TotalSell=parseFloat(TotalSell)+parseFloat(bil);



						});

							_Str=_Str+'<tr>';
							_Str=_Str+'<td colspan="7" align="right"><strong>Total Selling</strong></td>';
							_Str=_Str+'<td><div class="controls">';
							_Str=_Str+'<input type="text" class="form-control TotalSell" name="TotalSell" value="'+TotalSell+'" placeholder="auto.." disabled="disabled">';
							_Str=_Str+'</div></td>';
							_Str=_Str+'</tr>';
							_Str=_Str+'<tr>';
							_Str=_Str+'<td colspan="7" align="right"><strong>Down Payment</strong></td>';
							_Str=_Str+'<td><div class="controls">';
							_Str=_Str+'<input type="text" class="form-control DownPayment" name="DownPayment" placeholder="DP">';
							_Str=_Str+'</div></td>';
							_Str=_Str+'</tr>';
							_Str=_Str+'<tr>';
							_Str=_Str+'<td colspan="7" align="right"><strong>TOTAL</strong></td>';
							_Str=_Str+'<td><div class="controls">';
							_Str=_Str+'<input type="text" class="form-control totalkeseluruhan" name="totalkeseluruhan"  placeholder="TOTAL">';
							_Str=_Str+'</div></td>';
							_Str=_Str+'</tr>';
							_Str=_Str+'<tr>';
							_Str=_Str+'<td colspan="2" align="right"><strong>Says</strong></td>';
							_Str=_Str+'<td colspan="6"><div class="controls">';
							_Str=_Str+'<input type="text" class="form-control" name="TERBILANG"  placeholder="TERBILANG">';
							_Str=_Str+'</div></td>';
							_Str=_Str+'</tr>';

						DownPayment();
						TotalDP();

						$('.TableInject').html(_Str);
					
			}
	  });
	
});

function TotalDP(){

	$(document).on('focusout','.DownPayment',function(){	
		console.log('masuk');
		var totalsell=$('.TotalSell').val();
		var DownPayment=$('.DownPayment').val();
		var Hasil=0;
		Hasil=parseFloat(totalsell)+parseFloat(DownPayment);
		$('.totalkeseluruhan').val(Hasil);


});

}



function DownPayment(){
	$(document).on('blur','.DownPaymenx',function(){
		this.value = parseFloat(this.value.replace(/,/g, ""))
		.toFixed(2)
		.toString()
		.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	});
}






//Change No Faktur SJ 
$(document).on('click','.roleuser',function(){	

	console.log($(this).val());
	
	if($(this).val()=="user"){
		$(".groupdetail").show();
	}

	else if($(this).val()=="admin"){
		$(".groupdetail").hide();
	}
	
});


//Change Time Mulai 
$(document).on('change','.timeakhir',function(){	

			var valuestart = new Date("01/01/2007 "+$('.timemulai').val()+':00');
			var valuestop =  new Date("01/01/2007 "+$('.timeakhir').val()+':00');
			seconds = Math.floor((valuestop - (valuestart))/1000);
        	minutes = Math.floor(seconds/60);
        	hours = Math.floor(minutes/60);
        	days = Math.floor(hours/24);
        	hours = hours-(days*24);
	        minutes = minutes-(days*24*60)-(hours*60);
	     	
			$('.timetotal').val(hours+':'+minutes);

	  });


$('.checkallrole').on('click', function () {
  
        $('input:checkbox').prop('checked', true);
        $(this).html('Select All');
    
});
$('.deselectall').on('click', function () {
    
        $('input:checkbox').prop('checked', false);
        $(this).html('Deselect All');
    
});


function callLoader() {
        $(".updateMsg").addClass("alert-warning");
        $(".updateMsg").removeClass("alert-success");
        $(".updateMsg").show();
        $(".updateMsgnya").html("proses data..");
    }



 $(".SecPass").on("click", function () {

 	 	var pass = $("#pass-security").val();
       
        $.ajax({
            url: "/bahana/AjaxHelper",
            beforeSend: function () {
                callLoader();
            },
            type: "POST",
            dataType: "JSON",
            processData: false,
            contentType: false,   // tell jQuery not to set contentType
            error: function (data) {
                uploadlabel = 1;
                $(".updateMsgnya").html("Password required");
                

            },
            data: {pass:pass}

        }).done(function (data) {
			$(".updateMsgnya").html("Berhasil verifikasi");
            

        });

 });