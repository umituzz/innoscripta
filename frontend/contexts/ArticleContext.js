import React, {createContext, useContext, useEffect, useState} from 'react';
import {useDispatch, useSelector} from 'react-redux';
import {setArticles} from '../stores/actions/articleAction';
import {GetDataService} from '../services/GetDataService';
import {setAuthors, setCategories, setSources,} from '../stores/actions/preferenceAction';

const ArticleContext = createContext();

export const useArticleContext = () => {
    return useContext(ArticleContext);
};

export const ArticleProvider = ({children}) => {
    const dispatch = useDispatch();
    const articles = useSelector((state) => state.articleReducer.articles);
    const sources = useSelector((state) => state.preferenceReducer.sources);
    const categories = useSelector((state) => state.preferenceReducer.categories);
    const authors = useSelector((state) => state.preferenceReducer.authors);
    const [currentPage, setCurrentPage] = useState(1);
    const [lastPage, setLastPage] = useState(1);
    const [toastMessage, setToastMessage] = useState(null);
    const [sourceFilter, setSourceFilter] = useState('');

    useEffect(() => {
        async function fetchData() {
            try {
                const response = await GetDataService(
                    `articles?page=${currentPage}`
                );
                dispatch(setArticles(response?.data.data));
                const initial = await GetDataService(`articles/preferences`);
                dispatch(setSources(initial?.data.sources));
                dispatch(setCategories(initial?.data.categories));
                dispatch(setAuthors(initial?.data.authors));
                setLastPage(response?.data.last_page);
            } catch (error) {
                setToastMessage({message: 'Data Loading Issue', type: 'error'});
            }
        }

        fetchData();
    }, [currentPage, dispatch, sourceFilter]);

    const handlePageChange = (newPage) => {
        setCurrentPage(newPage);
    };

    const handleSourceFilterChange = async (newSourceFilter) => {
        try {
            const response = await GetDataService(
                `articles?page=${currentPage}&sourceId=${newSourceFilter}`
            );
            dispatch(setArticles(response?.data.data));
            setLastPage(response?.data.last_page);
        } catch (error) {
            setToastMessage({message: 'Data Loading Issue', type: 'error'});
        }
    };

    const handleSearch = async (searchTerm) => {
        try {
            const response = await GetDataService(
                `articles?page=${currentPage}&searchTerm=${searchTerm}`
            );
            dispatch(setArticles(response?.data.data));
            setLastPage(response?.data.last_page);
        } catch (error) {
            setToastMessage({message: 'Data Loading Issue', type: 'error'});
        }
    };

    return (
        <ArticleContext.Provider
            value={{
                articles,
                sources,
                categories,
                authors,
                currentPage,
                lastPage,
                toastMessage,
                sourceFilter,
                handlePageChange,
                handleSourceFilterChange,
                handleSearch,
            }}
        >
            {children}
        </ArticleContext.Provider>
    );
};
