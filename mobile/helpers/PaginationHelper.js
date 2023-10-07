export function paginateArray(array, itemsPerPage, currentPage) {
    const start = currentPage * itemsPerPage;
    const end = start + itemsPerPage;

    return array.slice(start, end);
}

export function calculateTotalPages(array, itemsPerPage) {
    return Math.ceil(array.length / itemsPerPage);
}
