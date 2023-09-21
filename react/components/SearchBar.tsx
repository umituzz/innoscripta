import React, { useState } from 'react';
import { Form, Button, Col, Row } from 'react-bootstrap';

export default function SearchBar({ onSearch }) {
    const [searchTerm, setSearchTerm] = useState('');

    const handleSearch = () => {
        onSearch(searchTerm);
    };

    return (
        <Row>
            <Col md={3}>
                <Form className="mb-3">
                    <Form.Group controlId="searchTerm">
                        <Form.Control
                            type="text"
                            placeholder="Search"
                            value={searchTerm}
                            onChange={(e) => setSearchTerm(e.target.value)}
                        />
                    </Form.Group>
                </Form>
            </Col>
            <Col md={2}>
                <Button variant="primary" onClick={handleSearch}>
                    Search
                </Button>
            </Col>
        </Row>
    );
}
