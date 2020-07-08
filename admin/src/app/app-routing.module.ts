import {NgModule} from "@angular/core";
import {Routes, RouterModule} from "@angular/router";

import {HomeComponent} from "@pages/home/home.component";
import {DashboardComponent} from "@pages/dashboard/dashboard.component";
import {RegistrationComponent} from "@pages/authorization/registration/registration.component";
import {LoginComponent} from "@pages/authorization/login/login.component";
import {ConfirmRegistrationComponent} from "@components/authorization/registration/confirm-registration/confirm-registration.component";
import {ResetPasswordComponent} from "@pages/authorization/reset-password/reset-password.component";
import {ConfirmResetPasswordFormComponent} from "@components/authorization/reset-password/confirm-reset-password-form/confirm-reset-password-form.component";
import {AuthorizationGuard} from "@app/api/authorization/authorization.guard";


const routes: Routes = [
  {path: "register/complete/:code", component: ConfirmRegistrationComponent},
  {path: "register", component: RegistrationComponent},
  {path: "password/reset/complete/:code", component: ConfirmResetPasswordFormComponent},
  {path: "password/reset", component: ResetPasswordComponent},
  {path: "login", component: LoginComponent},
  {path: "dashboard", component: DashboardComponent, canActivate: [AuthorizationGuard]},
  {path: "", component: HomeComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  providers: [AuthorizationGuard],
  exports: [RouterModule]
})
export class AppRoutingModule {
}

