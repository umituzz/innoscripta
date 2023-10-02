import { useEffect } from 'react';
import { useRouter } from 'next/router';
import {useSelector} from "react-redux";

function withAuth(WrappedComponent) {
    return (props) => {
        const router = useRouter();
        const token = useSelector((state) => state.authReducer.token);

        useEffect(() => {

            if (!token) {
                router.push('/login');
            }
        }, []);

        return <WrappedComponent {...props} />;
    };
}

export default withAuth;
