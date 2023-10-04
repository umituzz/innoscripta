import React from "react";
import {Card} from "react-bootstrap";
import FilterComponent from "@/components/FilterComponent";

const FilterMolecule = ({ title, items, onFilterChange }) => {
    return (
        <Card className="mb-4">
            <Card.Header>{title}</Card.Header>
            <Card.Body>
                <FilterComponent onFilterChange={onFilterChange} items={items} title={`All ${title}`} />
            </Card.Body>
        </Card>
    );
};

export default FilterMolecule;
