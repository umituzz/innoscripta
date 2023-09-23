import React, {useEffect, useState} from 'react';
import {Card, Col, Container, Row} from 'react-bootstrap';
import {useDispatch, useSelector} from 'react-redux';
import {setArticles} from '../stores/actions/articleAction';
import HeadComponent from '../components/HeadComponent';
import PaginationComponent from '../components/PaginationComponent';
import FilterComponent from '../components/FilterComponent';
import {GetDataService} from "../services/GetDataService";
import SearchBar from '../components/SearchBar';
import {setSources} from "../stores/actions/sourceAction";
import ArticleCard from '../components/ArticleCard';

export default function Article() {
    const dispatch = useDispatch();
    const articles = useSelector((state) => state.articleReducer.articles);
    const sources = useSelector((state) => state.sourceReducer.sources);
    const [currentPage, setCurrentPage] = useState(1);
    const [lastPage, setLastPage] = useState(1);
    const [toastMessage, setToastMessage] = useState(null);
    const [sourceFilter, setSourceFilter] = useState('');

    useEffect(() => {
        async function fetchData() {
            try {
                const response = await GetDataService(`articles?page=${currentPage}`);
                const initial = await GetDataService(`initial`);
                dispatch(setArticles(response?.data.data));
                dispatch(setSources(initial?.data.sources));
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
                            <FilterComponent onFilterChange={handleSourceFilterChange} sources={sources}/>
                        </Card.Body>
                    </Card>
                </Col>
            </Row>
        </Container>);
}
