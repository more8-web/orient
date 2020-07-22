import { NgModule } from "@angular/core";

import { AuthorizationApiService } from "./authorization";
import { NewsApiService, NewsCategoryApiService, NewsLogApiService } from "./news";

@NgModule({
    providers: [
        AuthorizationApiService,
        NewsApiService,
        NewsCategoryApiService,
        NewsLogApiService,
    ],
})
export class ApiModule {
}
