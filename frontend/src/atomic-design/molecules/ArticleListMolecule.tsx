import ArticleItem from "@/components/ArticleItem";
import {Row} from "react-bootstrap";
import React from "react";

const ArticleListMolecule = ({ articles }) => {
    return (
        <Row>
            {articles?.map((article) => (
                <ArticleItem key={article.id} article={article} hasLink={true}/>
            ))}
        </Row>
    )
}

export default ArticleListMolecule;