import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Article from './Article';



function ArticleList() {
    const [articles, setArticles] = useState([]);
    const [filter, setFilter] = useState(0);


    useEffect(() => {
    axios.get(`/api/${filter}`).
          then(response => {setArticles(response.data); console.log(response.data)});
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
      {[...Array(Number(document.getElementById('article_list').dataset.partyPageNumber))].map((_ ,index) => (
        <button key={index} value={index} onClick={clickChangeFilter}>{index + 1}</button>
      ))}


      </>
    );
}

export default ArticleList;

if (document.getElementById('article_list')) {
    ReactDOM.render(<ArticleList />, document.getElementById('article_list'));
}
