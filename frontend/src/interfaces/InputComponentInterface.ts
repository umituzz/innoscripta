import {ChangeEvent} from "react";

export interface InputComponentInterface {
    label: string;
    type: string;
    name: string;
    value: string | number;
    onChange: (event: ChangeEvent<HTMLInputElement>) => void;
    placeholder?: string;
    required?: boolean;
    error?: string | null;
}