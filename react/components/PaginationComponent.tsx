import React from 'react';
import { Pagination } from 'react-bootstrap';

function PaginationComponent({ currentPage, lastPage, onPageChange }) {
    return (
        <Pagination>
            <Pagination.Prev
                onClick={() => {
                    if (currentPage > 1) {
                        onPageChange(currentPage - 1);
                    }
                }}
            />
            {Array.from({ length: lastPage }, (_, index) => (
                <Pagination.Item
                    key={index + 1}
                    active={index + 1 === currentPage}
                    onClick={() => onPageChange(index + 1)}
                >
                    {index + 1}
                </Pagination.Item>
            ))}
            <Pagination.Next
                onClick={() => {
                    if (currentPage < lastPage) {
                        onPageChange(currentPage + 1);
                    }
                }}
            />
        </Pagination>
    );
}

export default PaginationComponent;
