import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";

import { NewsComponent } from "./news.component";
import { NewsModule as NewsComponentModule } from "@containers/news";
import { NewsCategoryModule } from "@app/containers";
import { NewsLogModule } from "@containers/news-log/news-log.module";


@NgModule({
    declarations: [NewsComponent],
    imports: [
        CommonModule,
        NewsComponentModule,
        NewsCategoryModule,
        NewsLogModule,
    ],
    exports: [
        NewsComponent
    ]
})
export class NewsModule {
}
