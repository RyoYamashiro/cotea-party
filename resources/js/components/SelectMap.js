import { useState } from 'react';
import GoogleMapReact from 'google-map-react';
import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default function SelectMap() {
  const [map, setMap] = useState(null);
  const [maps, setMaps] = useState(null);
  const [geocoder, setGeocoder] = useState(null);
  const [address, setAddress] = useState(null);
  const [marker, setMarker] = useState(null);
  const [latLng, setLatLng] = useState({
    lat: 37.09812337,
    lng: 139.5107987,
  })



  const handleApiLoaded = (obj) => {
    setMap(obj.map);
    setMaps(obj.maps);
    setGeocoder(new obj.maps.Geocoder());
  };

  const search = () => {
    geocoder.geocode({
      address,
    }, (results, status) => {
      if (status === maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        if (marker) {
          marker.setMap(null);
        }
        setMarker(new maps.Marker({
          map,
          position: results[0].geometry.location,
        }));
        console.log(results[0].geometry.location.lat());
        console.log(results[0].geometry.location.lng());
      }
    });
  };
  const updateLatLng = ({ x, y, lat, lng, event }) => {
    if (marker) {
      marker.setMap(null);
    }
    const localeLatLng = {
      lat,
      lng,
    };
    console.log(localeLatLng);
    setLatLng(localeLatLng);
    setMarker(new maps.Marker({
      map,
      position: localeLatLng,
    }));
    map.panTo(localeLatLng);
  };

  const postLatLng = () => {
    console.log(latLng.lat);
    axios.post('/react', {
      lat: latLng.lat,
      lng: latLng.lng,
    })
    .then(function (response) {
      console.log(response);
      geocodeLatLng(getPreName);
    })
    .catch(function (error) {
      console.log(error);
    });
  }
  function geocodeLatLng(callback) {

        geocoder.geocode({'location': latLng}, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                if (results[1]) {
                    callback(results);
                } else {
                    alert('No results found');
                }
            } else {
                alert('Geocoder failed due to: ' + status);
            }
        });
    }

  function getPreName(geoCodeResults)
  {
      var results = geoCodeResults[0].address_components.filter(function(component) {
        return component.types.indexOf("administrative_area_level_1") > -1;
      });
      console.log(results[0].long_name);
  }

  return (
    <>
    <div style={{ height: '100%', width: '100%'}}>
      <GoogleMapReact
        bootstrapURLKeys={{ key: 'AIzaSyDvHEWKY9pxVogqT3aW1o6IQxXQJupV-wA' }}
        defaultCenter={latLng}
        defaultZoom={4}
        onGoogleApiLoaded={handleApiLoaded}
        onClick={updateLatLng}
      />

      <div>
        <input type="text" onChange={(e) => setAddress(e.target.value)} />
        <button type="button" onClick={search}>Search</button>
      </div>
      <button onClick={postLatLng}>試し</button>
    </div>
    </>
  )
}
if (document.getElementById('select_map')) {
    ReactDOM.render(<SelectMap />, document.getElementById('select_map'));
}
