import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";

import { AuthorizationGuard } from "@app/guards/authorization.guard";
import { ForAuthorizatedGuard } from "@app/guards/for-authorizated.guard";

import { GuestLayoutComponent } from "@app/layouts/guest";
import { HomeComponent } from "@pages/home";
import { RegistrationComponent } from "@pages/authorization/registration/registration.component";
import { LoginComponent } from "@pages/authorization/login/login.component";
import { ConfirmRegistrationComponent } from "@components/authorization/registration/confirm-registration/confirm-registration.component";
import { ResetPasswordComponent } from "@pages/authorization/reset-password/reset-password.component";
import { ConfirmResetPasswordFormComponent } from "@components/authorization/reset-password/confirm-reset-password-form/confirm-reset-password-form.component";

import { AuthenticatedLayoutComponent } from "@app/layouts/authenticated/authenticated.layout.component";
import { DashboardComponent } from "@pages/dashboard/dashboard.component";
import { NewsComponent } from "@pages/news";



const routes: Routes = [
    {
        path: "",
        component: GuestLayoutComponent,
        children: [
            {path: "register/complete/:code", component: ConfirmRegistrationComponent},
            {path: "register", component: RegistrationComponent},
            {path: "password/reset/complete/:code", component: ConfirmResetPasswordFormComponent},
            {path: "password/reset", component: ResetPasswordComponent},
            {path: "login", component: LoginComponent},
            {path: "news", component: NewsComponent},
            {path: "", component: HomeComponent}
        ],
        canActivate: [ForAuthorizatedGuard]
    },
    {
        path: "",
        component: AuthenticatedLayoutComponent,
        children: [
            {path: "dashboard", component: DashboardComponent},
        ],
        canActivate: [AuthorizationGuard]
    },

];

@NgModule({
    imports: [RouterModule.forRoot(routes)],
    providers: [AuthorizationGuard],
    exports: [RouterModule]
})
export class AppRoutingModule {
}

