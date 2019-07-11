
class Token {

    isValid(token){
        const payload = this.payload(token);

        if(payload){
            return payload.iss == "http://realtimespforum.test/api/auth/login" || "http://realtimespforum.test/api/auth/signup" ? true : false
        }

        return true
    }

    payload(token){

        const payload = token.split('.')[1];
        return this.decode(payload);
    }

    decode(payload){
        return JSON.parse(atob(payload))
    }

}


export default Token = new Token()