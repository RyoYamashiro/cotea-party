import { useState } from 'react';
import GoogleMapReact from 'google-map-react';
import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default function SelectMap({addressValue}) {
  const element = document.getElementById('select_map');
  const defaultAddress = element.dataset.address;

  const defaultLatLng = {
    lat: Number(element.dataset.lat) ? Number(element.dataset.lat): 35.68123091,
    lng: Number(element.dataset.lng) ? Number(element.dataset.lat):  139.7671708,
  }




  const [map, setMap] = useState(null);
  const [maps, setMaps] = useState(null);
  const [geocoder, setGeocoder] = useState(null);
  const [mapAddress, setMapAddress] = useState(null);
  const [marker, setMarker] = useState(null);
  const [latLng, setLatLng] = useState(defaultLatLng);

  const [address, setAddress] = useState(defaultAddress);

  const handleApiLoaded = (obj) => {
    setMap(obj.map);
    setMaps(obj.maps);
    setGeocoder(new obj.maps.Geocoder());
    if(element.dataset.lat ?? element.dataset.lng){
      setMarker(new obj.maps.Marker({
        map: obj.map,
        position: latLng,
      }));
    }
  };


  const updateLatLng = ({ x, y, lat, lng, event }) => {
    if (marker) {
      marker.setMap(null);
    }
    lat = Number(lat.toString().slice(0, 11));
    lng = Number(lng.toString().slice(0, 11));
    const localeLatLng = {
      lat,
      lng,
    };
    setLatLng(localeLatLng);
    setMarker(new maps.Marker({
      map,
      position: localeLatLng,
    }));
    map.panTo(localeLatLng);
    geocoder.geocode({'location': latLng}, function(results, status) {
      setAddress(results[0].formatted_address.replace(/日本、, /, ''));

    });
  };



  function handleChangeAddress(e)
  {
    setAddress(e.target.value)
  }

  return (
    <>

      <div className="input-holder">
        <label className="form-label" htmlFor="map">開催場所地図</label>
        <div className="party-middle-map edit">
          <div style={{ height: '100%', width: '100%'}}>
            <GoogleMapReact
              bootstrapURLKeys={{ key: 'AIzaSyDvHEWKY9pxVogqT3aW1o6IQxXQJupV-wA' }}
              defaultCenter={latLng}
              defaultZoom={10}
              onGoogleApiLoaded={handleApiLoaded}
              onClick={updateLatLng}
            />
            <input type="hidden" name="lat" value={latLng.lat} />
            <input type="hidden" name="lng" value={latLng.lng} />

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
