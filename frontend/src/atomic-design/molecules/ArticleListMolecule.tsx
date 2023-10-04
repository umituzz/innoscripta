import React from "react";
import {Row} from "react-bootstrap";
import ArticleItemMolecule from "@/atomic-design/molecules/ArticleItemMolecule";

const ArticleListMolecule = ({ articles }) => {
    return (
        <Row>
            {articles?.map((article) => (
                <ArticleItemMolecule key={article.id} article={article} hasLink={true}/>
            ))}
        </Row>
    )
}

export default ArticleListMolecule;