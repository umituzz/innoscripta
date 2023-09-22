import React, {useState} from 'react';
import {Card, Form, Button} from 'react-bootstrap';

export default function SearchBar({onSearch}) {
    const [searchTerm, setSearchTerm] = useState('');

    const handleSearch = () => {
        onSearch(searchTerm);
    };

    return (
        <Form>
            <Form.Group controlId="searchTerm">
                <div className="input-group">
                    <Form.Control
                        type="text"
                        placeholder="Enter search term..."
                        aria-label="Enter search term..."
                        value={searchTerm}
                        onChange={(e) => setSearchTerm(e.target.value)}
                    />
                    <Button variant="primary" id="button-search" type="button" onClick={handleSearch}>
                        Go!
                    </Button>
                </div>
            </Form.Group>
        </Form>
    );
}
