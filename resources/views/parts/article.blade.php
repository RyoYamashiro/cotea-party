<article class="article">
  <div class="article-container">
    <h3 class="article-title"><a href="/party/1">{{$party->title}}</a></h3>
    <div class="article-map">
    </div>



    <div class="article-content">
      <p class="article-text">{{$party->content}}</p>
      <div class="article-bottom">


        <div class="article-date-holder">
          <p>開催日時</p>
          <p class="article-date">{{$party->date->format('Y/m/d H:i')}}</p>
        </div>

        <a class="article-button" href="/party/1">詳細を見る</a>
      </div>
    </div>

  </div>
</article>
