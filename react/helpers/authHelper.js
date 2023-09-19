import { useSelector} from "react-redux";

export const authCheck = () => {
    return useSelector((state) => state.authReducer.isAuthenticated);
}