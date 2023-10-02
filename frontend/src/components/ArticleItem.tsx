import React from 'react';
import Link from "next/link";
import {Button, Card, Col} from 'react-bootstrap';
import { ArticleItemInterface } from '@/interfaces/ArticleItemInterface';
import { Calendar, Folder, Person, Globe } from 'react-bootstrap-icons';

function ArticleItem({article, hasLink}: ArticleItemInterface) {
    if (article) {
        return (
            <Col lg={12} key={article.id}>
                <Card className="mb-4">
                    <Card.Img src={article.image} alt={article.title}  />
                    <Card.Body>
                        <h2 className="card-title h4">{article.title}</h2>
                        <p className="card-text">{article.description}</p>
                        <div className="mt-3">
                            <p>
                                <Calendar size={16} className="mr-1" />
                                <strong> Published At:</strong> {article.published_at}
                            </p>
                            <p>
                                <Folder size={16} className="mr-1" />
                                <strong> Category:</strong> {article.category?.name}
                            </p>
                            <p>
                                <Person size={16} className="mr-1" />
                                <strong> Author:</strong> {article.author?.name}
                            </p>
                            <p>
                                <Globe size={16} className="mr-1" />
                                <strong> Source:</strong> {article.source?.name}
                            </p>
                        </div>
                        {hasLink && (
                            <Link href={`/articles/${article.slug}`}>
                                <Button variant="primary">Read more →</Button>
                            </Link>
                        )}
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

export default ArticleItem;
