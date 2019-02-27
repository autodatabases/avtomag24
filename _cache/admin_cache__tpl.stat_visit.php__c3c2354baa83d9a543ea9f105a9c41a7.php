<?
global $_SYSTEM, $__BUFFER;

$__BUFFER->addScript('/_syslib/chosen/chosen.min.js');
$__BUFFER->addScript('/_syslib/flotr/flotr2.min.js');

$__BUFFER->addStyle('/_syslib/chosen/chosen.css');
$__BUFFER->addStyle('/_syslib/flotr/flotr.css');

?>

<div class="formRows">

	<div id="chartRequest" style="height: 350px;width: 97%;margin: 20px 0;"></div>

	<div id="chartLatency" style="height: 350px;width: 97%;margin: 20px 0;"></div>

	<script>

		var
			requestData = <?=json_encode($dataCnt)?>,
			latencyData = <?=json_encode($dataUcnt)?>,
			data = [],
			dataL = [],

			options,
			graph,
			i, x, o,
		containerRequest = $('chartRequest');
		containerLatency = $('chartLatency');

		options = {
			lines: {
				show: true
			},
			points: {
				show: true
			},
			selection: {
				mode: 'x'
			},
			HtmlText: false,
			title: '<?=tr('Общая статистика посещений сайта', 'search_stat')?>',
			xaxis: {
				mode: 'time',
				title: '<?=tr('Дата', 'Common')?>',
				timeFormat: '%d.%m.%y',
				timeMode: 'local',
				tickFormatter: function (e) {
					var date = new Date().parse(e);
					return date.format('%d.%m.%y');
				}
			},
			yaxis: {
				title: '<?=tr('Количество обращений', 'search_stat')?>'
			},
			mouse: {
				track: true,
				relative: true,
				position: 'ne',
				trackFormatter: function (obj) {
					var date = new Date().parse(obj.x);
					var line = '<?=tr('обращений', 'search_stat')?>: ' + obj.y.toInt() + '<br>' + date.format(Locale.get('Date.shortDate'));
					return line;
				}
			}
		};

		optionsLatency = {
			lines: {
				show: true
			},
			points: {
				show: true
			},
			selection: {
				mode: 'x'
			},
			HtmlText: false,
			title: '<?=tr('Статистика уникальных посетителей', 'search_stat')?>',
			xaxis: {
				mode: 'time',
				title: '<?=tr('Дата', 'Common')?>',
				timeFormat: '%d.%m.%y',
				timeMode: 'local',
				tickFormatter: function (e) {
					var date = new Date().parse(e);
					return date.format('%d.%m.%y');
				}
			},
			yaxis: {
				title: '<?=tr('Количество уникальных пользователей', 'search_stat')?>'
			},
			mouse: {
				track: true,
				relative: true,
				position: 'ne',
				trackFormatter: function (obj) {
					var date = new Date().parse(obj.x);
					var line = '<?=tr('уникальных пользователей', 'search_stat')?>: ' + obj.y.toInt() + '<br>' + date.format(Locale.get('Date.shortDate'));
					return line;
				}
			}
		};

		for (var date in requestData) {
			time = new Date(date).getTime();
			data.push([time, requestData[date].toInt()]);
		}

		for (var date in latencyData) {
			time = new Date(date).getTime();
			dataL.push([time, latencyData[date].toInt()]);
		}

		function drawGraph(opts) {

			o = Flotr._.extend(Flotr._.clone(options), opts || {});

			return Flotr.draw(
				containerRequest,
				[data],
				o
			);

		}

		function drawGraphLatency(opts) {

			o = Flotr._.extend(Flotr._.clone(optionsLatency), opts || {});

			return Flotr.draw(
				containerLatency,
				[dataL],
				o
			);

		}

		graph = drawGraph();
		graphLatency = drawGraphLatency();

		Flotr.EventAdapter.observe(containerRequest, 'flotr:select', function (area) {

			graph = drawGraph({
				xaxis: {
					min: area.x1,
					max: area.x2,
					mode: 'time',
					timeFormat: '%d.%m.%y'
				},
				yaxis: {
					min: area.y1,
					max: area.y2
				}
			});
		});

		Flotr.EventAdapter.observe(containerRequest, 'flotr:click', function () {
			graph = drawGraph();
		});

		Flotr.EventAdapter.observe(containerLatency, 'flotr:select', function (area) {

			graph = drawGraphLatency({
				xaxis: {
					min: area.x1,
					max: area.x2,
					mode: 'time',
					timeFormat: '%d.%m.%y'
				},
				yaxis: {
					min: area.y1,
					max: area.y2
				}
			});

		});

		Flotr.EventAdapter.observe(containerLatency, 'flotr:click', function () {
			graph = drawGraphLatency();
		});

	</script>

</div>
