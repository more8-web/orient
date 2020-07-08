import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { RegistrationModule} from "./registration";
import { LoginFormComponent } from './login/login-form/login-form.component';
import {ReactiveFormsModule} from "@angular/forms";
import { ResetPasswordFormComponent } from './reset-password/reset-password-form/reset-password-form.component';
import {RouterModule} from "@angular/router";
import {MatButtonModule} from "@angular/material/button";
import {MatInputModule} from "@angular/material/input";
import {MatIconModule} from "@angular/material/icon";
import { ConfirmResetPasswordFormComponent } from './reset-password/confirm-reset-password-form/confirm-reset-password-form.component';
import { LogoutButtonComponent } from './logout/logout-button/logout-button.component';


@NgModule({
  declarations: [LoginFormComponent, ResetPasswordFormComponent, ConfirmResetPasswordFormComponent, LogoutButtonComponent],
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
    MatIconModule
  ]
})
export class AuthorizationModule { }
