import { Card, Col, Container, Row } from 'react-bootstrap';
import HeadComponent from '../../components/HeadComponent';
import { useEffect } from 'react';
import { useArticleContext } from '../../contexts/ArticleContext';
import { useRouter } from 'next/router';
import {useSelector} from "react-redux";

function ArticleDetail() {
    const router = useRouter();
    const { slug } = router.query;
    const { findArticleBySlug } = useArticleContext();

    useEffect(() => {
        if (slug) {
            findArticleBySlug(slug);
        }
    }, [slug]);

    const article = useSelector((state) => state.articleReducer.articleBySlug);


    if (!article) {
        return <div>Loading...</div>;
    }

    return (
        <Container>
            <HeadComponent title="Article Details"></HeadComponent>
            <Row>
                <Col lg={12}>
                    <Card className="mb-4">

                        <Card.Img src={article.image} alt={article.title} />
                        <Card.Body>
                            <small className="text-muted">{article.published_at}</small>
                            <h2 className="card-title h4">{article.title}</h2>
                            <p className="card-text">{article.description}</p>
                        </Card.Body>
                    </Card>
                </Col>
            </Row>
        </Container>
    );
}

export default ArticleDetail;
