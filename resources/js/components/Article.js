function Article({data}) {
    return (
      <article className="article">
        <div className="article-container">
          <h3 className="article-title"><a href="">{data.title}</a></h3>
          <div className="article-map">
          </div>



          <div className="article-content">
            <p className="article-text">{data.content}</p>
            <div className="article-bottom">


              <div className="article-date-holder">
                <p>開催日時</p>
                <p className="article-date">{data.date}</p>
              </div>

              <a className="article-button" href="">詳細を見る</a>
            </div>
          </div>

        </div>
      </article>
    );
}

export default Article;
