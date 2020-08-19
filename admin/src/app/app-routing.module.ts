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
import {
    ContentCategoryComponent,
    ContentComponent, KeywordComponent,
    NewsCategoryComponent,
    NewsLogComponent
} from "@app/containers";
import { NewsFormComponent } from "@containers/news/news-form";
import { NewsTableComponent } from "@containers/news/news-table";
import {PageTableComponent} from "@containers/page/page-table";
import {UpdatePageFormComponent} from "@containers/page/update-page-form";



const routes: Routes = [
    {
        path: "",
        component: AuthenticatedLayoutComponent,
        children: [
            {path: "", component: NewsComponent},
            {
                path: "pages", component: NewsComponent, children: [
                    {path: "", component: PageTableComponent},
                    {path: ":id", component: UpdatePageFormComponent},
                ]
            },
            {
                path: "news", component: NewsComponent, children: [
                    {path: "", component: NewsTableComponent},
                    {path: ":id", component: NewsFormComponent},
                ]
            },
            {path: "news-categories", component: NewsCategoryComponent},
            {path: "contents", component: ContentComponent},
            {path: "content-categories", component: ContentCategoryComponent},
            {path: "keywords", component: KeywordComponent},
            {path: "logs", component: NewsLogComponent},
            {path: "dashboard", component: NewsComponent},
        ],
        // canActivate: [AuthorizationGuard]
    },
    {
        path: "",
        component: GuestLayoutComponent,
        children: [
            {path: "register/complete/:code", component: ConfirmRegistrationComponent},
            {path: "register", component: RegistrationComponent},
            {path: "password/reset/complete/:code", component: ConfirmResetPasswordFormComponent},
            {path: "password/reset", component: ResetPasswordComponent},
            {path: "login", component: LoginComponent},
            {path: "", component: HomeComponent}
        ],
        canActivate: [ForAuthorizatedGuard]
    },

];

@NgModule({
    imports: [RouterModule.forRoot(routes)],
    providers: [AuthorizationGuard],
    exports: [RouterModule]
})
export class AppRoutingModule {
}

