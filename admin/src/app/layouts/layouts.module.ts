import { NgModule } from "@angular/core";
import { RouterModule } from "@angular/router";

import { MatSidenavModule } from "@angular/material/sidenav";
import { MatToolbarModule } from "@angular/material/toolbar";
import { MatListModule } from "@angular/material/list";

import { AuthorizationModule } from "@components/authorization";
import { AuthenticatedLayoutModule } from "./authenticated";
import { GuestLayoutModule } from "./guest";


@NgModule({
    imports: [
        AuthenticatedLayoutModule,
        GuestLayoutModule,
        MatSidenavModule,
        MatToolbarModule,
        MatListModule,
        RouterModule,
        AuthorizationModule
    ]
})
export class LayoutsModule {
}
