import { useRouter } from "next/router";
import { useSelector } from "react-redux";

export const authCheck = (redirectToLogin = true) => {
    const router = useRouter();
    const isLoggedIn = useSelector((state) => state.authReducer.token);

    if (!isLoggedIn && redirectToLogin) {
        if (typeof window !== "undefined") {
            router.push("/login");
        }
    } else if (!isLoggedIn && redirectToLogin) {
        if (typeof window !== "undefined") {
            router.push("/");
        }
    }

    return isLoggedIn;
};

export const authToken = () => {
    return useSelector((state) => state.authReducer.token);
};

