import {Container, Row} from 'react-bootstrap';
import React, {useEffect, useState} from 'react';
import {useRouter} from 'next/router';
import {GetDataService} from '@/services/GetDataService';
import Layout from "@/components/Layout";
import ArticleItem from "../../components/ArticleItem";

function ArticleDetail() {
    const router = useRouter();
    const {slug} = router.query;
    const [article, setArticle] = useState({});

    useEffect(() => {
        async function fetchData() {
            try {
                const response = await GetDataService(`articles/${slug}`);

                setArticle(response.data);
            } catch (error) {
                console.log(error);
            }
        }

        fetchData();
    }, [slug]);

    return (
        <Layout title={article.title} description={article.description}>
            <Container className="mt-2 minHeight pb-5">
                <Row className="mt-2">
                    <ArticleItem key={article.id} article={article} hasLink={false}/>
                </Row>
            </Container>
        </Layout>
    );
}

export default ArticleDetail;
