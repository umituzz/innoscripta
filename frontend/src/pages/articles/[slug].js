import React from 'react';
import {Container} from 'react-bootstrap';
import ArticleItem from '@/components/ArticleItem';
import {GetMethodService} from '@/services/GetMethodService';
import MainLayout from "@/layouts/MainLayout";

export default function ArticleDetail({article}) {
    if (!article) {
        return (
            <MainLayout title="Article Not Found">
                <Container className="mt-2 minHeight pb-5">
                    <h2>Article Not Found</h2>
                </Container>
            </MainLayout>
        );
    }

    return (
        <MainLayout title={article.title} description={article.description}>
            <Container className="mt-2 minHeight pb-5">
                <ArticleItem key={article.id} article={article} hasLink={false}/>
            </Container>
        </MainLayout>
    );
}

export async function getServerSideProps(context) {
    const {slug} = context.query;

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
