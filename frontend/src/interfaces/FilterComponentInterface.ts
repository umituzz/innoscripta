export interface FilterComponentInterface {
    onFilterChange: (source: string) => void;
    items: { id: string; name: string }[] | null;
    title: string;
}
