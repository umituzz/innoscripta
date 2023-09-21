import { useEffect } from 'react';
import { getCLS, getFID, getLCP, getTTFB } from 'web-vitals';

function reportToAnalytics({ name, delta, id }) {
    // console.log(name, delta, id);
}

function WebVitals() {
    useEffect(() => {
        getCLS(reportToAnalytics);
        getFID(reportToAnalytics);
        getLCP(reportToAnalytics);
        getTTFB(reportToAnalytics);
    }, []);

    return null;
}

export default WebVitals;
