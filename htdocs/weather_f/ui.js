class UI{
    constructor(){
        this.country = document.querySelector(".country");
        this.temperature = document.querySelector(".temperature");
        this.weather = document.querySelector(".weather");
        this.icon = document.querySelector("#wicon");
        this.button = document.querySelector(".button");
    }

    paint(input) {
        const {name,sys:{country},main:{temp},weather:[first]} = input;
        this.country.textContent = `${name},${country}`;
        this.weather.textContent =`${first.main}`;
        this.icon.setAttribute("src",`https://openweathermap.org/img/w/${first.icon}.png`);
        this.temperature.textContent = `${temp} C`;

        this.button.addEventListener("click",() => {
            if(this.temperature.textContent === `${temp} C`){
                this.temperature.textContent =`${this.convertF(temp)} F`;
            }else{
                this.temperature.textContent = `${temp} C`
            }
        })

    }

    convertF(temperature) {
        return Math.ceil(temperature * 1.8 + 32);
    }



}

