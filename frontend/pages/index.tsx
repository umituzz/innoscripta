import {Row, Container, Col, Card} from "react-bootstrap";
import HeadComponent from "../components/HeadComponent";
import {useArticleContext} from "../contexts/ArticleContext";
import ArticleCard from "../components/ArticleCard";
import PaginationComponent from "../components/PaginationComponent";
import SearchBar from "../components/SearchBar";
import FilterComponent from "../components/FilterComponent";
import React from "react";

export default function Home() {
    const {
        articles,
        sources,
        authors,
        categories,
        currentPage,
        lastPage,
        handlePageChange,
        handleItemFilterChange,
        handleSearch,
    } = useArticleContext();

    return (
        <Container className="mt-2 minHeight pb-5">
            <HeadComponent title={`Homepage`}/>
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
                        <Card.Header>Sources</Card.Header>
                        <Card.Body>
                            <FilterComponent onFilterChange={handleItemFilterChange} items={sources}
                                             title="All Sources"/>
                        </Card.Body>
                    </Card>

                    <Card className="mb-4">
                        <Card.Header>Categories</Card.Header>
                        <Card.Body>
                            <FilterComponent onFilterChange={handleItemFilterChange} items={categories}
                                             title="All Categories"/>
                        </Card.Body>
                    </Card>

                    <Card className="mb-4">
                        <Card.Header>Authors</Card.Header>
                        <Card.Body>
                            <FilterComponent onFilterChange={handleItemFilterChange} items={authors}
                                             title="All Authors"/>
                        </Card.Body>
                    </Card>
                </Col>
            </Row>
        </Container>
    );
}
