<!DOCTYPE html>
<html lang="en" ng-app="main">
	<?php $this->includeFile("_head.php"); ?>
	<style>
		<?php include("tracking.css"); ?>
	</style>
	<body ng-controller="MainController">
		<?php 
			$this->includeFile("topbar.php");
		?>
		<main class="main" id="content" ng-cloak>
        		<?php echo $content; ?>				
    	</main>		
	</body>
</html>