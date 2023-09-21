import React, {useState} from 'react';
import {Col, Form} from 'react-bootstrap';

export default function FilterComponent({onFilterChange, sources}) {
    const [selectedSource, setSelectedSource] = useState('');

    const handleSourceChange = (e) => {
        const source = e.target.value;
        setSelectedSource(source);
        onFilterChange(source);
    };

    return (
        <Col md={6}>
            <Form.Group>
                <Form.Control
                    as="select"
                    onChange={handleSourceChange}
                    value={selectedSource}
                >
                    <option value="">All Sources</option>
                    {sources.map((source) => (
                        <option key={source.id} value={source.name}>
                            {source.name}
                        </option>
                    ))}
                </Form.Control>
            </Form.Group>
        </Col>
    );
}
