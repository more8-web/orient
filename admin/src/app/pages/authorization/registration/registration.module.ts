import {NgModule} from "@angular/core";
import {CommonModule} from "@angular/common";
import {RegistrationComponent} from "./registration.component";
import {RouterModule} from "@angular/router";
import {RegistrationModule as RegistrationComponentsModule} from "@components/authorization";


@NgModule({
  declarations: [RegistrationComponent],
  imports: [
    CommonModule,
    RouterModule,
    RegistrationComponentsModule,
  ]
})
export class RegistrationModule {
}
