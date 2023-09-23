const initialState = {
    sources: [],
    categories: [],
    authors: [],
};

export const preferenceReducer = (state = initialState, action) => {
    switch (action.type) {
        case 'SET_SOURCES':
            return {
                ...state,
                sources: action.payload,
            };
        case 'SET_CATEGORIES':
            return {
                ...state,
                categories: action.payload,
            };
        case 'SET_AUTHORS':
            return {
                ...state,
                authors: action.payload,
            };
        default:
            return state;
    }
};