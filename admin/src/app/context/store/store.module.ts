import { NgModule } from "@angular/core";
import { NewsModule } from "./news";
import { NewsCategoryModule } from "./news-category";
import { NewsLogModule } from "./news-log";


@NgModule({
    declarations: [],
    imports: [
        NewsModule,
        NewsCategoryModule,
        NewsLogModule
    ]
})
export class StoreModule {
}
