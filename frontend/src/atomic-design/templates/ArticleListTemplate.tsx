import React from "react";
import {Container} from "react-bootstrap";
import MainLayout from "@/layouts/MainLayout";
import ArticleListOrganism from "@/atomic-design/organisms/ArticleListOrganism";

const ArticleListTemplate = () => {
    return (
        <MainLayout title={"Homepage"} description={"Homepage Description"}>
            <Container className="mt-2 minHeight pb-5">
                <ArticleListOrganism/>
            </Container>
        </MainLayout>
    )
}

export default ArticleListTemplate;
