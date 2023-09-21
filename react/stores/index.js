import thunk from "redux-thunk";
import {createStore, combineReducers, applyMiddleware} from 'redux';
import {authReducer} from "./reducers/authReducer";
import {articleReducer} from "./reducers/articleReducer";
import {sourceReducer} from "./reducers/sourceReducer";

export const middlewares = [thunk];

const rootReducer = combineReducers({
    authReducer: authReducer,
    articleReducer: articleReducer,
    sourceReducer: sourceReducer,
});

export const createStoreWithMiddleware = applyMiddleware(...middlewares)(createStore);

export const store = createStoreWithMiddleware(rootReducer)

export default store;
