<?php
$reps = 100;
$base = 'http://localhost/ss-laravel';
$urls = ['ss32','laravel5/public','ss32-cms'];
$routes = ['api/v1','api/v1/bird/1','api/v1/birds'];
$out = fopen('php://stdout', 'w');
fputcsv($out, ['site','route','rep','ms']);

foreach ($urls as $url) {
	$urlTimes = [];

	foreach ($routes as $route) {
		$routeTimes = [];

		for ($i = 0; $i < $reps; $i++) {
			$start = microtime(true);
			$contents = file_get_contents($base . '/' . $url . '/' . $route);
			$end = microtime(true);

			$time = ($end - $start) * 1000.0;

			if ($time < 50 || $time > 200) {
				// flag it up if it's suspiciously out of range
				fputcsv($out, [$url, $route, $i+1, $time, 'OUT OF RANGE: ' . $contents]);
				if ($time < 30 || $time > 1000) {
					// don't include it in the average if it's obviously errant
					continue;
				}
			}
			$routeTimes[] = $time;
			$urlTimes[] = $time;
		}

		fputcsv($out, [$url, $route, 'AVG', array_sum($routeTimes) / count($routeTimes)]);
	}

	if (count($routes) > 1) {
		fputcsv($out, [$url, 'AVG', 'AVG', array_sum($urlTimes) / count($urlTimes)]);
	}
}
