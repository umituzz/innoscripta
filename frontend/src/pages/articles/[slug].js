import React from 'react';
import { Container, Row, Button } from 'react-bootstrap';
import Layout from '@/components/Layout';
import ArticleItem from '@/components/ArticleItem';
import { GetMethodService } from '@/services/GetMethodService';

export default function ArticleDetail({ article }) {
    if (!article) {
        return (
            <Layout title="Article Not Found">
                <Container className="mt-2 minHeight pb-5">
                    <h2>Article Not Found</h2>
                </Container>
            </Layout>
        );
    }

    return (
        <Layout title={article.title} description={article.description}>
            <Container className="mt-2 minHeight pb-5">
                <ArticleItem key={article.id} article={article} hasLink={false} />
            </Container>
        </Layout>
    );
}

export async function getServerSideProps(context) {
    const { slug } = context.query;

    try {
        const response = await GetMethodService(`articles/${slug}`);
        const article = response.data;

        if (!article) {
            throw new Error("Article not found");
        }

        return {
            props: {
                article
            },
        };
    } catch (error) {
        console.error(error);
        return {
            notFound: true,
        };
    }
}
