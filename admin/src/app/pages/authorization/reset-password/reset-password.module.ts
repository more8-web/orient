import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ResetPasswordComponent } from './reset-password.component';
import {AuthorizationModule} from "@components/authorization";
import {MatButtonModule} from "@angular/material/button";



@NgModule({
  declarations: [ResetPasswordComponent],
    imports: [
        CommonModule,
        AuthorizationModule,
        MatButtonModule
    ]
})
export class ResetPasswordModule { }
