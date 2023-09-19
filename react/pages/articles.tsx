import {Row, Container, Col} from "react-bootstrap";
import Table from "react-bootstrap/Table";
import {useEffect} from "react";
import {LoadListData} from "../services/DataListService";
import {useDispatch, useSelector} from "react-redux";
import {setArticles} from '../stores/actions/articleAction';

export default function Article() {
    const dispatch = useDispatch();
    const articles = useSelector((state) => state.articleReducer.articles);

    useEffect(() => {
        async function fetchData() {
            try {
                const response = await LoadListData('articles');
                dispatch(setArticles(response?.data));
            } catch (error) {
                console.error('Data Loading Issue:', error);
            }
        }

        fetchData();
    }, [dispatch]);

    return (
        <Container className="mt-2 minHeight">
            <Row>
                <Col md={12}>
                    <Table responsive>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Source ID</th>
                            <th>Source Name</th>
                            <th>Api</th>
                            <th>Author</th>
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
                                    <td>{article.source_id}</td>
                                    <td>{article.source_name}</td>
                                    <td>{article.api}</td>
                                    <td>{article.author}</td>
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
            </Row>
        </Container>
    )
}