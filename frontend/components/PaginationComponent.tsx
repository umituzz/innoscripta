import React from 'react';
import { Pagination } from 'react-bootstrap';
import { calculatePageNumbers } from '../helpers/paginationHelper';

function PaginationComponent({ currentPage, lastPage, onPageChange }) {

    const pageNumbers = calculatePageNumbers(currentPage, lastPage);

    if (pageNumbers.length < 1) {
        return null;
    }

    return (
        <nav aria-label="Pagination">
            <hr className="my-0"/>
            <Pagination className="justify-content-center my-4">
                <Pagination.Prev
                    onClick={() => {
                        if (currentPage > 1) {
                            onPageChange(currentPage - 1);
                        }
                    }}
                />
                {pageNumbers.map((page, index) => (
                    <Pagination.Item
                        key={index}
                        active={page === currentPage}
                        onClick={() => {
                            if (typeof page === 'number') {
                                onPageChange(page);
                            }
                        }}
                    >
                        {page}
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
        </nav>
    );
}

export default PaginationComponent;
