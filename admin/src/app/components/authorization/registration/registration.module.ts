import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import { HttpClientModule } from "@angular/common/http";
import { FormsModule, ReactiveFormsModule } from "@angular/forms";
import { AppRoutingModule } from "@app/app-routing.module";

import { MatFormFieldModule } from "@angular/material/form-field";
import { MatInputModule } from "@angular/material/input";
import { MatButtonModule } from "@angular/material/button";
import { MatIconModule } from "@angular/material/icon";

import { AuthorizationApiService } from "@app/api/authorization";
import { RegistrationFormComponent } from "./registration-form";
import { ConfirmRegistrationComponent } from "./confirm-registration/confirm-registration.component";




@NgModule({
    declarations: [
        RegistrationFormComponent,
        ConfirmRegistrationComponent
    ],
    exports: [
        RegistrationFormComponent,
        ConfirmRegistrationComponent
    ],
    imports: [
        CommonModule,
        HttpClientModule,

        MatFormFieldModule,
        FormsModule,
        MatInputModule,
        MatButtonModule,
        ReactiveFormsModule,
        MatIconModule,
        AppRoutingModule
    ],
    providers: [
        AuthorizationApiService
    ]
})
export class RegistrationModule {
}
