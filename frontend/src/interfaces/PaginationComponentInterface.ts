export interface PaginationComponentInterface {
    currentPage: number;
    lastPage: number;
    onPageChange: (newPage: number) => void;
    total: number;
}