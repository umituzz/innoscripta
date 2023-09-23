import { Container, Form, Button, Card, Col, Row } from 'react-bootstrap';
import HeadComponent from "../components/HeadComponent";
import React, {useEffect, useState} from "react";
import {GetDataService} from "../services/GetDataService";
import {setSources, setCategories, setAuthors} from "../stores/actions/preferenceAction";
import {useDispatch, useSelector} from "react-redux";

function Preference() {
    const dispatch = useDispatch();
    const [toastMessage, setToastMessage] = useState(null);
    const sources = useSelector((state) => state.preferenceReducer.sources);
    const categories = useSelector((state) => state.preferenceReducer.categories);
    const authors = useSelector((state) => state.preferenceReducer.authors);

    useEffect(() => {
        async function fetchData() {
            try {
                const initial = await GetDataService(`articles/preferences`);
                dispatch(setSources(initial?.data.sources));
                dispatch(setCategories(initial?.data.categories));
                dispatch(setAuthors(initial?.data.authors));
            } catch (error) {
                setToastMessage({message: 'Data Loading Issue', type: 'error'});
            }
        }

        fetchData();
    }, [dispatch]);

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
            <HeadComponent title={`Preferences`} />
            <Row className="mt-3">
                <Col md={4}>
                    <Card>
                        <Card.Header>
                            <h6>News Source Preferences</h6>
                        </Card.Header>
                        <Card.Body>
                            <Form id="newsSources" onSubmit={handleSubmitNewsSources}>
                                <div className="mb-3">
                                    <Form.Check
                                        type="checkbox"
                                        label="Select All"
                                        onChange={handleCheckAll('newsSources')}
                                    />
                                </div>
                                {sources.map((source) => (
                                    <Form.Check
                                        key={source.id}
                                        type="checkbox"
                                        id={`source${source.id}`}
                                        label={source.name}
                                    />
                                ))}
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
                                    <Form.Check
                                        type="checkbox"
                                        label="Select All"
                                        onChange={handleCheckAll('categories')}
                                    />
                                </div>
                                {categories.map((category) => (
                                    <Form.Check
                                        key={category.id}
                                        type="checkbox"
                                        id={`category${category.id}`}
                                        label={category.name}
                                    />
                                ))}
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
                                    <Form.Check
                                        type="checkbox"
                                        label="Select All"
                                        onChange={handleCheckAll('authors')}
                                    />
                                </div>
                                {authors.map((author) => (
                                    <Form.Check
                                        key={author.id}
                                        type="checkbox"
                                        id={`author${author.id}`}
                                        label={author.name}
                                    />
                                ))}
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
