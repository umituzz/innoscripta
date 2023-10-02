export interface ArticleItemInterface {
    article: {
        id: number;
        image: string;
        published_at: string;
        title: string;
        slug: string;
        description: string;
        source: {
            id: number;
            name: string;
        };
        author: {
            id: number;
            name: string;
        };
        category: {
            id: number;
            name: string;
            slug: string;
        };
        url: string;
    } | null;
    hasLink: boolean
}