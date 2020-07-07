import {Injectable} from "@angular/core";
import {ApiService} from "../api.service";

@Injectable({
  providedIn: "root"
})
export class AuthorizationApiService extends ApiService {
  public register(email, password) {
    return this.post("register", {email, password});
  }

  public confirmRegistration(confirmCode) {
    return this.post("register/complete", {confirmation_code: confirmCode});
  }

  public login(email, password) {
    return this.post("login", {email, password});
  }

  public resetPassword(email) {
    return this.post("password/reset", {email});
  }

  public completeResetPassword(confirmCode, password) {
    return this.post("password/reset/complete", {confirmation_code: confirmCode,
                                                            new_password: password});
  }
}
