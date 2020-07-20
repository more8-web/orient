import { Injectable } from "@angular/core";

enum TokenStorage {
    KEY = "X-AUTH-TOKEN",
}

@Injectable({
    providedIn: "root"
})
export class TokenService {
    constructor() {
    }

    get token() {
        return localStorage.getItem(TokenStorage.KEY) || sessionStorage.getItem(TokenStorage.KEY);
    }

    clear() {
        localStorage.removeItem(TokenStorage.KEY);
        sessionStorage.removeItem(TokenStorage.KEY);
    }

    get authenticated() {
        return localStorage.getItem(TokenStorage.KEY) != null || sessionStorage.getItem(TokenStorage.KEY) != null;
    }
}
