import {NgModule} from "@angular/core";
import {CommonModule} from "@angular/common";

import {RegistrationModule} from "@pages/authorization/registration";
import {LoginModule} from "./login/login.module";
import {ResetPasswordModule} from "@pages/authorization/reset-password";


@NgModule({
  declarations: [],
  imports: [
    CommonModule,
    RegistrationModule,
    LoginModule,
    ResetPasswordModule
  ]
})
export class AuthorizationModule {
}
