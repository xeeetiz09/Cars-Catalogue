<div>
<?php

// selecting all data from jobs table...
$jobs = $allQueries->selectAll($pdo, 'jobs');

// extracting all data...
foreach ($jobs as $job){
?>
	<div id = "all_context">

	<!-- shows the available vacancy... -->
	<div style = "float: right; font-size: 14px;"><?php echo 'Available Vacancy: '.$job['vacancy']; ?></div>

	<!-- shows job title... -->
	<div style = "font-size: 22px; text-transform: capitalize;"><?php echo 'Job Title: ' .$job['job_title']; ?></div>

	<!-- shows job description... -->
	<div style = "margin-top: 10px; font-size: 16px;"><?php echo $job['job_description']; ?></div>
	</div>
<?php
}
?>
