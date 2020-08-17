import { NgModule } from "@angular/core";
import { StoreModule } from "@ngrx/store";
import { StoreDevtoolsModule } from "@ngrx/store-devtools";
import { EffectsModule } from "@ngrx/effects";
import { BrowserModule } from "@angular/platform-browser";
import { HTTP_INTERCEPTORS } from "@angular/common/http";

import { PagesModule } from "./pages";
import { ComponentsModule } from "./components";
import { AuthorizationInterceptor } from "./api";
import { LayoutsModule } from "./layouts";
import { ContextModule } from "./context";

import { AppRoutingModule } from "./app-routing.module";
import { AppComponent } from "./app.component";
import { environment } from "../environments/environment";
import { FormService } from "@app/services/form.service";

@NgModule({
    declarations: [
        AppComponent,
    ],
    imports: [
        BrowserModule,
        AppRoutingModule,
        StoreModule.forRoot({}),
        StoreDevtoolsModule.instrument({
            maxAge: 25, // Retains last 25 states
            logOnly: environment.production, // Restrict extension to log-only mode
        }),
        EffectsModule.forRoot(),

        PagesModule,
        ComponentsModule,
        LayoutsModule,
        ContextModule,
    ],
    providers: [
        {
            provide: HTTP_INTERCEPTORS,
            useClass: AuthorizationInterceptor,
            multi: true
        },
        FormService
    ],
    exports: [
    ],
    bootstrap: [AppComponent]
})
export class AppModule {
}


