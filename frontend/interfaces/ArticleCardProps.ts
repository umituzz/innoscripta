export interface ArticleCardProps {
    article: {
        id: number;
        image: string;
        published_at: string;
        title: string;
        description: string;
    } | null;
}