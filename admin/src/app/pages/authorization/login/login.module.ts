import {NgModule} from "@angular/core";
import {CommonModule} from "@angular/common";
import {LoginComponent} from "./login.component";
import {RouterModule} from "@angular/router";
import {AuthorizationModule} from "@components/authorization";
import {MatButtonModule} from "@angular/material/button";


@NgModule({
  declarations: [LoginComponent],
    imports: [
        CommonModule,
        RouterModule,
        AuthorizationModule,
        MatButtonModule
    ]
})
export class LoginModule {
}
