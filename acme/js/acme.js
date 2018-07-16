console.log('My javascript is being read.');

let URL = "../js/acme.json";
getData(URL);


function getData(URL) {
    fetch(URL)
        .then(response => response.json())
        .then(function(data) {
            console.log('Json object:');
            jsonData = data;
            processJSON(data);
        })
        .catch(error => console.log('There was an error: ', error))
} // end getData function

function processJSON(data) {
    // Log what is returned
    console.log(data);
    // Build an unordered list
    // Use a for loop to include the results in list items
    let list = "<ul>";
    for (let i = 0; i < data.length; i++) {
        list += "<li>" + data[i] + "</li>";
    };
    list += "</ul>";
    pageNav.innerHTML = list;
}