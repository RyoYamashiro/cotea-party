<article class="article">
  <div class="article-container">
    <h3 class="article-title"><a href="{{route('parties.show', compact('party'))}}">{{$party->title}}</a></h3>
    <div class="article-map" data-id="{{$party->id}}" data-lat="{{$party->lat}}" data-lng="{{$party->lng}}" id="show_map_{{$party->id}}">
    </div>



    <div class="article-content">
      <p class="article-text">{{$party->content}}</p>
      <div class="article-bottom">


        <div class="article-date-holder">
          <p>開催日時</p>
          <p class="article-date">{{$party->date->format('Y/m/d H:i')}}</p>
        </div>

        <a class="article-button" href="{{route('parties.show', compact('party'))}}">詳細を見る</a>
      </div>
    </div>

  </div>
</article>
