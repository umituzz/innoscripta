import { useSelector } from "react-redux";

export const authToken = () => {
    return useSelector((state) => state.authReducer.token);
};

