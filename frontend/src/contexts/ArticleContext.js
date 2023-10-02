import React, {createContext, useContext, useEffect, useState} from 'react';
import {useDispatch, useSelector} from 'react-redux';
import {setArticles} from '@/stores/actions/ArticleActions';
import {GetMethodService} from '@/services/GetMethodService';
import {setAuthors, setCategories, setSources,} from '@/stores/actions/PreferenceActions';

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
    const token = useSelector((state) => state.authReducer.token)

    useEffect(() => {
        async function fetchData() {
            try {
                const response = await GetMethodService(
                    `articles?page=${currentPage}`
                );
                dispatch(setArticles(response?.data.data));
                const initial = await GetMethodService(`articles/preferences`, token);
                dispatch(setSources(initial?.data.sources));
                dispatch(setCategories(initial?.data.categories));
                dispatch(setAuthors(initial?.data.authors));
                setLastPage(response?.data.last_page);
            } catch (error) {
                setToastMessage({message: 'Data Loading Issue', type: 'error'});
            }
        }

        fetchData();
    }, [currentPage, dispatch]);

    const handlePageChange = (newPage) => {
        setCurrentPage(newPage);
    };

    const handleItemFilterChange = async (itemId, filterType) => {
        try {
            let url = `articles?page=${currentPage}`;

            if (filterType === 'sources') {
                url += `&sourceId=${itemId}`;
            } else if (filterType === 'categories') {
                url += `&categoryId=${itemId}`;
            } else if (filterType === 'authors') {
                url += `&authorId=${itemId}`;
            }

            const response = await GetMethodService(url);
            dispatch(setArticles(response?.data.data));
            setLastPage(response?.data.last_page);
        } catch (error) {
            setToastMessage({ message: 'Data Loading Issue', type: 'error' });
        }
    };

    const handleSearch = async (searchTerm) => {
        try {
            const response = await GetMethodService(
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
                handlePageChange,
                handleItemFilterChange,
                handleSearch,
            }}
        >
            {children}
        </ArticleContext.Provider>
    );
};
