import {Badge, Card, Col, Container, Row} from 'react-bootstrap';
import {useEffect, useState} from 'react';
import {useRouter} from 'next/router';
import HeadComponent from '../../components/HeadComponent';
import {GetDataService} from '../../services/GetDataService';

function ArticleDetail() {
    const router = useRouter();
    const {slug} = router.query;
    const [article, setArticle] = useState({});

    useEffect(() => {
        async function fetchData() {
            try {
                const response = await GetDataService(`articles/${slug}`);

                setArticle(response.data);
            } catch (error) {
                console.log(error);
            }
        }

        fetchData();
    }, [slug]);

    return (
        <Container className="mt-2 minHeight pb-5">
            <HeadComponent title="Article Details"/>
            <Row className="mt-2">
                <Col lg={12}>
                    <Card className="mb-4">
                        <Card.Img src={article.image} alt={article.title} height={700}/>
                        <Card.Body>
                            <small className="text-muted">{article.published_at}</small>
                            <h2 className="card-title h4">{article.title}</h2>
                            <p className="card-text">{article.description}</p>
                            <Badge variant="primary">{article.category?.name}</Badge>
                            <div className="mt-3">
                                <strong>Author:</strong> {article.author?.name}
                            </div>
                        </Card.Body>
                    </Card>
                </Col>
            </Row>
        </Container>
    );
}

export default ArticleDetail;
