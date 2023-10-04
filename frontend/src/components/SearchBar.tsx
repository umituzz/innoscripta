import React, {useState} from 'react';
import {Form, Button} from 'react-bootstrap';
import {SearchBarInterface} from "@/interfaces/SearchBarInterface";

export default function SearchBar({onSearch}: SearchBarInterface) {
    const [searchTerm, setSearchTerm] = useState('');

    const handleSearch = () => {
        onSearch(searchTerm);
    };

    const handleKeyPress = (e) => {
        if (e.key === 'Enter') {
            e.preventDefault();
            handleSearch();
        }
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
                        onKeyDown={handleKeyPress}
                    />
                    <Button variant="primary" id="button-search" type="button" onClick={handleSearch}>
                        Go!
                    </Button>
                </div>
            </Form.Group>
        </Form>
    );
}
