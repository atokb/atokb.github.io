console.log('My javascript is being read.');

const URL = "/acme/js/acme.json";
getData(URL);


function getData(URL) {


    fetch(URL)
        .then(response => response.json())
        .then(function(data) {
            console.log('Json object:');
            console.log(data);
            let keys = Object.keys(data);
            nav(keys);
        })
        .catch(error => console.log('There was an error: ', error))
} // end getData function

function nav(keys) {
    console.log(keys);
    let list = '<ul>';
    list += "<li id='home'>Home</li>";
    for (let i = 0, n = keys.length; i < n; i++) {
        let item = keys[i];
        list += "<li id = " + item + ">" + item + "</li>";
    };
    list += '</ul>';
    //display navigation list
    let pageNav = document.getElementById("pageNav");
    pageNav.innerHTML = list;
}

let clink = document.getElementById("pageNav").addEventListener("click", populate);

//function to populate page
function populate(clink) {
    console.log(clink.target.tagName);
    console.log(clink.srcElement);
    let target = clink.target;
    console.log(target.id + ": this is the target id");

    let home = document.getElementById("home-content");
    console.log(home);
    let hide = document.getElementById("prod-page");
    console.log(hide);

    //if statement to display either the home page or the content pages
    if (target.id != "home") {
        home.setAttribute("class", "hide-content");
        hide.removeAttribute("class");
    } else {
        hide.setAttribute("class", "hide-content");
        home.removeAttribute("class");
    }

    //this goes and grabs the JSON info and displays it based on what the user clicked
    fetch(URL)
        .then(response => response.json())
        .then(function(content) {
            console.log(content);

            //if statement to determine what information to grab and get ready
            if (target.id == "Anvils") {
                clicked = content.Anvils;
            } else if (target.id == "Explosives") {
                clicked = content.Explosives;
            } else if (target.id == "Decoys") {
                clicked = content.Decoys;
            } else if (target.id == "Traps") {
                clicked = content.Traps;
            } else {
                clicked.name = "Home"
            }
            console.log(clicked.name + ": this is what the user clicked")

            //grabs all the necessary elements to prepare to display
            let heading = document.getElementById("prod-name");
            let picPath = clicked.path;
            let description = document.getElementById("prod-desc");
            let manufacturer = document.getElementById("prod-manufacturer");
            let reviews = document.getElementById("prod-score");
            let price = document.getElementById("prod-price");


            //display the content
            heading.innerHTML = clicked.name;
            document.getElementById("product-picture").src = picPath;
            document.innerHTML = clicked.path;
            description.innerHTML = clicked.description;
            manufacturer.innerHTML = clicked.manufacturer;
            reviews.innerHTML = clicked.reviews;
            price.innerHTML = clicked.price;
            document.getElementById("acme-title").innerHTML = "Acme, Inc | " + clicked.name;

        }).catch(error => console.log('There was an error: ', error))

}