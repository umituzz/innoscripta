import { useRouter } from 'next/router';
import { useEffect } from 'react';

function ArticleDetail() {
    const router = useRouter();
    const { slug } = router.query;


    useEffect(() => {
    }, [slug]);

    return (
        <div>
        </div>
    );
}

export default ArticleDetail;
