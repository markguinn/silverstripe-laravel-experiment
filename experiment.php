<?php
$reps = 100;
$base = 'http://localhost/ss-laravel';
$urls = ['ss32','laravel5/public'];
$routes = ['api/v1'];
$out = fopen('php://stdout', 'w');
fputcsv($out, ['site','route','rep','ms']);

foreach ($urls as $url) {
	$urlTimes = [];

	foreach ($routes as $route) {
		$routeTimes = [];

		for ($i = 0; $i < $reps; $i++) {
			$start = microtime(true);
			file_get_contents($base . '/' . $url . '/' . $route);
			$end = microtime(true);

			$time = ($end - $start) * 1000.0;

			fputcsv($out, [$url, $route, $i+1, $time]);
			$routeTimes[] = $time;
			$urlTimes[] = $time;
		}

		fputcsv($out, [$url, $route, 'AVG', array_sum($routeTimes) / $reps]);
	}

	if (count($routes) > 1) {
		fputcsv($out, [$url, 'AVG', 'AVG', array_sum($urlTimes) / ($reps * count($routes))]);
	}
}
