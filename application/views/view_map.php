<h3>Dynamic Map</h3>
<p>Here is a dynamic map of the area. You may zoom in to explore or drag the map to another location.</p> <br />

<input type="button" value="Reset Map" id="btnMapReset" />
<input type="button" value="Add Marker" id="btnAddMarker" />
<input type="button" value="Add Place" id="btnAddPlace" />
<div id="map_canvas"></div>

<input type="button" value="Get Marker Coords" id="btnDebug" />

<div id="modalAddPlace" title="Add Place">
	<form>
  <fieldset>
    <label for="name">Place Name</label>
    <input type="text" name="placename" id="placename" class="text ui-widget-content ui-corner-all" />
    <label for="email">Place Desc</label>
    <input type="text" name="placedesc" id="placedesc" value="" class="text ui-widget-content ui-corner-all" />
   
  </fieldset>
  </form>
</div>