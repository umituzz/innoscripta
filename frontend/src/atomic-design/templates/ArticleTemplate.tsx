import React from "react";
import {Card, Col, Container, Row} from "react-bootstrap";
import MainLayout from "@/layouts/MainLayout";
import ArticleItem from "@/components/ArticleItem";
import PaginationComponent from "@/components/PaginationComponent";
import SearchBar from "@/components/SearchBar";
import FilterComponent from "@/components/FilterComponent";
import {useArticleContext} from "@/contexts/ArticleContext";

const ArticleTemplate = () => {
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
        <MainLayout title={"Homepage"} description={"Homepage Description"}>
            <Container className="mt-2 minHeight pb-5">
                <Row>
                    <Col lg={8}>
                        <Row>
                            {articles?.map((article) => (
                                <ArticleItem key={article.id} article={article} hasLink={true}/>
                            ))}
                        </Row>
                        <Row>
                            <Col md={12} className="text-center mt-3">
                                <PaginationComponent
                                    currentPage={currentPage}
                                    lastPage={lastPage}
                                    onPageChange={handlePageChange}
                                    total={articles.length}
                                />
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
                                <FilterComponent
                                    onFilterChange={(itemId) => handleItemFilterChange(itemId, 'sources')}
                                    items={sources}
                                    title="All Sources"
                                />
                            </Card.Body>
                        </Card>

                        <Card className="mb-4">
                            <Card.Header>Categories</Card.Header>
                            <Card.Body>
                                <FilterComponent
                                    onFilterChange={(itemId) => handleItemFilterChange(itemId, 'categories')}
                                    items={categories}
                                    title="All Categories"
                                />
                            </Card.Body>
                        </Card>

                        <Card className="mb-4">
                            <Card.Header>Authors</Card.Header>
                            <Card.Body>
                                <FilterComponent
                                    onFilterChange={(itemId) => handleItemFilterChange(itemId, 'authors')}
                                    items={authors}
                                    title="All Authors"
                                />
                            </Card.Body>
                        </Card>
                    </Col>
                </Row>
            </Container>
        </MainLayout>
    )
}

export default ArticleTemplate;
