import thunk from "redux-thunk";
import {createStore, combineReducers, applyMiddleware} from 'redux';
import {authReducer} from "./reducers/authReducer";
import {articleReducer} from "./reducers/articleReducer";
import {preferenceReducer} from "./reducers/preferenceReducer";

export const middlewares = [thunk];

const rootReducer = combineReducers({
    authReducer: authReducer,
    articleReducer: articleReducer,
    preferenceReducer: preferenceReducer,
});

export const createStoreWithMiddleware = applyMiddleware(...middlewares)(createStore);

export const store = createStoreWithMiddleware(rootReducer)

export default store;
