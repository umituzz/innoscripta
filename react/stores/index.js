import thunk from "redux-thunk";
import {createStore, combineReducers, applyMiddleware} from 'redux';
import {authReducer} from "./reducers/authReducer";
import {articleReducer} from "./reducers/articleReducer";

export const middlewares = [thunk];

const rootReducer = combineReducers({
    authReducer: authReducer,
    articleReducer: articleReducer
});

export const createStoreWithMiddleware = applyMiddleware(...middlewares)(createStore);

export const store = createStoreWithMiddleware(rootReducer)

export default store;
