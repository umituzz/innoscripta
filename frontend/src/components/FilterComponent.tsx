import React, {useState} from 'react';
import {Col, Form} from 'react-bootstrap';
import {FilterComponentInterface} from "@/interfaces/FilterComponentInterface";

export default function FilterComponent({onFilterChange, items, title}: FilterComponentInterface) {
    const [selectedSource, setSelectedSource] = useState('');

    const handleItemChange = (e) => {
        const source = e.target.value;
        setSelectedSource(source);
        onFilterChange(source);
    };

    return (
        <Col>
            <Form.Group>
                <Form.Control
                    as="select"
                    onChange={handleItemChange}
                    value={selectedSource}
                >
                    <option value="*">{title}</option>
                    {items?.map((item) => (
                        <option key={item.id} value={item.id}>
                            {item.name}
                        </option>
                    ))}
                </Form.Control>
            </Form.Group>
        </Col>
    );
}
