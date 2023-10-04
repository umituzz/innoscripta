import {Col, Row} from "react-bootstrap";
import PaginationComponent from "@/components/PaginationComponent";
import React from "react";
import {useArticleContext} from "@/contexts/ArticleContext";
import ArticleListMolecule from "@/atomic-design/molecules/ArticleListMolecule";
import FilterMolecule from "@/atomic-design/molecules/FilterMolecule";
import SearchMolecule from "@/atomic-design/molecules/SearchMolecule";

const ArticleListOrganism = () => {
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
        <Row>
            <Col lg={8}>
                <Row>
                    <ArticleListMolecule articles={articles} />
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
                <SearchMolecule handleSearch={handleSearch} />

                <FilterMolecule
                    title="Sources"
                    items={sources}
                    onFilterChange={(itemId) => handleItemFilterChange(itemId, 'sources')}
                />

                <FilterMolecule
                    title="Categories"
                    items={categories}
                    onFilterChange={(itemId) => handleItemFilterChange(itemId, 'categories')}
                />

                <FilterMolecule
                    title="Authors"
                    items={authors}
                    onFilterChange={(itemId) => handleItemFilterChange(itemId, 'authors')}
                />

            </Col>
        </Row>
    )
}

export default ArticleListOrganism;