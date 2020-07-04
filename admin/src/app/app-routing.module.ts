import {NgModule} from "@angular/core";
import {Routes, RouterModule} from "@angular/router";

import {HomeComponent} from "@pages/home/home.component";
import {DashboardComponent} from "@pages/dashboard/dashboard.component";
import {RegistrationComponent} from "@pages/authorization/registration/registration.component";
import {LoginComponent} from "@pages/authorization/login/login.component";
import {ConfirmRegistrationComponent} from "@components/authorization/registration/confirm-registration/confirm-registration.component";
import {ResetPasswordComponent} from "@pages/authorization/reset-password/reset-password.component";


const routes: Routes = [
  {path: "register/complete/:code", component: ConfirmRegistrationComponent},
  {path: "register", component: RegistrationComponent},
  {path: "reset_password", component: ResetPasswordComponent},
  {path: "login", component: LoginComponent},
  {path: "dashboard", component: DashboardComponent},
  {path: "", component: HomeComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {
}

