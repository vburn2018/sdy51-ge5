const weather = new Weather;
const coordinate = new GeoLocation;
const user = new UI;


document.addEventListener("DOMContentLoaded",getWeather)

function getWeather()
{
    coordinate.getGeoLocation()
    .then(resolve => {
       return resolve.coords;
    }).then(position => {
       return weather.getWeather(position)
    }).then(weather => {
        user.paint(weather)
    })
}




