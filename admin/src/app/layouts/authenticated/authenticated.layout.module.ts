import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import { RouterModule } from "@angular/router";

import { MatToolbarModule } from "@angular/material/toolbar";
import { MatSidenavModule } from "@angular/material/sidenav";
import { MatListModule } from "@angular/material/list";
import { MatButtonModule } from "@angular/material/button";

import { AuthorizationModule } from "@components/authorization";
import { HeaderComponent } from "./components/header";
import { FooterComponent } from "./components/footer";
import { NavigationComponent } from "./components/navigation";
import { AuthenticatedLayoutComponent } from "./authenticated.layout.component";
import { MatIconModule } from "@angular/material/icon";

@NgModule({
    declarations: [
        AuthenticatedLayoutComponent,
        HeaderComponent,
        FooterComponent,
        NavigationComponent
    ],
    exports: [
        HeaderComponent,
        NavigationComponent,
        AuthenticatedLayoutComponent,
    ],
    imports: [
        CommonModule,
        RouterModule,
        MatToolbarModule,
        MatSidenavModule,
        MatListModule,
        MatButtonModule,
        AuthorizationModule,
        MatIconModule,
    ]
})
export class AuthenticatedLayoutModule {
}
