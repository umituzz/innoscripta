import React, {useEffect, useState} from 'react';
import {Card, Col, Container, Row} from 'react-bootstrap';
import {useDispatch, useSelector} from 'react-redux';
import {setArticles} from '../stores/actions/articleAction';
import HeadComponent from '../components/HeadComponent';
import PaginationComponent from '../components/PaginationComponent';
import FilterComponent from '../components/FilterComponent';
import {GetDataService} from "../services/GetDataService";
import SearchBar from '../components/SearchBar';
import {setAuthors, setCategories, setSources} from "../stores/actions/preferenceAction";
import ArticleCard from '../components/ArticleCard';

export default function Article() {
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
                const response = await GetDataService(`articles?page=${currentPage}`);
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
            const response = await GetDataService(`articles?page=${currentPage}&sourceId=${newSourceFilter}`);
            dispatch(setArticles(response?.data.data));
            setLastPage(response?.data.last_page);
        } catch (error) {
            setToastMessage({message: 'Data Loading Issue', type: 'error'});
        }
    };

    const handleSearch = async (searchTerm) => {
        try {
            const response = await GetDataService(`articles?page=${currentPage}&searchTerm=${searchTerm}`);
            dispatch(setArticles(response?.data.data));
            setLastPage(response?.data.last_page);
        } catch (error) {
            setToastMessage({message: 'Data Loading Issue', type: 'error'});
        }
    };

    return (<Container className="mt-2 minHeight pb-5">
            <HeadComponent title={`Articles`}/>
            <Row>
                <Col lg={8}>
                    <Row>
                        {articles.map((article) => (<ArticleCard key={article.id} article={article}/>))}
                    </Row>
                    <Row>
                        <Col md={12} className="text-center mt-3">
                            <PaginationComponent currentPage={currentPage} lastPage={lastPage}
                                                 onPageChange={handlePageChange}/>
                        </Col>
                    </Row>
                </Col>

                <Col lg={4}>
                    <Card className="mb-4">
                        <Card.Header>Search</Card.Header>
                        <Card.Body>
                            <SearchBar onSearch={handleSearch}/>
                        </Card.Body>
                    </Card>

                    <Card className="mb-4">
                        <Card.Header>News Sources</Card.Header>
                        <Card.Body>
                            <FilterComponent onFilterChange={handleSourceFilterChange} sources={sources} title="All Sources"/>
                        </Card.Body>
                    </Card>

                    <Card className="mb-4">
                        <Card.Header>News Categories</Card.Header>
                        <Card.Body>
                            <FilterComponent onFilterChange={handleSourceFilterChange} sources={categories} title="All Categories"/>
                        </Card.Body>
                    </Card>

                    <Card className="mb-4">
                        <Card.Header>News Authors</Card.Header>
                        <Card.Body>
                            <FilterComponent onFilterChange={handleSourceFilterChange} sources={authors} title="All Authors"/>
                        </Card.Body>
                    </Card>
                </Col>
            </Row>
        </Container>);
}
