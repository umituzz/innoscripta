import { useEffect } from 'react';
import { useRouter } from 'next/router';

export default function RouterHandler() {
    const router = useRouter();

    useEffect(() => {
        const handleRouteChange = (url) => {};

        router.events.on('routeChangeComplete', handleRouteChange);

        return () => {
            router.events.off('routeChangeComplete', handleRouteChange);
        };
    }, [router.events]);

    return null;
}
