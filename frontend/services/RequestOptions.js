export const getRequestOptions = (token) => {
    return {
        method: "GET",
        headers: {
            "Authorization": "Bearer " + token,
            "Content-type": "application/json",
        },
    }
}

export const postRequestOptions = (token, item) => {
    return {
        method: "POST",
        headers: {
            "Authorization": "Bearer " + token,
            "Content-type": "application/json"
        },
        body: JSON.stringify(item),
    }
}