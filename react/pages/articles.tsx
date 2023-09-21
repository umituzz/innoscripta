import {Row, Container, Col} from "react-bootstrap";
import Table from "react-bootstrap/Table";
import {useEffect, useState} from "react";
import {LoadListData} from "../services/DataListService";
import {useDispatch, useSelector} from "react-redux";
import {setArticles} from '../stores/actions/articleAction';
import { Pagination } from "react-bootstrap";
import HeadComponent from "../components/HeadComponent";

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
                setLastPage(response?.data.last_page)
            } catch (error) {
                console.error('Data Loading Issue:', error);
            }
        }

        fetchData();
    }, [currentPage, dispatch]);

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
                <Pagination>
                    <Pagination.Prev
                        onClick={() => {
                            if (currentPage > 1) {
                                setCurrentPage(currentPage - 1);
                            }
                        }}
                    />
                    {Array.from({ length: lastPage }, (_, index) => (
                        <Pagination.Item
                            key={index + 1}
                            active={index + 1 === currentPage}
                            onClick={() => setCurrentPage(index + 1)}
                        >
                            {index + 1}
                        </Pagination.Item>
                    ))}
                    <Pagination.Next
                        onClick={() => {
                            if (currentPage < lastPage) {
                                setCurrentPage(currentPage + 1);
                            }
                        }}
                    />
                </Pagination>
            </Row>
        </Container>
    )
}