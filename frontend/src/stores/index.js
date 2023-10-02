import thunk from "redux-thunk";
import {createStore, combineReducers, applyMiddleware} from 'redux';
import {authReducer} from "./reducers/AuthReducer";
import {articleReducer} from "./reducers/ArticleReducer";
import {preferenceReducer} from "./reducers/PreferenceReducer";

export const middlewares = [thunk];

const rootReducer = combineReducers({
    authReducer: authReducer,
    articleReducer: articleReducer,
    preferenceReducer: preferenceReducer,
});

export const createStoreWithMiddleware = applyMiddleware(...middlewares)(createStore);

export const store = createStoreWithMiddleware(rootReducer)

export default store;
