import React, { useEffect } from 'react';
import { useRouter } from 'next/router';
import { useSelector } from 'react-redux';

function withAuth(WrappedComponent) {
    const Wrapper = (props) => {
        const router = useRouter();
        const token = useSelector((state) => state.authReducer.token);

        useEffect(() => {
            if (!token) {
                router.push('/login');
            }
        }, [router, token]);

        return <WrappedComponent {...props} />;
    };

    if (WrappedComponent.displayName) {
        Wrapper.displayName = `withAuth(${WrappedComponent.displayName})`;
    } else if (WrappedComponent.name) {
        Wrapper.displayName = `withAuth(${WrappedComponent.name})`;
    }

    return Wrapper;
}

export default withAuth;
