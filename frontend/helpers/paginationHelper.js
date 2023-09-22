export function calculatePageNumbers(currentPage, lastPage) {
    const maxPagesToShow = 3;

    const pageNumbers = [];

    for (let i = 1; i <= lastPage; i++) {
        if (
            i === 1 ||
            i === lastPage ||
            i === currentPage ||
            (i >= currentPage - 1 && i <= currentPage + 1) ||
            (i >= lastPage - (maxPagesToShow - 2))
        ) {
            pageNumbers.push(i);
        } else if (pageNumbers[pageNumbers.length - 1] !== '...') {
            pageNumbers.push('...');
        }
    }

    return pageNumbers;
}
