import React from 'react';
import {GetMethodService} from '@/services/GetMethodService';
import ArticleDetailTemplate from "@/atomic-design/templates/ArticleDetailTemplate";

export default function ArticleDetail({article}) {
    return (
        <ArticleDetailTemplate article={article}/>
    )
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
