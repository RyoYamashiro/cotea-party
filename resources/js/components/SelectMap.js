import { useState } from 'react';
import GoogleMapReact from 'google-map-react';
import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default function SelectMap({addressValue}) {
  const [map, setMap] = useState(null);
  const [maps, setMaps] = useState(null);
  const [geocoder, setGeocoder] = useState(null);
  const [mapAddress, setMapAddress] = useState(null);
  const [marker, setMarker] = useState(null);
  const [latLng, setLatLng] = useState({
    lat: 37.09812337,
    lng: 139.5107987,
  });
  const [address, setAddress] = useState(addressValue);
  console.log(addressValue);


  const handleApiLoaded = (obj) => {
    setMap(obj.map);
    setMaps(obj.maps);
    setGeocoder(new obj.maps.Geocoder());
  };

  const search = () => {
    geocoder.geocode({
      mapAddress,
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
    geocoder.geocode({'location': latLng}, function(results, status) {
      console.log(results);
      setAddress(results[0].formatted_address.replace(/日本、, /, ''));

    });
  };


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
  function handleChangeAddress(e)
  {
    setAddress(e.target.value)
  }

  return (
    <>

      <div className="input-holder">
        <label className="form-label" htmlFor="map">開催場所地図</label>
        <div className="party-middle-map">
          <div style={{ height: '100%', width: '100%'}}>
            <GoogleMapReact
              bootstrapURLKeys={{ key: 'AIzaSyDvHEWKY9pxVogqT3aW1o6IQxXQJupV-wA' }}
              defaultCenter={latLng}
              defaultZoom={4}
              onGoogleApiLoaded={handleApiLoaded}
              onClick={updateLatLng}
            />
            <input type="hidden" name="lat" value={latLng.lat} />
            <input type="hidden" name="lng" value={latLng.lng} />

            <div>
              <input type="text" onChange={(e) => setMapAddress(e.target.value)} />
              <button type="button" onClick={search}>Search</button>
            </div>
          </div>
        </div>
      </div>
      <div className="input-holder">
        <label className="form-label" htmlFor="address">開催場所住所(地図ピン留めしたら自動入力)</label>
        <input className="form-input" type="text" onChange={handleChangeAddress} name="address" required value={address} />
      </div>
    </>
  )
}
if (document.getElementById('select_map')) {
    ReactDOM.render(<SelectMap />, document.getElementById('select_map'));
}
