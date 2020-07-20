import { BrowserModule } from "@angular/platform-browser";
import { NgModule } from "@angular/core";
import { HTTP_INTERCEPTORS } from "@angular/common/http";

import { PagesModule } from "./pages";
import { ComponentsModule } from "./components";
import { AuthorizationInterceptor } from "./api/authorization";
import { LayoutsModule } from "./layouts";

import { AppRoutingModule } from "./app-routing.module";
import { AppComponent } from "./app.component";
import { AuthenticatedLayoutModule } from "@app/layouts/authenticated";
import { GuestLayoutModule } from "@app/layouts/guest";

@NgModule({
    declarations: [
        AppComponent
    ],
    imports: [
        BrowserModule,
        AppRoutingModule,
        PagesModule,
        ComponentsModule,
        LayoutsModule,
        AuthenticatedLayoutModule,
        GuestLayoutModule
    ],
    providers: [
        {
            provide: HTTP_INTERCEPTORS,
            useClass: AuthorizationInterceptor,
            multi: true
        }
    ],
    bootstrap: [AppComponent]
})
export class AppModule {
}


