import React from 'react';
import {Button, Card, Col} from 'react-bootstrap';
import { ArticleCardProps } from '../interfaces/ArticleCardProps';

function ArticleCard({article}: ArticleCardProps) {
    if (article) {
        return (
            <Col lg={6} key={article.id}>
                <Card className="mb-4">
                    <Card.Img src={article.image} alt={article.title}/>
                    <Card.Body>
                        <small className="text-muted">{article.published_at}</small>
                        <h2 className="card-title h4">{article.title}</h2>
                        <p className="card-text">{article.description}</p>
                        <Button variant="primary" href={`#/${article.id}`}>
                            Read more →
                        </Button>
                    </Card.Body>
                </Card>
            </Col>
        );
    } else {
        return (
            <Col lg={6}>
                <Card className="mb-4">
                    <Card.Img src={`https://dummyimage.com/700x350/dee2e6/6c757d.jpg`} alt="No Data"/>
                    <Card.Body>
                        <p className="card-text">No Data Yet!</p>
                    </Card.Body>
                </Card>
            </Col>
        );
    }
}

export default ArticleCard;
