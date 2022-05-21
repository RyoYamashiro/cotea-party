import { useState } from 'react';
import GoogleMapReact from 'google-map-react';
import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default function ShowMap({addressValue}) {
  const element = document.getElementById('show_map');
  const defaultLatLng = {
    lat: Number(element.dataset.lat),
    lng: Number(element.dataset.lng),
  }



  const [map, setMap] = useState(null);
  const [maps, setMaps] = useState(null);
  const [marker, setMarker] = useState(null);
  const [latLng, setLatLng] = useState(defaultLatLng);


  const handleApiLoaded = (obj) => {
    setMap(obj.map);
    setMaps(obj.maps);
    console.log('map' ,map);
    console.log('maps' ,maps);
    setMarker(new obj.maps.Marker({
      map: obj.map,
      position: latLng,
    }));
  };



  function clickResetCenter(){
    map.setZoom(17);
    map.panTo(latLng);
  }
  return (
    <div style={{ height: '100%', width: '100%'}}>
      <GoogleMapReact
        bootstrapURLKeys={{ key: 'AIzaSyDvHEWKY9pxVogqT3aW1o6IQxXQJupV-wA' }}
        defaultCenter={defaultLatLng}
        defaultZoom={17}
        onGoogleApiLoaded={handleApiLoaded}
      />
      <button className="reset-button" onClick={clickResetCenter}>開催地に戻る</button>
    </div>
  )
}
if (document.getElementById('show_map')) {
    ReactDOM.render(<ShowMap />, document.getElementById('show_map'));
}
