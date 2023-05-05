import axios from 'axios'

export default (callback) => {
    // setTimeout(() => {
        try {
            const res = axios.get(`http://localhost:8000/api/auth/getalbums?user=1`);
            // if (res) {
                console.log("Res", res)
                callback(null, res);
            // }
        } catch (error) {
            console.log(error);
            // if (error.response.status === 401) {
            //     this.errorMsg = "Invalid Credentials"
            // }
        }
    // }, 0);
}