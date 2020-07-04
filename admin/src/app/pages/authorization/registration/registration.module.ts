import {NgModule} from "@angular/core";
import {CommonModule} from "@angular/common";
import {RegistrationComponent} from "./registration.component";
import {RouterModule} from "@angular/router";
import {RegistrationModule as RegistrationComponentsModule} from "@components/authorization";
import {MatButtonModule} from "@angular/material/button";


@NgModule({
  declarations: [RegistrationComponent],
    imports: [
        CommonModule,
        RouterModule,
        RegistrationComponentsModule,
        MatButtonModule,
    ]
})
export class RegistrationModule {
}
