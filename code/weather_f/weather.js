
// gets location from user browser

class Weather {
    constructor() {
        this.key = "03726b04c772c54015bff90e597deaf9";

    }

    async getWeather(position) {
        
        const {latitude,longitude} = position;
		//const latitude = 40.73096;
		//const longitude = 22.91945;
        const response = await fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&APPID=${this.key}&units=metric`);

        if(response.status === 200 ){
            const result = await response.json();
            return result;
        } else {
            throw new Error("Unable to fetch data")
        }

    }



}

