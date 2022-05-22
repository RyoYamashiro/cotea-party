import {useState} from 'react';
import GoogleMapReact from 'google-map-react';


import moment from 'moment';

function Article({data}) {

  const articleDate = moment(data.date).format('YYYY-MM-DD HH:mm');

  const defaultLatLng = {
    lat: Number(data.lat),
    lng: Number(data.lng),
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
    obj.map.setOptions({
      zoomControl: false,
      fullscreenControl: false,
      keyboardShortcuts: false,
      scrollwheel: false,
      draggable: false,
    })
  };

  var sliceContent = data.content.length > 20 ? data.content.slice(0,20)+"…" : data.content;
    return (
      <article className="article">
        <div className="article-container">
          <h3 className="article-title"><a href={'/parties/' + data.id}>{data.title}</a></h3>
          <div className="article-map">
            <GoogleMapReact
              bootstrapURLKeys={{ key: 'AIzaSyDvHEWKY9pxVogqT3aW1o6IQxXQJupV-wA' }}
              defaultCenter={defaultLatLng}
              defaultZoom={14}
              onGoogleApiLoaded={handleApiLoaded}
            />
          </div>



          <div className="article-content">
            <p className="article-text">{sliceContent}</p>
            <div className="article-bottom">


              <div className="article-date-holder">
                <p>開催日時</p>
                <p className="article-date">{articleDate}</p>
              </div>

              <a className="article-button" href={'/parties/' + data.id}>詳細を見る</a>
            </div>
          </div>

        </div>
      </article>
    );
}

export default Article;
