import {Card} from "react-bootstrap";
import SearchBar from "@/components/SearchBar";
import React from "react";

const SearchMolecule = ({handleSearch}) => {
    return (
        <Card className="mb-4">
            <Card.Header>Search</Card.Header>
            <Card.Body>
                <SearchBar onSearch={handleSearch}/>
            </Card.Body>
        </Card>
    )
}

export default SearchMolecule;