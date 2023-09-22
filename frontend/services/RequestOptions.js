export const getRequestOptions = (token = null) => {
    return {
        method: "GET",
        headers: {
            "Authorization": "Bearer " + token,
            "Content-type": "application/json",
        },
    }
}

export const postRequestOptions = (item, token = null) => {
    return {
        method: "POST",
        headers: {
            "Authorization": "Bearer " + token,
            "Content-type": "application/json"
        },
        body: JSON.stringify(item),
    }
}