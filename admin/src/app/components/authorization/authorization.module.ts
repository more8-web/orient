import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import { FormsModule, ReactiveFormsModule } from "@angular/forms";
import { RouterModule } from "@angular/router";

import { MatButtonModule } from "@angular/material/button";
import { MatInputModule } from "@angular/material/input";
import { MatIconModule } from "@angular/material/icon";
import { MatCheckboxModule } from "@angular/material/checkbox";
import { MatListModule } from "@angular/material/list";

import { ConfirmResetPasswordFormComponent } from "./reset-password/confirm-reset-password-form/confirm-reset-password-form.component";
import { LogoutButtonComponent } from "./logout/logout-button/logout-button.component";
import { RegistrationModule } from "./registration";
import { LoginFormComponent } from "./login/login-form/login-form.component";
import { ResetPasswordFormComponent } from "./reset-password/reset-password-form/reset-password-form.component";


@NgModule({
    declarations: [
        LoginFormComponent,
        ResetPasswordFormComponent,
        ConfirmResetPasswordFormComponent,
        LogoutButtonComponent
    ],
    exports: [
        LoginFormComponent,
        ResetPasswordFormComponent,
        LogoutButtonComponent
    ],
    imports: [
        CommonModule,

        RegistrationModule,
        ReactiveFormsModule,
        RouterModule,
        MatButtonModule,
        MatInputModule,
        MatIconModule,
        MatCheckboxModule,
        FormsModule,
        MatListModule
    ]
})
export class AuthorizationModule {
}
