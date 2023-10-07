import { createStore, combineReducers } from 'redux';
import { devToolsEnhancer } from 'redux-devtools-extension';
import authReducer from './reducers/authReducer';

const rootReducer = combineReducers({
    auth: authReducer,
});

const store = createStore(rootReducer, devToolsEnhancer());

export default store;
