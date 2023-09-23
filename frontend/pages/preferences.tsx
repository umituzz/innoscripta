import { Container, Form, Button, Card, Col, Row } from 'react-bootstrap';
import HeadComponent from "../components/HeadComponent";
import React from "react";

function Preference() {
    const handleSubmitNewsSources = (e) => {
        e.preventDefault();
    };

    const handleSubmitAuthors = (e) => {
        e.preventDefault();
    };

    const handleSubmitCategories = (e) => {
        e.preventDefault();
    };

    const handleCheckAll = (formId) => (e) => {
        const checkboxes = document.querySelectorAll(`#${formId} input[type="checkbox"]`);
        checkboxes.forEach((checkbox) => {
            checkbox.checked = e.target.checked;
        });
    };

    return (
        <Container>
            <HeadComponent title={`Preferences`}/>
            <Row className="mt-3">
                <Col md={4}>
                    <Card>
                        <Card.Header>
                            <h6>News Source Preferences</h6>
                        </Card.Header>
                        <Card.Body>
                            <Form id="newsSources" onSubmit={handleSubmitNewsSources}>
                                <div className="mb-3">
                                    <Form.Check type="checkbox" label="Select All" onChange={handleCheckAll('newsSources')} />
                                </div>
                                <Form.Check type="checkbox" id="source1" label="Source 1" />
                                <Form.Check type="checkbox" id="source2" label="Source 2" />
                                <Form.Check type="checkbox" id="source3" label="Source 3" />
                                <Button variant="primary" size="sm" type="submit" className="mt-2">
                                    Save
                                </Button>
                            </Form>
                        </Card.Body>
                    </Card>
                </Col>

                <Col md={4}>
                    <Card>
                        <Card.Header>
                            <h6>Author Preferences</h6>
                        </Card.Header>
                        <Card.Body>
                            <Form id="authors" onSubmit={handleSubmitAuthors}>
                                <div className="mb-3">
                                    <Form.Check type="checkbox" label="Select All" onChange={handleCheckAll('authors')} />
                                </div>
                                <Form.Check type="checkbox" id="author1" label="Author 1" />
                                <Form.Check type="checkbox" id="author2" label="Author 2" />
                                <Form.Check type="checkbox" id="author3" label="Author 3" />
                                <Button variant="primary" size="sm" type="submit" className="mt-2">
                                    Save
                                </Button>
                            </Form>
                        </Card.Body>
                    </Card>
                </Col>

                <Col md={4}>
                    <Card>
                        <Card.Header>
                            <h6>Category Preferences</h6>
                        </Card.Header>
                        <Card.Body>
                            <Form id="categories" onSubmit={handleSubmitCategories}>
                                <div className="mb-3">
                                    <Form.Check type="checkbox" label="Select All" onChange={handleCheckAll('categories')} />
                                </div>
                                <Form.Check type="checkbox" id="category1" label="Category 1" />
                                <Form.Check type="checkbox" id="category2" label="Category 2" />
                                <Form.Check type="checkbox" id="category3" label="Category 3" />
                                <Button variant="primary" size="sm" type="submit" className="mt-2">
                                    Save
                                </Button>
                            </Form>
                        </Card.Body>
                    </Card>
                </Col>
            </Row>
        </Container>
    );
}

export default Preference;
