const initialState = {
    sources: [],
};

export const sourceReducer = (state = initialState, action) => {
    switch (action.type) {
        case 'SET_SOURCES':
            return {
                ...state,
                sources: action.payload,
            };
        default:
            return state;
    }
};