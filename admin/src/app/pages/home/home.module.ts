import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import { RouterModule } from "@angular/router";
import { MatButtonModule } from "@angular/material/button";

import { AuthorizationModule } from "@components/authorization";

import { HomeComponent } from "./home.component";


@NgModule({
    declarations: [HomeComponent],
    imports: [
        CommonModule,
        RouterModule,
        MatButtonModule,
        AuthorizationModule
    ]
})
export class HomeModule {
}
