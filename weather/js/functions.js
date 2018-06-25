/* ********************************* 
 * Weather Site Javascript Functions *
 ******************************** */
console.log('My javascript is being read.');
// Variables for Function Use
const temp = 31;
const speed = 5;
buildWC(speed, temp);
let direction = "S";
windDial(direction);

let weather = "rain";
let currentWeather = getweather(weather);
// Replace summary image
changeSummaryImage(currentWeather);






// Calculate the Windchill
function buildWC(speed, temp) {
    const feelTemp = document.getElementById('feelTemp');
    // Compute the windchill
    let wc = 35.74 + 0.6215 * temp - 35.75 * Math.pow(speed, 0.16) + 0.4275 * temp * Math.pow(speed, 0.16);
    console.log(wc);
    // Round the answer down to integer
    wc = Math.floor(wc);
    // If chill is greater than temp, return the temp
    wc = (wc > temp) ? temp : wc;
    // Display the windchill
    console.log(wc);
    wc = 'Feels like ' + wc + '&deg;F';
    feelTemp.innerHTML = wc;
}

// Wind Dial Function
function windDial(direction) {
    // Get the wind dial container
    const dial = document.getElementById("dial");
    // Determine the dial class
    switch (direction) {
        case "North":
        case "N":
            dial.setAttribute("class", "n"); //"n" is the CSS rule selector
            break;
        case "NE":
        case "NNE":
        case "ENE":
            dial.setAttribute("class", "ne");
            break;
        case "NW":
        case "NNW":
        case "WNW":
            dial.setAttribute("class", "nw");
            break;
        case "South":
        case "S":
            dial.setAttribute("class", "s");
            break;
        case "SE":
        case "SSE":
        case "ESE":
            dial.setAttribute("class", "se");
            break;
        case "SW":
        case "SSW":
        case "WSW":
            dial.setAttribute("class", "sw");
            break;
        case "East":
        case "E":
            dial.setAttribute("class", "e");
            break;
        case "West":
        case "W":
            dial.setAttribute("class", "w");
            break;
    }
}

function getweather(weather) {
    console.log(weather);
    if ((weather.includes("clear")) || (weather.includes("cloudless"))) {
        return "clear";
    } else if ((weather.includes("clouds")) || (weather.includes("cloudy")) || (weather.includes("overcast"))) {
        return "clouds";
    } else if ((weather.includes("fog")) || (weather.includes("foggy"))) {
        return "fog";
    } else if ((weather.includes("rain")) || (weather.includes("rainy"))) {
        return "rain";
    } else if ((weather.includes("snow")) || (weather.includes("snowy"))) {
        return "snow";
    } else
        return "clear";
}

//Change summary image

function changeSummaryImage(currentWeather) {
    console.log(currentWeather);

    const curWeather = document.getElementById('curWeather');

    switch (currentWeather) {
        case "clear":
            curWeather.setAttribute('class', 'clear');
            console.log(currentWeather);
            break;

        case "cloud":
            curWeather.setAttribute('class', 'cloudy');
            console.log(currentWeather);
            break;

        case "rain":
            curWeather.setAttribute('class', 'rainy');
            console.log(currentWeather);
            break;

        case "fog":
            curWeather.setAttribute('class', 'foggy');
            console.log(currentWeather);
            break;

        case "snow":
            curWeather.setAttribute('class', 'snowy');
            console.log(currentWeather);
            break;

    }

}