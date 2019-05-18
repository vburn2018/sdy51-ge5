class GeoLocation {

    getGeoLocation() {
        return new Promise((resolve, reject) => {
                  navigator.geolocation.getCurrentPosition(resolve, reject);
        })
    }
}

