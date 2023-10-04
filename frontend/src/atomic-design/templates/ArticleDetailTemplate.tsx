import {Container} from "react-bootstrap";
import React from "react";
import MainLayout from "@/layouts/MainLayout";
import ArticleItemMolecule from "@/atomic-design/molecules/ArticleItemMolecule";

const ArticleDetailTemplate = ({article}) => {
    return (
        <MainLayout title={article.title} description={article.description}>
            <Container className="mt-2 minHeight pb-5">
                <ArticleItemMolecule key={article.id} article={article} hasLink={false}/>
            </Container>
        </MainLayout>
    );
}

export default ArticleDetailTemplate;