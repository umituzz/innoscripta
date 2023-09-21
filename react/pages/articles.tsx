import { useEffect, useState } from 'react';
import { Container, Row, Col, Table } from 'react-bootstrap';
import { LoadListData } from '../services/DataListService';
import { useDispatch, useSelector } from 'react-redux';
import { setArticles } from '../stores/actions/articleAction';
import HeadComponent from '../components/HeadComponent';
import PaginationComponent from '../components/PaginationComponent';

export default function Article() {
    const dispatch = useDispatch();
    const articles = useSelector((state) => state.articleReducer.articles);
    const [currentPage, setCurrentPage] = useState(1);
    const [lastPage, setLastPage] = useState(1);

    useEffect(() => {
        async function fetchData() {
            try {
                const response = await LoadListData(`articles?page=${currentPage}`);
                dispatch(setArticles(response?.data.data));
                setLastPage(response?.data.last_page);
            } catch (error) {
                console.error('Data Loading Issue:', error);
            }
        }

        fetchData();
    }, [currentPage, dispatch]);

    const handlePageChange = (newPage) => {
        setCurrentPage(newPage);
    };

    return (
        <Container className="mt-2 minHeight">
            <HeadComponent title={`Articles`} />
            <Row>
                <Col md={12}>
                    <Table responsive>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Source Name</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Published At</th>
                        </tr>
                        </thead>
                        <tbody>
                        {articles?.length > 0 ? (
                            articles.map((article) => (
                                <tr key={article.id}>
                                    <td>{article.id}</td>
                                    <td>{article.source}</td>
                                    <td>{article.title}</td>
                                    <td>{article.category}</td>
                                    <td>{article.published_at}</td>
                                </tr>
                            ))
                        ) : (
                            <tr>
                                <td colSpan="8">No Data</td>
                            </tr>
                        )}
                        </tbody>
                    </Table>
                </Col>
                <Col md={12} className="text-center mt-3">
                    <PaginationComponent
                        currentPage={currentPage}
                        lastPage={lastPage}
                        onPageChange={handlePageChange}
                    />
                </Col>
            </Row>
        </Container>
    );
}
