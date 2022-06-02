import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Article from './Article';



function UserArticleList() {

  const [articles, setArticles] = useState({
    postedParties: [],
    joinParties: [],
    applyParties: [],
  });

  const element = document.getElementById('user_article_list');

  useEffect(() => {
    axios.get(`/api/parties/user/${element.dataset.user}/`).
          then(response => setArticles(response.data));
  }, []);

  return (
    <>
    { console.log(articles)}
    {console.log(articles.joinParties)}

      <section className="section">
        <div className="title-wrapper">
          <h2 className="title">投稿済パーティー</h2>
        </div>


        <div className="article-wrapper">
          {articles.postedParties.map((article, index) => (

            <Article key={index} data={article} />
          ))}
        </div>
      </section>

      <section className="section">
        <div className="title-wrapper">
          <h2 className="title">参加予定パーティー</h2>
        </div>
        <div className="article-wrapper">
        {articles.joinParties.map((article, index) => (
          <Article key={index} data={article} />
        ))}
        </div>
      </section>

      <section className="section">
        <div className="title-wrapper">
          <h2 className="title">申請中パーティー</h2>
        </div>
        <div className="article-wrapper">
        {articles.applyParties.map((article, index) => (
          <Article key={index} data={article} />
        ))}

        </div>
      </section>


    </>
  );
}

export default UserArticleList;

if (document.getElementById('user_article_list')) {
    ReactDOM.render(<UserArticleList />, document.getElementById('user_article_list'));
}
