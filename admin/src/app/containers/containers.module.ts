import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";

import { NewsModule } from "./news";
import { NewsCategoryModule } from "./news-category";
import { ContentModule } from "./content";
import { NewsLogModule } from "./news-log";
import { ContentCategoryModule } from "./content-category";
import { KeywordModule } from "./keyword";
import { PageModule } from "./page";


@NgModule({
    declarations: [],
    imports: [
        CommonModule,
        NewsModule,
        NewsCategoryModule,
        NewsLogModule,
        ContentModule,
        ContentCategoryModule,
        KeywordModule,
        PageModule
    ]
})
export class ContainersModule {
}
