import React, { createContext, useContext, useEffect, useState } from 'react';
import { GetDataService } from '../services/GetDataService';
import { useDispatch, useSelector } from 'react-redux';
import { setSources, setCategories, setAuthors } from '../stores/actions/preferenceAction';

const PreferenceContext = createContext();

export const usePreferenceContext = () => {
    return useContext(PreferenceContext);
};

export const PreferenceProvider = ({ children }) => {
    const dispatch = useDispatch();
    const preferenceData = useSelector((state) => state.preferenceReducer);
    const [toastMessage, setToastMessage] = useState(null);

    useEffect(() => {
        async function fetchData() {
            try {
                const initial = await GetDataService(`articles/preferences`);
                dispatch(setSources(initial?.data.sources));
                dispatch(setCategories(initial?.data.categories));
                dispatch(setAuthors(initial?.data.authors));
            } catch (error) {
                setToastMessage({ message: 'Data Loading Issue', type: 'error' });
            }
        }

        fetchData();
    }, [dispatch]);

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
                toastMessage,
                handleSubmit,
                handleCheckAll,
            }}
        >
            {children}
        </PreferenceContext.Provider>
    );
};
