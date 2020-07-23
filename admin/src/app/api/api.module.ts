import { NgModule } from "@angular/core";

import { AuthorizationApiService } from "./authorization";
import {
    NewsApiService, NewsCategoryApiService, NewsLogApiService,
    ContentApiService, ContentCategoryApiService, KeywordApiService
} from "./news";

@NgModule({
    providers: [
        AuthorizationApiService,
        NewsApiService,
        NewsCategoryApiService,
        NewsLogApiService,
        ContentApiService,
        ContentCategoryApiService,
        KeywordApiService,
    ],
})
export class ApiModule {
}
