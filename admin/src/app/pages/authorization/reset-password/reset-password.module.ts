import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ResetPasswordComponent } from './reset-password.component';
import {AppRoutingModule} from "@app/app-routing.module";
import {AuthorizationModule} from "@components/authorization";



@NgModule({
  declarations: [ResetPasswordComponent],
    imports: [
        CommonModule,
        AppRoutingModule,
        AuthorizationModule
    ]
})
export class ResetPasswordModule { }
