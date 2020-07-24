import { NgModule } from "@angular/core";
import { NewsModule } from "./news";
import { NewsCategoryModule } from "./news-category";
import { NewsLogModule } from "./news-log";
import { ContentModule } from "./content";
import { ContentCategoryModule } from "./content-category";
import { KeywordModule } from "./keyword";
import { PageModule } from "./page";


@NgModule({
    declarations: [],
    imports: [
        NewsModule,
        NewsCategoryModule,
        NewsLogModule,
        ContentModule,
        ContentCategoryModule,
        KeywordModule,
        PageModule
    ]
})
export class StoreModule {
}
