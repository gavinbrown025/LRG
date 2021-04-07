let errorCodes = {
    404: "URL Not Found",
    500: "Server Error. Try again later",
    403: "Access Denied.",
    503: "Server Error. Try Again Later"
}


async function fetchData(sourceURL) {
    let resource = await fetch(sourceURL).then(response => {
        if (response.status !== 200) {
            throw new Error(`Oops! ${response.status}: ${errorCodes[response.status]}`);
        }
        return response;
    });

    let dataset = await resource.json();

    return dataset;
}

export { fetchData};