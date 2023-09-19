import thunk from "redux-thunk";
import {createStore, combineReducers, applyMiddleware} from 'redux';
import {authReducer} from "./reducers/authReducer";

export const middlewares = [thunk];

const rootReducer = combineReducers({
    authReducer: authReducer
});

export const createStoreWithMiddleware = applyMiddleware(...middlewares)(createStore);

export const store = createStoreWithMiddleware( rootReducer )

export default store;
