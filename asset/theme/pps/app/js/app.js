jQuery(function ($) {
    'use strict';
    if ($('#mini-chart-sidebar-1')) {
        $('#mini-chart-sidebar-1').sparkline([0, 6, 8, 3, 6, 4, 1, 7, 5, 3, 2, 6, 5], {
            type: 'bar',
            height: '30px',
            barColor: '#2478BB'
        });
    }
    if ($('#mini-chart-sidebar-2')) {
        $('#mini-chart-sidebar-2').sparkline([3, 6, 12, 18, 20, 14, 7, 15, 14, 10, 4, 7, 10], {
            type: 'bar',
            height: '30px',
            barColor: '#B4803F'
        });
    }
    if ($('#mini-chart-sidebar-3')) {
        $('#mini-chart-sidebar-3').sparkline([8, 15, 15, 18, 7, 12, 6, 5, 11, 3, 10, 19, 15], {
            type: 'bar',
            height: '30px',
            barColor: '#5CB85C'
        });
    }
	if ($('#mini-chart-sidebar-4')) {
        $('#mini-chart-sidebar-4').sparkline([10, 8, 10, 11, 7, 9, 6, 8, 10, 7, 6, 8, 9], {
            type: 'bar',
            height: '30px',
            barColor: '#D9534F'
        });
    }
});
