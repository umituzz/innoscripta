export interface ArticleCardProps {
    article: {
        id: number;
        image: string;
        published_at: string;
        title: string;
        slug: string;
        description: string;
    } | null;
}