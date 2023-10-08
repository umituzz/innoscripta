export const getRequestOptions = (token = null) => {
    return {
        method: "GET",
        mode: 'cors',
        headers: {
            "Authorization": "Bearer " + token,
            "Content-type": "application/json",
        },
    }
}

export const postRequestOptions = (data, token = null) => {
    return {
        method: "POST",
        mode: 'cors',
        headers: {
            "Authorization": "Bearer " + token,
            "Content-type": "application/json"
        },
        body: JSON.stringify(data),
    }
}