import React from 'react';
import {Card, Col, Container, Row} from 'react-bootstrap';
import HeadComponent from '../components/HeadComponent';
import PaginationComponent from '../components/PaginationComponent';
import FilterComponent from '../components/FilterComponent';
import SearchBar from '../components/SearchBar';
import ArticleCard from '../components/ArticleCard';
import {useArticleContext} from "../contexts/ArticleContext";

export default function Article() {
    const {
        articles,
        sources,
        authors,
        categories,
        currentPage,
        lastPage,
        handlePageChange,
        handleSourceFilterChange,
        handleSearch,
    } = useArticleContext();

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
                        <FilterComponent onFilterChange={handleSourceFilterChange} sources={sources}
                                         title="All Sources"/>
                    </Card.Body>
                </Card>

                <Card className="mb-4">
                    <Card.Header>News Categories</Card.Header>
                    <Card.Body>
                        <FilterComponent onFilterChange={handleSourceFilterChange} sources={categories}
                                         title="All Categories"/>
                    </Card.Body>
                </Card>

                <Card className="mb-4">
                    <Card.Header>News Authors</Card.Header>
                    <Card.Body>
                        <FilterComponent onFilterChange={handleSourceFilterChange} sources={authors}
                                         title="All Authors"/>
                    </Card.Body>
                </Card>
            </Col>
        </Row>
    </Container>);
}
