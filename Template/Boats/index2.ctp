<?php
		$this->Html->script('http://maps.google.com/maps/api/js?key=[enter key here]',['block'=>true]); 
		$this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js',['block'=>true]); 
		$this->Html->script('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js',['block'=>true]); 
		$this->Html->script('test1',['block'=>true]); 
?>
<?= $this->start('sidebar');?>
		<div id="map"  style="width:100%; height:800px;"></div>
		<div id="latlon" style="font-size:10px"></div>
		<div id="test1" style="width:100%; height:100px;"></div>
<?php $this->end(); ?>		



