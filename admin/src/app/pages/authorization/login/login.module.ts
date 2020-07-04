import {NgModule} from "@angular/core";
import {CommonModule} from "@angular/common";
import {LoginComponent} from "./login.component";
import {RouterModule} from "@angular/router";
import {AuthorizationModule} from "@components/authorization";


@NgModule({
  declarations: [LoginComponent],
    imports: [
        CommonModule,
        RouterModule,
        AuthorizationModule
    ]
})
export class LoginModule {
}
