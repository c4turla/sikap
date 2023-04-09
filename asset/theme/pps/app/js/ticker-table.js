/*
 * ticker-table - developed by Babar
 */
var isPause = 0;

$('.tbl-row').mouseenter(function(){
	isPause = 1;
});
$('.tbl-row').mouseleave(function(){
	isPause = 0;
});

function tick_table(id,t_view,second){
	ClearTickTable('move');
	element = '#'+id+' .tbl-row';
	total = $(element).length;
	init(id,element,t_view);
	if(parseInt(second) > 0){
		move(id,element,second,t_view,total);
	}
}
function init(id,element,t_view){
	i=1;
	$(element).each(function(){
		$(this).attr('id','').removeClass('sembunyi').removeClass('aktif');
		$(this).attr('id',id+'-'+i);
		if(i > t_view)$(this).addClass('sembunyi').hide();
		else $(this).addClass('aktif').show();
		i++;
	});
	$(element+' td').attr('height','18px');
}
function move(id,element,second,t_view,total){
	var move = setInterval(function(){
		if(isPause == 0){
			first = $(element+'.aktif').first().attr('id');
			last = $(element+'.aktif').last().attr('id');
			next = $('#'+last).next('.tbl-row').attr('id');
			// console.log(next);
			if(last != id+'-'+total){
				$('#'+first).hide().removeClass('aktif').addClass('sembunyi');
				$('#'+next).show().removeClass('sembunyi').addClass('aktif');
			}else{
				init(id,element,t_view);
			}
		}
	}, second);
}
function ClearTickTable(name) {
    // for (var i = 1; i < 99999; i++)
        window.clearInterval(name);
}