import React, { createContext, useContext } from 'react';
import { useSelector } from 'react-redux';

const PreferenceContext = createContext();

export const usePreferenceContext = () => {
    return useContext(PreferenceContext);
};

export const PreferenceProvider = ({ children }) => {
    const preferenceData = useSelector((state) => state.preferenceReducer);

    const handleSubmit = (e) => {
        e.preventDefault();
    };

    const handleCheckAll = (formId) => (e) => {
        const checkboxes = document.querySelectorAll(`#${formId} input[type="checkbox"]`);
        checkboxes.forEach((checkbox) => {
            checkbox.checked = e.target.checked;
        });
    };

    return (
        <PreferenceContext.Provider
            value={{
                preferenceData,
                handleSubmit,
                handleCheckAll,
            }}
        >
            {children}
        </PreferenceContext.Provider>
    );
};
