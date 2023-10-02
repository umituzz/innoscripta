export interface PreferenceItemInterface {
    title: string;
    formId: string;
    items: { id: string; name: string }[] | null;
    onSubmit: (formId: string, selectedItems: string[]) => void;
    checked: string[] | null;
}