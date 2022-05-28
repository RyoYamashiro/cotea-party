import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Article from './Article';
import ReactPaginate from 'react-paginate';



function ArticleList() {
    const [articles, setArticles] = useState([]);
    const [currentPage, setCurrentPage] = useState(0);


    useEffect(() => {
    axios.get(`/api/parties/${currentPage}`).
          then(response => setArticles(response.data));
    }, [currentPage]);


      const element = document.getElementById('article_list');
      const totalPaginationButtonNumber = Number(element.dataset.partyPageNumber);

    const handlePaginate = (selectedPage) => {
      const page = selectedPage.selected;
      setCurrentPage(page);
    }
    return (
      <>
        {articles.map((article, index) => (
          <Article key={index} data={article} />
        ))}
        <ReactPaginate
           forcePage={currentPage}

           nextLabel="＞"
           onPageChange={handlePaginate}
           pageCount={totalPaginationButtonNumber}
           pageRangeDisplayed={2}
           marginPagesDisplayed={2}
           previousLabel="＜"
           renderOnZeroPageCount={null}
           containerClassName="paginate"
           pageLinkClassName="paginate-link"
           activeClassName="pagenate-item-active"
           activeLinkClassName="paginate-link-active"
           breakLinkClassName="paginate-link"
           previousLinkClassName="paginate-link"
           nextLinkClassName="paginate-link"
         />

      </>
    );
}

export default ArticleList;

if (document.getElementById('article_list')) {
    ReactDOM.render(<ArticleList />, document.getElementById('article_list'));
}
