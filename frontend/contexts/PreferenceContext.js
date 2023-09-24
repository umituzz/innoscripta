import React, {createContext, useContext, useEffect, useState} from 'react';
import { useSelector } from 'react-redux';
import {GetDataService} from "../services/GetDataService";
import {authToken} from "../helpers/authHelper";

const PreferenceContext = createContext();

export const usePreferenceContext = () => {
    return useContext(PreferenceContext);
};

export const PreferenceProvider = ({ children }) => {
    const preferenceData = useSelector((state) => state.preferenceReducer);
    const [checkedSources, setCheckedSources] = useState([]);
    const [checkedAuthors, setCheckedAuthors] = useState([]);
    const [checkedCategories, setCheckedCategories] = useState([]);

    const token = authToken();

    useEffect(() => {

        async function fetchPreferenceData() {
            try {
                const response = await GetDataService(`user/preferences`, token);

                if (response.data.sources) {
                    setCheckedSources(response.data.sources);
                }

                if (response.data.authors) {
                    setCheckedAuthors(response.data.authors);
                }

                if (response.data.categories) {
                    setCheckedCategories(response.data.categories);
                }

            } catch (error) {
                console.log(error)
            }
        }

        fetchPreferenceData();
    }, []);


    return (
        <PreferenceContext.Provider
            value={{
                preferenceData,
                checkedSources,
                checkedAuthors,
                checkedCategories,
            }}
        >
            {children}
        </PreferenceContext.Provider>
    );
};
