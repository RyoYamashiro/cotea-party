import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Article from './Article';

function ArticleList() {
    const [articles, setArticles] = useState([]);
    const [filter, setFilter] = useState(0);


    useEffect(() => {
    axios.get(`/api/${filter}`).
          then(response => setArticles(response.data));
    }, [filter]);

    const clickChangeFilter = (e) => {
      e.preventDefault;
      console.log(e);
      setFilter(e.target.value)
    }
    return (
      <>
      {articles.map((article, index) => (
        <Article key={index} data={article} />
      ))}
      <button value="0" onClick={clickChangeFilter}>1</button>
      <button value="10" onClick={clickChangeFilter}>2</button>
      <button value="20" onClick={clickChangeFilter}>3</button>
      </>
    );
}

export default ArticleList;

if (document.getElementById('article_list')) {
    ReactDOM.render(<ArticleList />, document.getElementById('article_list'));
}
