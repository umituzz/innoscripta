import React, {createContext, useContext, useEffect, useState} from 'react';
import {useSelector} from 'react-redux';
import {GetDataService} from "../services/GetDataService";
import {PostDataService} from "../services/PostDataService";

const PreferenceContext = createContext();

export const usePreferenceContext = () => {
    return useContext(PreferenceContext);
};

export const PreferenceProvider = ({children}) => {
    const token = useSelector((state) => state.authReducer.token)
    const preferenceData = useSelector((state) => state.preferenceReducer);
    const [checkedSources, setCheckedSources] = useState([]);
    const [checkedAuthors, setCheckedAuthors] = useState([]);
    const [checkedCategories, setCheckedCategories] = useState([]);
    const [toastMessage, setToastMessage] = useState(null);

    useEffect(() => {
        async function fetchPreferenceData() {
            try {
                const response = await GetDataService(`user/preferences`);

                if (response.statusCode === 200) {
                    if (response.data.sources) {
                        setCheckedSources(response.data.sources);
                    }

                    if (response.data.authors) {
                        setCheckedAuthors(response.data.authors);
                    }

                    if (response.data.categories) {
                        setCheckedCategories(response.data.categories);
                    }
                }
            } catch (error) {
                setToastMessage({message: 'An error occurred while fetching data', type: 'error'});
            }
        }

        if (token) {
            fetchPreferenceData();
        }
    }, []);

    const handleSubmit = async (formId, checkedItems) => {

        try {
            const data = {};

            if (formId === 'sources') {
                data.sourceIds = checkedItems;
            } else if (formId === 'authors') {
                data.authorIds = checkedItems;
            } else if (formId === 'categories') {
                data.categoryIds = checkedItems;
            }

            const response = await PostDataService(`user/preferences/${formId}`, data)

            if (response.statusCode === 200) {
                setToastMessage({message: 'Preferences Saved Successfully!', type: 'success'});
            } else {
                setToastMessage({message: 'Preferences Could not Saved!', type: 'error'});
            }

        } catch (error) {
            setToastMessage({message: 'There is something wrong. Try again later!', type: 'error'});

            console.log(error)
        }
    };

    return (
        <PreferenceContext.Provider
            value={{
                preferenceData,
                toastMessage,
                checkedSources,
                checkedAuthors,
                checkedCategories,
                handleSubmit
            }}
        >
            {children}
        </PreferenceContext.Provider>
    );
};
