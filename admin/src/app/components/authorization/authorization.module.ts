import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { RegistrationModule} from "./registration";
import { LoginFormComponent } from './login/login-form/login-form.component';
import {ReactiveFormsModule} from "@angular/forms";
import { ResetPasswordFormComponent } from './reset-password/reset-password-form/reset-password-form.component';
import {RouterModule} from "@angular/router";
import {MatButtonModule} from "@angular/material/button";


@NgModule({
  declarations: [LoginFormComponent, ResetPasswordFormComponent],
    exports: [
        LoginFormComponent,
        ResetPasswordFormComponent
    ],
  imports: [
    CommonModule,

    RegistrationModule,
    ReactiveFormsModule,
    RouterModule,
    MatButtonModule
  ]
})
export class AuthorizationModule { }
