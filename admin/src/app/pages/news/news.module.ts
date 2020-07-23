import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";

import { NewsComponent } from "./news.component";
import { NewsModule as NewsComponentModule } from "@containers/news";
import {
    ContentCategoryModule, ContentModule, KeywordModule,
    NewsCategoryModule, NewsLogModule
} from "@app/containers";


@NgModule({
    declarations: [NewsComponent],
    imports: [
        CommonModule,
        NewsComponentModule,
        NewsCategoryModule,
        NewsLogModule,
        ContentModule,
        ContentCategoryModule,
        KeywordModule,
    ],
    exports: [
        NewsComponent
    ]
})
export class NewsModule {
}
