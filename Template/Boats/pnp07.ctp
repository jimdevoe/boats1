<?php
$this->extend('pnp07a');
?>

		
<?= $this->start('map1');?>
	<div id="tabs1">
<!--		<ul>
			<li><a href="#tab-map1"><span>map</span></a></li> 
			<li><a href="#tab-details1"><span>details</span></a></li> 
		</ul> -->
			<div id="tab-map1" > 
			<div id="map1">
			</div>
		</div>
<!--		<div id="tab-details1" class="lh-tab">
			<div id="places" class="info"></div>
		</div> -->
		<p>
		  <button class="btn btn-primary btn-md" data-toggle="collapse" href="#collapseLatLon1" aria-expanded="true" aria-controls="collapseLatLon1">
			LatLon Table
		  </button>
		</p>
		<div class="collapse" id="collapseLatLon1">
			<div id="map1latlonTable"></div>
		</div>
	</div>

<?php $this->end(); ?>		

<?= $this->start('map2');?>
	<div id="tabs2" align="center">
<!--		<ul> -->
<!--			<li><a href="#tab-map2"><span>map</span></a></li> -->
<!--			<li><a href="#tab-details2"><span>details</span></a></li> -->
<!--			<a href="#" id="placename" class="brand" align="right">searching...</a> -->
<!--		</ul>-->
<!--		<div id="tab-map2" > -->
<!--			<div id="map2_buttons"></div> -->
			<div id="map2"></div>
<!--		</div> 
		<div id="tab-details2" class="rh-tab">
			<div id="place2"></div>
		</div>-->
		<p>
		  <button class="btn btn-primary btn-md" data-toggle="collapse" href="#collapseLatLon2" aria-expanded="true" aria-controls="collapseLatLon2">
			LatLon Table
		  </button>
		</p>
		<div class="collapse" id="collapseLatLon2">
			<div id="map2latlonTable"></div>
		</div>
	</div>
<?php $this->end(); ?>		

<?= $this->start('footer');?>
	<div id="place" title="edit" style="visibility: hidden">
	</div>

	<div id="loginPopup" title="Basic dialog" style="visibility: hidden">
		<form action="/cake3/users/login2" method="post">
			<input name="username" id="username" />
			<input name="password" id="password" type="password" value=""/>
			<input type="submit" value="login">
		</form>
	</div>
<?php $this->end(); ?>		
